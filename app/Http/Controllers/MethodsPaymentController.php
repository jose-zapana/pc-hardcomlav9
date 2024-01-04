<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MethodsPayment as methodPay;
use App\Models\MethodsPayment_Shops as methodPay_shop;
use App\Http\Requests\StoreMethodsPaymentsRequest;
use App\Http\Requests\UpdateMethodsPaymentsRequest;
use App\Http\Requests\DeleteMethodsPaymentsRequest;
use App\Models\Shop;

class MethodsPaymentController extends Controller
{
    public function index()
    {
        $metodos = methodPay::get();
        foreach($metodos as $metodo){
            $id_metodo = $metodo->id;
            $shops = methodPay_shop::where('method_payments_id',$id_metodo)->leftJoin('shops','shops.id','=','shops_method_payments.shop_id')
            ->select('shops.id','shops.name')
            ->get();
            $shops = $shops->toArray();
            $metodo->tiendas = $shops;
        }
        $shops = Shop::get(['id', 'name']);
        return view('methodspayment.index', compact('metodos', 'shops'));
    }

    public function store(StoreMethodsPaymentsRequest $request)
    {
        $validated = $request->validated();

        $metodo = methodPay::create([
            'name' => $request->get('name'),
            'shop_id' => $request->get('shop')
        ]);

        // TODO: Tratamiento de un archivo de forma tradicional
        if (!$request->file('image')) {
            $metodo->image = 'no_image.jpg';
            $metodo->save();
        } else {
            $path = public_path().'/images/methodsPayment/';
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $metodo->id . '.' . $extension;
            $request->file('image')->move($path, $filename);
            $metodo->image = $filename;
            $metodo->save();
        }
        $id_metodo = $metodo->id;

        foreach($request->shop as $shop)
        {

            $metodo_shop = methodPay_shop::create([
                'shop_id' => $shop,
                'method_payments_id' => $id_metodo
            ]);
            $metodo_shop->save();
            
        }

        return response()->json(['message' => 'Metodo guardado con éxito.'], 200);

    }

    public function update(UpdateMethodsPaymentsRequest $request)
    {

        $validated = $request->validated();

        $metodo = methodPay::find($request->get('payment_id'));

        $metodo->name = $request->get('name');
        $metodo->save();

        if (!$request->file('image')) {
            if ($metodo->image == 'no_image.jpg' || $metodo->image == null) {
                $metodo->image = 'no_image.jpg';
                $metodo->save();
            }

        } else {
            $path = public_path().'/images/methodsPayment/';
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $metodo->id . '.' . $extension;
            $request->file('image')->move($path, $filename);
            $metodo->image = $filename;
            $metodo->save();
        }

        $shops_old = methodPay_shop::where('method_payments_id',$request->get('payment_id'))->get();

        foreach($shops_old as $shop)
        {
            $registro = methodPay_shop::find($shop->id);
            $registro->delete();
        }

        foreach($request->shop as $shop)
        {
            $metodo_shop = methodPay_shop::create([
                'shop_id' => $shop,
                'method_payments_id' => $request->get('payment_id')
            ]);
            $metodo_shop->save();         
        }


        return response()->json(['message' => 'Categoría modificada con éxito.'], 200);

    }

    public function destroy(DeleteMethodsPaymentsRequest $request)
    {
        $validated = $request->validated();

        $metodo = methodPay::find($request->get('payment_id'));

        $metodo->delete();

        return response()->json(['message' => 'Metodo eliminado con éxito.'], 200);

    }
}
