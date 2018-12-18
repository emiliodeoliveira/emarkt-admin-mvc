<?php
namespace App\Http\Controllers;

use App\Product;
use App\Order;
use Illuminate\Support\Facades\View;
use App\Http\Resources\ProductResource;
use DB;

use Illuminate\Http\Request;
class ProductController extends Controller{

    public function index()
    {
      return ProductResource::collection(Product::with('categories')->paginate(25));
    }

    public function productIndex()
    {
        $products = Product::all();

        
        
    }

    public function getProducts()
{
    $product = DB::table('products')
        ->get(['id','name','description','price', 'created_at']);
    return response()->json($product);
}



public function getProductWithId(Request $request)
{
    $prodId = (int)$request->get('id');
    $product = DB::table('products')
        ->where('id', $prodId)
        ->get(['id','name','description','price', 'created_at']);
    return response()->json($product);
}

    public function store(Request $request)
    {
      $product = Product::create([
        'id' => $request->prod_id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category' => $request->category,
      ]);

      return new ProductResource($product);
    }

    public function show(Product $product)
    {
      return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
      // check if currently authenticated user is the owner of the product
      if ($request->id !== $product->id) {
        return response()->json(['error' => 'You can only edit your own products.'], 403);
      }

      $product->update($request->only(['name', 'description']));

      return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
      $product->delete();

      return response()->json(null, 204);
    }

    public function showProducts(){
        $products = DB::table('products')->get();
        return view("products.index", ['products'=>$products]);
    }

   

   
}