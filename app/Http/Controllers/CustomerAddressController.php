<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\DB;
//Request
use App\Http\Requests\StoreCustomerAddressRequest;
use App\Http\Requests\UpdateCustomerAddressRequest;
use App\Http\Requests\DeleteCustomerAddressRequest;

use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    public function index()
    {
        //Traemos customers relacionados a los usuarios
        $customers = Customer::with('user')->get();
        //traemos los datos como id y nombre de los usuarios que son clientes
        $users = User::get(['id', 'name']);
        //dd($categories);
        return view('address.index', compact('customers', 'users'));

    }

    public function create()
    {
        // No se utilizará porque es una ventana modal.
    }

    public function store(StoreCustomerAddressRequest $request)
    {
        //Crear una direccion para el cliente
        $validated = $request->validated();

        $customerAddress = CustomerAddress::create([
            'customer_id' => $request->get('customer_id'),
            'address' => $request->get('address'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'province' => $request->get('province')
        ]);

        return response()->json(['message' => 'Dirección guardada con éxito.'], 200);
    }

    public function show($id)
    {
        //traemos el id del cliente 
        $customer = DB::table('customers')
        ->where('id', $id)
        ->first();
        //Mostrara todas las direcciones de un cliente
        $customerAddresses = CustomerAddress::all()->where('customer_id', $id);
        return view('address.show', compact('customer','customerAddresses'));
    }

    public function edit(CustomerAddress $customerAddress)
    {

    }

    public function update(UpdateCustomerAddressRequest $request)
    {
        //Actualizar la direccion de un cliente
        $validated = $request->validated();

        $address = CustomerAddress::find($request->get('address_id'));
        $address->customer_id = $request->get('customer_id');
        $address->address = $request->get('address');
        $address->country = $request->get('country');
        $address->city = $request->get('city');
        $address->province = $request->get('province');
        $address->save();
        return response()->json(['message' => 'Dirección modificada con éxito.'], 200);
    }

    public function destroy(DeleteCustomerAddressRequest $request)
    {
        //Eliminar una dirección de un cliente
        $validated = $request->validated();

        $address = CustomerAddress::find($request->get('address_id'));

        $address->delete();

        return response()->json(['message' => 'Dirección eliminada con éxito.'], 200);
    }
}
