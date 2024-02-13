<?php

namespace App\Http\Controllers;

use App\Models\MethodShipping;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\DeleteMethodShipRequest;
use App\Http\Requests\StoreMethodShipRequest;
use App\Http\Requests\UpdateMethodShipRequest;

class MethodShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 
        $ship = MethodShipping::with('shop')->get();
        $shops = Shop::get(['id', 'name']);
        //dd($ship);

        return view('method_ship.index', compact('shops', 'ship'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMethodShipRequest $request)
    {
        $validated = $request->validated();

        $ship = MethodShipping::create([
            'name' => $request->get('name'),
            'shop_id' => $request->get('shop')
        ]);

        // TODO: Tratamiento de un archivo de forma tradicional
        if (!$request->file('image')) {
            $ship->image = 'no_image.jpg';
            $ship->save();
        } else {
            $path = public_path() . '/images/method_ship/';
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $ship->id . '.' . $extension;
            $request->file('image')->move($path, $filename);
            $ship->image = $filename;
            $ship->save();
        }

        return response()->json(['message' => 'Envio guardado con éxito.'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MethodShipping  $methodShipping
     * @return \Illuminate\Http\Response
     */
    public function show(MethodShipping $methodShipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MethodShipping  $methodShipping
     * @return \Illuminate\Http\Response
     */
    public function edit(MethodShipping $methodShipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MethodShipping  $methodShipping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMethodShipRequest $request)
    {
        //
        $validated = $request->validated();

        $ships = MethodShipping::find($request->get('ship_id'));

        $ships->name = $request->get('name');
        $ships->shop_id = $request->get('shop');
        $ships->save();

        // TODO: Tratamiento de un archivo de forma tradicional
        if (!$request->file('image')) {
            if ($ships->image == 'no_image.jpg' || $ships->image == null) {
                $ships->image = 'no_image.jpg';
                $ships->save();
            }
        } else {
            $path = public_path() . '/images/method_ship/';
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $ships->id . '.' . $extension;
            $request->file('image')->move($path, $filename);
            $ships->image = $filename;
            $ships->save();
        }

        return response()->json(['message' => 'Envio modificado con éxito.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MethodShipping  $methodShipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteMethodShipRequest $request)
    {
        //
        $validated = $request->validated();

        $ships = MethodShipping::find($request->get('ship_id'));

        $ships->delete();

        return response()->json(['message' => 'Envio eliminado con éxito.'], 200);
    }

    public function trashed()
    {
        $ships = MethodShipping::onlyTrashed()->get();
        return view('ship.restore', compact('ships'));
    }

    public function restore(Request $request)
    {
        $rules = [
            'id' => 'required|exists:ships,id',
        ];

        $messages = [
            'id.required' => 'No se ha recibido el identificador del envio.',
            'id.exists' => 'El envio no existe en la base de datos.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if (!$validator->fails()) {
            $ship = MethodShipping::onlyTrashed()->where('id', $request->get('id'))
                ->restore();
        }

        return response()->json($validator->messages(), 200);
    }
}
