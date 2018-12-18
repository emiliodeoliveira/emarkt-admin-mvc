<?php
namespace App\Http\Controllers;
use App\Product;
use App\Http\Resources\ProductResource;
use DB;
use DateTime;
use View;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;



class ProductController extends Controller {
    // public function showProducts(){
        
    //     $product = new Product();
    //     $products = $product->get('http://localhost:8000/api/products');
    //     return view('products.index', ['products' => $products]);
    // }

    public function showProduct($id){
        $product = Product::find($id);
        return view("products.show", ['product'=>$product]);     
     }


    public function index() {

        $products = Product::all();
        // return Response::json(array(
        //     'status' => 'success',
        //     'products' => $products->toArray(),
        //     200
        // ));
        return Response::json($products);
    }

    public function showProducts(){
        $products = Product::all();
        return view("products.index", ['products'=>$products]);
     
     }

    public function store() {
        $product = new Product;
        $product->id       = Input::get('id');
        $product->name      = Input::get('name');
        $product->description      = Input::get('description');
        $product->price      = Input::get('price');
        $now = new DateTime();
        $product->created_at      = $now->format('Y-m-d');
        $product->updated_at      = $now->format('Y-m-d');


        $product->save();


        return Response::json(array(
            'error' => false,
            'products' => $product->toArray()),
            200
        );
    }



    public function show($id) {
        $products = Product::where('id', $id)
                    ->take(1)
                    ->get();

        return Response::json(array(
            'status' => 'success',
            'products' => $products->toArray()),
            200
        );
        // return Response::json($products);

    }
    public function edit($id)
    {
        $product = Product::find($id);
        // Load user/createOrUpdate.blade.php view
        return View::make('products.edit')->with('product', $product);
    }



    public function update($id) {
        $input = Input::all();
        $product = Product::find($id);

        $product->id       = $id;
        $product->name      = Input::get('name');
        $product->description      = Input::get('description');
        $product->price      = Input::get('price');
        $now = new DateTime();

        $creation = $product->created_at;
        $product->created_at     = $creation;
        $product->updated_at      = $now->format('Y-m-d');
        $product->save();
        return redirect('/products');
        // return Response::json(array(
        //     'error' => false,
        //     'message' => 'Page Updated'),
        //     200
        // );
    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return Response::json(array(
            'error' => false,
            'message' => 'Product Deleted'),
            200
        );
    }}