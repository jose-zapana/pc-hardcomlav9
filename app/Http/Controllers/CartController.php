<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Events\OrderConfirmed;
use App\Events\OrderPlaced;
use App\Mail\CheckoutMail;
use App\Models\MethodShipping;
use App\Models\MethodsPayment;
use App\Models\MethodsPayment_Shops;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function addToCart( $idProduct )
    {
        // Verificar que haya un carrito del cliente
        $product = Product::find($idProduct);
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $cart = Cart::where('customer_id', $customer->id)
            ->where('state', 'on')->first();

        // Si no hay carrito, creamos el carrito y agregamos el producto
        // TODO: Cuando cambiemos la tienda a variable de session
        // TODO: Entonces el 1 se cambiará por la variable
        if ( !isset($cart) )
        {
            $shopping_cart = Cart::create([
                'customer_id' => $customer->id,
                'shop_id' => 1,
                'total' => $product->unit_price,
                'state' => 'on'
            ]);
            CartProduct::create([
                'cart_id' => $shopping_cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'unit_price' => $product->unit_price
            ]);
        } else {
            // Si hay carrito, solo agregamos el producto
            $existProduct = CartProduct::where('product_id', $product->id)
                ->where('cart_id', $cart->id)->first();
            if ( isset($existProduct) )
            {
                return response()->json(['success' => true, 'url' => route('shopping.cart')],200);
            } else {
                $cart->total = $cart->total + $product->unit_price;
                $cart->save();

                CartProduct::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'unit_price' => $product->unit_price
                ]);
            }

        }

        return response()->json(['success' => true, 'url' => route('shopping.cart')],200);

    }

    public function getShoppingCart()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $cart = Cart::where('customer_id', $customer->id)
            ->where('state', 'on')
            ->with('products')
            ->first();
        $methodPayments = MethodsPayment::all();

        return view('landing.cart', compact('customer', 'cart', 'methodPayments'));
    }

    public function updateCart( $cart_id, $product_id, $action )
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $cart = Cart::where('customer_id', $customer->id)
            ->where('state', 'on')
            ->where('id', $cart_id)
            ->with('products')
            ->first();

        if ( !isset($cart) )
        {
            return response()->json(['success' => false, 'message' => "Lo sentimos, ocurrió un error."],200);
        }

        if ($action === "plus")
        {
            $cart_product = CartProduct::where('cart_id',$cart->id )
                ->where('product_id', $product_id)->first();
            $cart_product->quantity +=1;
            $cart_product->save();
        }

        if ($action === "minus")
        {
            $cart_product = CartProduct::where('cart_id',$cart->id )
                ->where('product_id', $product_id)->first();
            $cart_product->quantity -=1;
            $cart_product->save();
        }

        $total = 0;
        $cart_products = CartProduct::where('cart_id',$cart->id )->get();
        foreach ( $cart_products as $cart_product )
        {
            $total = $total + ($cart_product->quantity*$cart_product->unit_price);
        }
        $cart->total = $total;
        $cart->save();

        /*foreach ( $cart->products as $product )
        {
            var_dump($product->pivot->quantity);
            //$total = $total + ($product->pivot->quantity*$product->pivot->unit_price);
        }*/
        //$cart->total = $total;
        //$cart->save();

        return response()->json(['success' => true, 'cart' => $cart],200);

    }

    public function removeItem( $cart_id, $product_id )
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $cart = Cart::where('customer_id', $customer->id)
            ->where('state', 'on')
            ->where('id', $cart_id)
            ->with('products')
            ->first();

        if ( !isset($cart) )
        {
            return response()->json(['success' => false, 'message' => "Lo sentimos, ocurrió un error."],200);
        }

        $item = CartProduct::where('cart_id', $cart->id)
            ->where('product_id', $product_id)->first();
        $item->delete();

        // Volvemos a actualizar el cart total
        $total = 0;
        $cart_products = CartProduct::where('cart_id',$cart->id )->get();
        foreach ( $cart_products as $cart_product )
        {
            $total = $total + ($cart_product->quantity*$cart_product->unit_price);
        }
        $cart->total = $total;
        $cart->save();

        $cart2 = Cart::where('customer_id', $customer->id)
            ->where('state', 'on')
            ->where('id', $cart_id)
            ->with('products')
            ->first();

        return response()->json(['success' => true, 'cart' => $cart2],200);
    }

    public function checkoutOrder()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->with('addresses')->first();
        $cart = Cart::where('customer_id', $customer->id)
            ->where('state', 'on')
            ->with('products')
            ->first();
        $method_shippings = MethodShipping::where('shop_id', 1)->get();
        //$methodPayments = MethodsPayment_Shops::where('shop_id', 1)->get('');
        $method_payments = MethodsPayment_Shops::leftJoin('method_payments','method_payments.id','=','shops_method_payments.method_payments_id')
            ->where('shops_method_payments.shop_id', 1)
            ->select('method_payments.name', 'method_payments.image')->get();
        //dd($method_shippings);
        return view('landing.checkout', compact('customer', 'cart', 'method_shippings', 'method_payments'));
    }

    public function confirmOrder( Request $request )
    {
        DB::beginTransaction();
        try {
            $payment = MethodsPayment::where('name', $request->get('payment'))->first();
            $customer = Customer::where('user_id', Auth::user()->id)->with('addresses')->first();
            $cart = Cart::where('customer_id', $customer->id)
                ->where('state', 'on')
                ->with('products')
                ->first();

            // Generamos la venta
            $sale = Sale::create([
                'cart_id' => $cart->id,
                'state' => 'checked',
                'total' => $cart->total,
                'method_payment_id' => $payment->id,
                'method_shipping_id' => $request->get('shipping'),
                'customer_address_id' => $request->get('address')
            ]);

            $cart_products = CartProduct::where('cart_id',$cart->id )->get();
            foreach ( $cart_products as $cart_product )
            {
                SaleProduct::create([
                    'sale_id' => $sale->id,
                    'product_id' => $cart_product->product_id,
                    'quantity' => $cart_product->quantity,
                    'unit_price' => $cart_product->unit_price
                ]);
            }

            $cart->state = 'off';
            $cart->save();

            // TODO: Enviar notificación al administrador
            event(new OrderConfirmed($sale, $cart, $customer));
            event(new OrderPlaced($customer->user->name, $cart->total));
            // TODO: Enviar un correo electronico al administrador
            //Mail::to('joryes1894@gmail.com')->send( new CheckoutMail($sale, $cart, $customer) );

            DB::commit();
        } catch ( \Throwable $e ) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 422);
        }

        return response()->json(['message' => 'Pedido confirmado con éxito.'], 200);

    }

}
