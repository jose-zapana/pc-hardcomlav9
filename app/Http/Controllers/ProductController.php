<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\ProductDeleteRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductInfo;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories', 'shop'])->get();

        //dd($products);

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $shops = Shop::all();
        $categories = Category::all();

        return view('product.create', compact('shops', 'categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        //var_dump( $request );
        $validated = $request->validated();

        // TODO: Esto debe estar en una transaccion

        DB::beginTransaction();
        try {
            $product = Product::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'stock' => $request->get('stock'),
                'unit_price' => $request->get('unit_price'),
                'shop_id' => $request->get('shop')
            ]);

            $infos = $request->get('infos');
            $specifications = $request->get('specifications');
            $images = $request->file('images');
            $alts = $request->get('alts');

            $categories = $request->get('categories');

            // TODO: Sincronizamos las categorías
            $product->categories()->sync($categories);

            //var_dump( $specifications[0] );
            // TODO: Creamos los ProductInfo
            for ( $i = 0; $i< sizeof($infos); $i++ )
            {
                //var_dump($infos[0]);
                // TODO: Esta inserción puede fallar por lo que podriamos un try catch
                ProductInfo::create([
                    'product_id' => $product->id,
                    'specification' => $infos[$i],
                    'content' => $specifications[$i]
                ]);
            }

            // TODO: Creamos las imágenes
            if ( $images )
            {
                $num = 0;
                foreach ( $images as $image )
                {
                    // TODO: Tratamiento de un archivo de forma tradicional
                    //var_dump($image->getClientOriginalExtension());
                    /*$path = public_path().'/images/product/';
                    $extension = $image->getClientOriginalExtension();
                    $filename = $alts[$num] . '.' . $extension;
                    $image->move($path, $filename);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                        'alt' => $alts[$num]
                    ]);
                    $num++;*/
                    // TODO: Tratamiento de una imagen usando intervention image
                    $path = public_path().'/images/product/';
                    $extension = $image->getClientOriginalExtension();
                    $filename = $alts[$num] . '.' . $extension;

                    $img = Image::make($image);
                    $img->resize(800, 500);

                    $watermark = Image::make($path.'watermark.png');
                    $watermark->resize(800, 500);

                    $img->insert($watermark, 'center');

                    $img->save($path.$filename, 70);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                        'alt' => $alts[$num]
                    ]);
                    $num++;
                }
            }

            DB::commit();
        } catch ( \Throwable $e ) {
            DB::rollBack();
            return response()->json(['message' => $e], 422);
        }

        return response()->json(['message' => 'Producto guardado con éxito.'], 200);

    }

    public function edit( $id )
    {
        $product = Product::where('id', $id)->with(['shop', 'categories'])->first();
        $categories = Category::all();
        $shops = Shop::all();
        $cats = $product->categories->pluck('id')->toArray();
        //dd($cats);
        return view('product.edit', compact('shops', 'categories', 'product', 'cats'));
    }

    public function update(ProductUpdateRequest $request)
    {
        //var_dump( $request );
        $validated = $request->validated();

        // TODO: Esto debe estar en una transaccion

        DB::beginTransaction();
        try {
            $product = Product::find($request->get('product_id'));
            // Modificar los datos
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->stock = $request->get('stock');
            $product->unit_price = $request->get('unit_price');
            $product->shop_id = $request->get('shop');
            $product->save();

            $infos = $request->get('infos');
            $specifications = $request->get('specifications');
            $images = $request->file('images');
            $alts = $request->get('alts');

            $categories = $request->get('categories');

            // TODO: Sincronizamos las categorías
            $product->categories()->sync($categories);

            //var_dump( $specifications[0] );
            // TODO: Creamos los ProductInfo
            // TODO: Eliminar todos los productInfos anteriores
            ProductInfo::where('product_id', $product->id)->delete();

            for ( $i = 0; $i< sizeof($infos); $i++ )
            {
                //var_dump($infos[0]);
                // TODO: Esta inserción puede fallar por lo que podriamos un try catch
                ProductInfo::create([
                    'product_id' => $product->id,
                    'specification' => $infos[$i],
                    'content' => $specifications[$i]
                ]);
            }

            // TODO: Creamos las imágenes
            if ( $images )
            {
                $num = 0;
                foreach ( $images as $image )
                {
                    // TODO: Tratamiento de una imagen usando intervention image
                    $path = public_path().'/images/product/';
                    $extension = $image->getClientOriginalExtension();
                    $filename = $alts[$num] . '.' . $extension;

                    $img = Image::make($image);
                    $img->resize(800, 500);

                    $watermark = Image::make($path.'watermark.png');
                    $watermark->resize(800, 500);

                    $img->insert($watermark, 'center');

                    $img->save($path.$filename, 70);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                        'alt' => $alts[$num]
                    ]);
                    $num++;
                }
            }

            DB::commit();
        } catch ( \Throwable $e ) {
            DB::rollBack();
            return response()->json(['message' => $e], 422);
        }

        return response()->json(['message' => 'Producto modificado con éxito.'], 200);

    }

    public function destroy(ProductDeleteRequest $request)
    {
        $product = Product::find($request->get('product_id'));
        $product->delete();
        return response()->json(['message' => 'Producto eliminado con éxito.'], 200);

    }

    public function getInfo( $idProduct )
    {
        $product = Product::find($idProduct);
        $infos = $product->infos;

        return $infos;
    }

    public function getImages( $idProduct )
    {
        $product = Product::find($idProduct);
        $images = $product->images;

        return $images;
    }

    public function deleteImages( $idImage )
    {
        $productImage = ProductImage::find($idImage);
        $filename = public_path().'/images/product/'.$productImage->image;
        if ( file_exists($filename) )
        {
            unlink($filename);
            $productImage->delete();
            return response()->json(['message' => 'Imagen eliminada con éxito.', 'status'=>'success'], 200);

        }

        return response()->json(['message' => 'No se encuentra la imagen.', 'status'=>'error'], 200);

    }

    public function catalog()
    {
        $categories = Category::where('shop_id', 1)->get();
        return view('landing.catalog', compact('categories'));
    }

    public function getProducts()
    {
        $products = Product::where('shop_id', 1)->with('categories')->with('images')->get();

        return $products;
    }

    public function getProductById( $idProduct )
    {
        $product = Product::where('id', $idProduct)->where('shop_id', 1)->with(['categories', 'images', 'infos'])->first();

        return view('landing.detail', compact('product'));
    }
}
