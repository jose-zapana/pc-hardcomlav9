<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Banner;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;

class Banners extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $image, $title, $content, $link,  $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 2;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Banners';
    }

    public function paginationViwe()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if (strlen($this->search) > 0)
            $data = Banner::where('title', 'like', '%' . $this->search . '%')->paginate($this->pagination);

        else
            $data = Banner::orderBy('id', 'desc')->paginate($this->pagination);


        return view('livewire.banner.banners', ['banners' => $data])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function Edit($id)
    {
        $record = Banner::find($id, ['title', 'content', 'link', 'image']);
        $this->title = $record->title;
        $this->content = $record->content;
        $this->link = $record->link;
        $this->selected_id = $record->id;
        $this->image = null;

        $this->emit('show-modal', 'show modal!');
    }

    public function Store()
    {
        $rules = [
            'title' => 'required|unique:title|min:3'
        ];

        $messages = [
            'title.required' => 'Titulo del Banner es requerido',
            'title.unique' => 'Ya existe el nombre del Banner',
            'title.min', 'El titulo del Banner debe tener al menos 3 caracteres'
        ];

        $this->validate($rules, $messages);

        $banner = Banner::create([
            'title' => $this->title,
            'content' => $this->content,
            'link' => $this->link
        ]);

        $customFileName;
        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/banners', $customFileName);
            $banner->image = $customFileName;
            $banner->save();
        }

        $this->resetUI();
        $this->emit('banner-added', 'Banner Registrado');
    }



    public function resetUI()
    {
        $this->title = '';
        $this->content = '';
        $this->link = '';
        $this->selected_id = 0;
    }
}
