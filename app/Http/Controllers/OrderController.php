<?php
namespace App\Http\Controllers;
use App\Order;
use App\Http\Resources\OrderResource;
use DB;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;



class OrderController extends Controller {
    // public function showOrders(){
        
    //     $order = new Order();
    //     $orders = $order->get('http://localhost:8000/api/orders');
    //     return view('orders.index', ['orders' => $orders]);
    // }

    public function showOrder($id){
        $order = new Order();
        $orders = $order->get('http://localhost:8000/api/orders/{id}');
        return view('orders.show', ['orders' => $orders]);
    }


    public function index() {

        $orders = Order::all();
        // return Response::json(array(
        //     'status' => 'success',
        //     'orders' => $orders->toArray(),
        //     200
        // ));
        return Response::json($orders);
    }

    public function showOrders(){

        // $order = new Order();
        //   $response = $order->get('http://localhost:8000/api/orders/');
     
        //      $body = $response->getBody()->getContents();
             $orders = json_decode('http://localhost:8000/api/orders/');
             return view("orders.index", ['orders'=>$orders]);
     
     
     }
     
    public function store() {
        $input = Input::all();
        $order = new Order;

        if ( $input['order_id'] ) {
            $order->order_id =$input['order_id'];
        }
        if ( $input['prod_id'] ) {
            $order->prod_id =$input['prod_id'];
        }
        if ( $input['user_id'] ) {
            $order->user_id =$input['user_id'];
        }
        if ( $input['quantity'] ) {
            $order->quantity =$input['quantity'];
        }

        $order->save();

        return Response::json(array(
            'error' => false,
            'orders' => $order->toArray()),
            200
        );
    }



    public function show($id) {
        $orders = Order::where('order_id', $id)
                    ->take(1)
                    ->get();

        // return Response::json(array(
        //     'status' => 'success',
        //     'orders' => $order->toArray()),
        //     200
        // );
        return Response::json($orders);

    }




    public function update($id) {
        $input = Input::all();
        $order = Order::find($id);

        if ( $input['order_id'] ) {
            $order->order_id =$input['order_id'];
        }
        if ( $input['prod_id'] ) {
            $order->prod_id =$input['prod_id'];
        }
        if ( $input['user_id'] ) {
            $order->user_id =$input['user_id'];
        }
        if ( $input['quantity'] ) {
            $order->quantity =$input['quantity'];
        }

        $order->save();

        return Response::json(array(
            'error' => false,
            'message' => 'Page Updated'),
            200
        );
    }

    public function destroy($id) {
        $order = Order::find($id);
        $order->delete();
        return Response::json(array(
            'error' => false,
            'message' => 'Order Deleted'),
            200
        );
    }}