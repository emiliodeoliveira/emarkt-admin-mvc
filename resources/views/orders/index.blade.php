@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('order.create') }}"> Create New Request</a>
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
            <th>No</th>
            <th>Product</th>
            <th>Quantity</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->product }}</td>
            <td>{{ $order->quantity }}</td>
            <td>
                <form action="{{ route('order.destroy',$request->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('order.show',$order->id) }}">Show</a>

 
    
                    <a class="btn btn-primary" href="{{ route('order.edit',$order->id) }}">Edit</a>
   
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $order->links() !!}
      
@endsection