<?php
namespace App\Http\Controllers;
use App\Product;
use App\Http\Resources\ProductResource;
use DB;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;



class ProductController extends Controller {
    // public function showProducts(){
        
    //     $product = new Product();
    //     $products = $product->get('http://localhost:8000/api/products');
    //     return view('products.index', ['products' => $products]);
    // }

    public function showProduct($id){
        $product = new Product();
        $products = $product->get('http://localhost:8000/api/products/{id}');
        return view('products.show', ['products' => $products]);
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
        $input = Input::all();
        $product = new Product;

        if ( $input['id'] ) {
            $product->id =$input['id'];
        }
        if ( $input['name'] ) {
            $product->name =$input['name'];
        }
        if ( $input['description'] ) {
            $product->description =$input['description'];
        }
        if ( $input['price'] ) {
            $product->price =$input['price'];
        }

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

        // return Response::json(array(
        //     'status' => 'success',
        //     'products' => $product->toArray()),
        //     200
        // );
        return Response::json($products);

    }




    public function update($id) {
        $input = Input::all();
        $product = Product::find($id);

        if ( $input['id'] ) {
            $product->id =$input['id'];
        }
        if ( $input['name'] ) {
            $product->name =$input['name'];
        }
        if ( $input['description'] ) {
            $product->description =$input['description'];
        }
        if ( $input['price'] ) {
            $product->price =$input['price'];
        }

        $product->save();

        return Response::json(array(
            'error' => false,
            'message' => 'Page Updated'),
            200
        );
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