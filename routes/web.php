<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\MethodShippingController;
use App\Http\Controllers\MethodsPaymentController;
use App\Http\Controllers\CustomerAddressController;
use App\Http\Livewire\Banners;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//rutas Laravel 9

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('home', [HomeController::class, 'dashboard'])->name('dashboard')
            ->middleware('permission:access_dashboard');

        //TODO: Rutas módulo Banner
        Route::get('/banner', Banners::class)->middleware('permission:create_store');;

        // TODO: Rutas módulo Tienda
        // Index: Muestra el listado de tiendas
        Route::get('tiendas', [ShopController::class, 'index'])->name('shop.index')
            ->middleware('permission:create_store');
        // Create: Muestra el formulario de creación
        Route::get('tienda/crear', [ShopController::class, 'create'])->name('shop.create')
            ->middleware('permission:create_store');
        // Store: Guarda en la BD la tienda
        Route::post('shop/store', [ShopController::class, 'store'])->name('shop.store')
            ->middleware('permission:save_store');
        // Edit: Mostrar el formulario de actualización
        Route::get('tienda/actualizar/{id}', [ShopController::class, 'edit'])->name('shop.edit')
            ->middleware('permission:edit_store');
        // Update: Guarda la nueva información de la tienda
        Route::post('shop/update', [ShopController::class, 'update'])->name('shop.update')
            ->middleware('permission:update_store');
        // Destroy: Eliminar la tienda
        Route::post('shop/destroy', [ShopController::class, 'destroy'])->name('shop.destroy')
            ->middleware('permission:destroy_store');
        Route::get('/all/shops', [ShopController::class, 'getShops'])->name('shop.get');

        // Trashed: Devuelve las tiendas eliminadas
        Route::get('tiendas/eliminadas', [ShopController::class, 'trashed'])->name('shop.trashed')
            ->middleware('permission:restore_store');
        // Restore: Restaurar una tienda
        Route::post('shop/restore', [ShopController::class, 'restore'])->name('shop.restore')
            ->middleware('permission:restore_store');

        // TODO: Rutas módulo Categoría
        // Index: Muestra el listado de categorias
        Route::get('categorías', [CategoryController::class, 'index'])->name('category.index')
            ->middleware('permission:create_store');
        Route::post('category/store', [CategoryController::class, 'store'])->name('category.store')
            ->middleware('permission:create_store');
        Route::post('category/update', [CategoryController::class, 'update'])->name('category.update')
            ->middleware('permission:update_store');
        Route::post('category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy')
            ->middleware('permission:destroy_store');

        //Todo: Rutas modulo Direcciones
        Route::get('direcciones', [CustomerAddressController::class, 'index'])->name('address.index')
            ->middleware('permission:create_store');
        //Crear una nueva direccion
        Route::post('address/store', [CustomerAddressController::class, 'store'])->name('address.store')
            ->middleware('permission:create_store');
        //Ruta para mostrar las direcciones de un cliente 
        Route::get('direccion/mostrar/{id}', [CustomerAddressController::class, 'show'])->name('address.show')
            ->middleware('permission:create_store');;
        //Modificar una direccion de un cliente
        Route::post('address/update', [CustomerAddressController::class, 'update'])->name('address.update')
            ->middleware('permission:update_store');
        //Eliminar una dirección de un cliente
        Route::post('address/destroy', [CustomerAddressController::class, 'destroy'])->name('address.destroy')
            ->middleware('permission:destroy_store');

        // TODO: Rutas módulo Metodos de pago
        Route::get('payment', [MethodsPaymentController::class, 'index'])->name('payment.index')
            ->middleware('permission:view_payments');
        Route::post('payment/store', [MethodsPaymentController::class, 'store'])->name('payment.store')
            ->middleware('permission:store_payments');
        Route::post('payment/update', [MethodsPaymentController::class, 'update'])->name('payment.update')
            ->middleware('permission:update_payments');
        Route::post('payment/destroy', [MethodsPaymentController::class, 'destroy'])->name('payment.destroy')
            ->middleware('permission:delete_payments');

        // TODO: Rutas módulo Envios
        // Index: Muestra el listado de envios
        Route::get('envios', [MethodShippingController::class, 'index'])->name('method_ship.index')
            ->middleware('permission:view_shipping');
        Route::post('method_ship/store', [MethodShippingController::class, 'store'])->name('method_ship.store')
            ->middleware('permission:store_shipping');
        Route::post('method_ship/update', [MethodShippingController::class, 'update'])->name('method_ship.update')
            ->middleware('permission:update_shipping');
        Route::post('method_ship/destroy', [MethodShippingController::class, 'destroy'])->name('method_ship.destroy')
            ->middleware('permission:delete_shipping');

        // TODO: Rutas módulo Accesos
        Route::get('usuarios', [UserController::class, 'index'])->name('user.index')
            ->middleware('permission:list_user');
        Route::post('user/store', [UserController::class, 'store'])->name('user.store')
            ->middleware('permission:create_user');
        Route::post('user/update', [UserController::class, 'update'])->name('user.update')
            ->middleware('permission:update_user');
        Route::get('user/roles/{id}', [UserController::class, 'getRoles'])->name('user.roles')
            ->middleware('permission:update_user');
        Route::post('user/destroy', [UserController::class, 'destroy'])->name('user.destroy')
            ->middleware('permission:destroy_user');

        Route::get('roles', [RoleController::class, 'index'])->name('role.index')
            ->middleware('permission:list_role');
        Route::post('role/store', [RoleController::class, 'store'])->name('role.store')
            ->middleware('permission:create_role');
        Route::post('role/update', [RoleController::class, 'update'])->name('role.update')
            ->middleware('permission:update_role');
        Route::get('role/permissions/{id}', [RoleController::class, 'getPermissions'])->name('role.permissions')
            ->middleware('permission:update_role');
        Route::post('role/destroy', [RoleController::class, 'destroy'])->name('role.destroy')
            ->middleware('permission:destroy_role');

        Route::get('permisos', [PermissionController::class, 'index'])->name('permission.index')
            ->middleware('permission:list_permission');
        Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store')
            ->middleware('permission:create_permission');
        Route::post('permission/update', [PermissionController::class, 'update'])->name('permission.update')
            ->middleware('permission:update_permission');
        Route::post('permission/destroy', [PermissionController::class, 'destroy'])->name('permission.destroy')
            ->middleware('permission:destroy_permission');

        // TODO: Rutas módulo Productos
        // Index: Muestra el listado de productos
        Route::get('productos', [ProductController::class, 'index'])->name('product.index')
            ->middleware('permission:create_store');
        // Create: Muestra el formulario de creación
        Route::get('producto/crear', [ProductController::class, 'create'])->name('product.create')
            ->middleware('permission:create_store');
        // Store: Guarda en la BD el producto
        Route::post('product/store', [ProductController::class, 'store'])->name('product.store')
            ->middleware('permission:save_store');
        // Edit: Mostrar el formulario de actualización
        Route::get('producto/actualizar/{id}', [ProductController::class, 'edit'])->name('product.edit')
            ->middleware('permission:edit_store');
        // Update: Guarda la nueva información del producto
        Route::post('product/update', [ProductController::class, 'update'])->name('product.update')
            ->middleware('permission:update_store');
        // Destroy: Eliminar el producto
        Route::post('product/destroy', [ProductController::class, 'destroy'])->name('product.destroy')
            ->middleware('permission:destroy_store');

        Route::get('/obtener/infos/{idProduct}', [ProductController::class, 'getInfo'])
            ->middleware('permission:edit_store');
        Route::get('/obtener/images/{idProduct}', [ProductController::class, 'getImages'])
            ->middleware('permission:edit_store');
        Route::get('/delete/images/{idImage}', [ProductController::class, 'deleteImages'])
            ->middleware('permission:edit_store');

        // TODO: CUSTOMER

        // TODO: Rutas módulo Clientes
        Route::get('clientes', [CustomerController::class, 'index'])->name('customer.index')
            ->middleware('permission:list_customer');
        Route::post('customer/store', [CustomerController::class, 'store'])->name('customer.store')
            ->middleware('permission:create_customer');
        Route::post('customer/update', [CustomerController::class, 'update'])->name('customer.update')
            ->middleware('permission:update_customer');
        Route::get('customer/roles/{id}', [CustomerController::class, 'getRoles'])->name('customer.roles')
            ->middleware('permission:update_customer');
        Route::post('customer/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy')
            ->middleware('permission:destroy_customer');

        // TODO: Rutas módulo Exportaciones
        Route::get('exportaciones', [ExportController::class, 'index'])->name('exports')
            ->middleware('permission:access_dashboard');
        Route::get('pdf/basic/stream', [ExportController::class, 'pdfBasicStream'])->name('pdf.basic')
            ->middleware('permission:access_dashboard');
        Route::get('pdf/basic/download', [ExportController::class, 'pdfBasicDownload'])->name('pdf.basic.download')
            ->middleware('permission:access_dashboard');
        Route::get('pdf/save/download', [ExportController::class, 'pdfSaveDownload'])->name('pdf.save.download')
            ->middleware('permission:access_dashboard');
        Route::get('pdf/view/stream', [ExportController::class, 'pdfViewStream'])->name('pdf.view.stream')
            ->middleware('permission:access_dashboard');

        Route::get('excel/basic', [ExportController::class, 'excelBasic'])->name('excel.basic')
            ->middleware('permission:access_dashboard');
        Route::get('excel/collection', [ExportController::class, 'excelCollection'])->name('excel.collection')
            ->middleware('permission:access_dashboard');
        Route::get('excel/array', [ExportController::class, 'excelArray'])->name('excel.array')
            ->middleware('permission:access_dashboard');
        Route::get('excel/construct', [ExportController::class, 'excelConstruct'])->name('excel.construct')
            ->middleware('permission:access_dashboard');
        Route::get('excel/view', [ExportController::class, 'excelView'])->name('excel.view')
            ->middleware('permission:access_dashboard');
    });

    Route::get('middleware/check', [PermissionController::class, 'middlewareCheck'])
        ->name('middleware.check')
        ->middleware('middlewareCheck:20,view');

    Route::get('/add/cart/{idProduct}', [CartController::class, 'addToCart'])
        ->name('add.cart');

    Route::get('/shopping/cart/', [CartController::class, 'getShoppingCart'])
        ->name('shopping.cart');

    Route::get('/update/cart/{cart_id}/{product_id}/{action}', [CartController::class, 'updateCart'])
        ->name('update.cart');

    Route::get('/remove/item/{cart_id}/{product_id}', [CartController::class, 'removeItem'])
        ->name('remove.item');

    Route::get('/checkout/order/', [CartController::class, 'checkoutOrder'])
        ->name('checkout.order');

    Route::post('/confirm/order/', [CartController::class, 'confirmOrder'])
        ->name('confirm.order');

    // TODO: Rutas de Evento Broadcasting Test
    Route::get('/sendEvent', function () {
        $mensaje = 'Por fin hicimos una transmisión';
        //event(new \App\Events\OrderPlaced($mensaje));
    });

    Route::get('/listenEvent', function () {
        return view('pusher.listen');
    });

    // TODO: Rutas de Eager and Lazy loading
    Route::get('/eager', [HomeController::class, 'eager']);
    Route::get('/lazy', [HomeController::class, 'lazy']);

    // TODO: Rutas de vue
    Route::get('/comments/{id}', [CommentController::class, 'index']);
    Route::post('/comment/create', [CommentController::class, 'store']);
    Route::put('/comment/update/{id}', [CommentController::class, 'update']);
    Route::delete('/comment/delete/{id}', [CommentController::class, 'destroy']);
});

Route::get('auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])
    ->name('social.auth');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback']);

Route::get('/catalogo/', [ProductController::class, 'catalog'])
    ->name('landing.catalog');
Route::get('/landing/get/products/', [ProductController::class, 'getProducts']);

Route::get('/product/detail/{idProduct}', [ProductController::class, 'getProductById'])
    ->name('landing.detail');

Route::get('/contacto', [MailController::class, 'showContact'])
    ->name('show.contact');


// Customer

// Customer_address
// m // method_ship

// ------
// Product
// Product_image
// Product_info
// -----

//Procesos
// cart
// cart_product
// Sale
// Sale_product
// Notification
// Comment
// Banner
// Product_top
// Information


require __DIR__ . '/auth.php';
