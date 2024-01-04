<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $customers = Customer::with(['user'])->get();
        $users = User::all();
        //dd($customers);

/*
        $users = DB::table('users')
            ->join('customers', 'users.id', '=', 'customers.user_id')
            ->get();
        $customers = Customer::all();*/

        return view('customer.index', compact('customers','users'));


    }


    public function store(StoreUserRequest $request)
    {

        //TODO:
        $validated = $request->validated();

        $user = User::create([
            'name' => $request->get('name'),
            'dni' => $request->get('dni'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('dni')),
        ]);

        $customer = Customer::create([
            'user_id' => $user -> id,
            'phone' => $request->get('phone'),
        ]);

        // Sincronizar con roles
        $roles = $request->get('roles');
        //var_dump($roles);
        $user->syncRoles($roles);


        return response()->json(['message' => 'Cliente guardado con éxito.'], 200);
    }



    public function update(UpdateUserRequest $request)
    {

        $validated = $request->validated();

        $user = User::find($request->get('user_id'));
        $user->name = $request->get('name');
        $user->dni = $request->get('dni');
        $user->email = $request->get('email');
        $user->save();

        $customer = Customer::find($request->get('customer'));
        $customer->phone = $request->get('phone');
        $customer->save();
        // Sincronizar con roles
        $roles = $request->get('roles');
        $user->syncRoles($roles);


        return response()->json(['message' => 'Cliente modificado con éxito.'], 200);

    }



    public function destroy(DeleteUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::find($request->get('user_id'));
        $customer = Customer::find($request->get('customer_id'));

        $user->delete();
        $customer->delete();

        return response()->json(['message' => 'Cliente eliminado con éxito.'], 200);

    }


    public function getRoles( $id )
    {
        $user = User::find($id);
        //var_dump($role);
        // No usar permissions() sino solo permissions
        $rolesAll = Role::all();
        $rolesSelected = [];
        $roles = $user->roles;
        foreach ( $roles as $role )
        {
            //var_dump($permission->name);
            array_push($rolesSelected, $role->name);
        }
        //var_dump($permissions);
        return array(
            'rolesAll' => $rolesAll,
            'rolesSelected' => $rolesSelected
        );
    }



}
