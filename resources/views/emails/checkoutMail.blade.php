<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
<h2>Datos del cliente</h2>
<br><strong> Cliente: </strong> {{ $customer->user->name }}
<br><strong> Email del cliente: </strong> {{ $customer->user->email }}
<br><strong> Teléfono del cliente: </strong> {{ $customer->phone }}
<h2>Datos del pedido</h2>
<strong> Método de pago: </strong> {{ $sale->payment->name }}
<br><strong> Método de envío: </strong> {{ $sale->shipping->name }}
<br><strong> Ubicación del cliente: </strong> {{ utf8_encode($sale->address->country)  . ', ' . utf8_encode($sale->address->city) .', '. utf8_encode($sale->address->province) }}
<br><strong> Dirección del cliente: </strong> {{ $sale->address->address }}
<h2>Detalles del pedido</h2>
@foreach( $cart->products as $product )
    <br><strong> Producto: </strong> {{ $product->name }}
    <br><strong> Cantidad: </strong> {{ $product->pivot->quantity }}
    <br><strong> Precio Unitario: </strong> {{ $product->pivot->unit_price }}
    <br><strong> Imagen: </strong>  <img width="80px" height="80px" src="{{ $message->embed(public_path('images/product/'.$product->images[0]->image)) }}">
@endforeach
<h2>Monto Total</h2>
<br><strong> Total: </strong>{{ $sale->total }}
</body>
</html>
