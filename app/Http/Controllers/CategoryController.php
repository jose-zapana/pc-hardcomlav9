<?php

namespace App\Http\Controllers;


use App\Models\Shop;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\DeleteCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('shop')->get();
        $shops = Shop::get(['id', 'name']);
        //dd($categories);
        return view('category.index', compact('categories', 'shops'));
    }

    public function create()
    {
        // No se utilizará porque es una ventana modal.
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = Category::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'shop_id' => $request->get('shop')
        ]);

        // TODO: Tratamiento de un archivo de forma tradicional
        if (!$request->file('image')) {
            $category->image = 'no_image.jpg';
            $category->save();
        } else {
            $path = public_path().'/images/category/';
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $category->id . '.' . $extension;
            $request->file('image')->move($path, $filename);
            $category->image = $filename;
            $category->save();
        }

        return response()->json(['message' => 'Categoría guardada con éxito.'], 200);

    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(UpdateCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = Category::find($request->get('category_id'));

        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->shop_id = $request->get('shop');
        $category->save();

        // TODO: Tratamiento de un archivo de forma tradicional
        if (!$request->file('image')) {
            if ($category->image == 'no_image.jpg' || $category->image == null) {
                $category->image = 'no_image.jpg';
                $category->save();
            }

        } else {
            $path = public_path().'/images/category/';
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $category->id . '.' . $extension;
            $request->file('image')->move($path, $filename);
            $category->image = $filename;
            $category->save();
        }

        return response()->json(['message' => 'Categoría modificada con éxito.'], 200);

    }

    public function destroy(DeleteCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = Category::find($request->get('category_id'));

        $category->delete();

        return response()->json(['message' => 'Categoría eliminada con éxito.'], 200);

    }
}
