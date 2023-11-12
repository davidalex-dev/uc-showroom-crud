@extends('layouts.layout')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Orders</h1>
        <a href="{{ route('order.create') }}" class="btn btn-primary">Make an Order</a>
    </div>
    <hr />
    
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Vehicle</th>
                <th>Purchased</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
            @if($orders->count() > 0)
                @foreach($orders as $order)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $order->customer->name }}</td>
                        <td class="align-middle">{{ $order->vehicle->manufacturer }} {{ $order->vehicle->model }} ({{ $order->vehicle->year }})</td>
                        <td class="align-middle">{{ $order->created_at }}</td>
                        <td class="align-middle">{{ $order->total}}</td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('order.edit', $order->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('order.destroy', $order->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
             
        </tbody>
    </table>
@endsection