@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>eMarkt</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('order.create') }}"> Create New Product</a>
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
            <th>Number</th>
            <th>Product</th>
            <th>Quantity</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($order as $request)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $request->product }}</td>
            <td>{{ $request->quantity }}</td>
            <td>
                <form action="{{ route('order.destroy',$request->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('order.show',$request->id) }}">Show</a>

 
    
                    <a class="btn btn-primary" href="{{ route('order.edit',$request->id) }}">Edit</a>
   
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