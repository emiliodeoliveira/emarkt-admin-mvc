@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/orders/create"> Create New Request</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Product</th>
            <th>Quantity</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->prod_id }}</td>
            <td>{{ $order->quantity }}</td>
            <td>
                <form action="{{ route('orders.destroy',$order->order_id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('orders.show',$order->order_id) }}">Show</a>

 
    
                    <a class="btn btn-primary" href="{{ route('orders.edit',$order->order_id) }}">Edit</a>
   
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection