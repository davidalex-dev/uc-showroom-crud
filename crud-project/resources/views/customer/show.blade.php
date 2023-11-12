@extends('layouts.layout')

@section('content')

    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Orders from {{ $customer->name }}</h1>
        <a href="{{ route('order.create') }}" class="btn btn-primary">Make an Order</a>
    </div>
    <hr />

    @if ($customer->orders->count() > 0)
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Vehicle</th>
                <th>Purchased</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            @foreach($customer->orders as $order)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $order->vehicle->manufacturer }} {{ $order->vehicle->model }} ({{ $order->vehicle->year }})</td>
                    <td class="align-middle">{{ $order->created_at }}</td>
                    <td class="align-middle">{{ $order->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No orders for this customer.</p>
@endif

    
@endsection