@extends('layouts.layout')

@section('content')
    
    <h1 class="mb-0">Edit Order</h1>
    <hr />

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('order.update', ['order' => $order->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class=row mb-3>

            <div class="col">
                <input type="hidden" name="customerID" value="{{ $order->customerID }}">
                <p>{{ $order->customer->name }}</p>
            </div>

            <div class="col">
                <select name="vehicleID" class="form-control" id="vehicleID">
                    <option value="">Select Vehicle</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}" data-price="{{ $vehicle->price }}" 
                            {{ $order->vehicleID == $vehicle->id ? 'selected' : '' }}>
                            {{ $vehicle->manufacturer }} {{ $vehicle->model }} ({{ $vehicle->year }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <select name="quantity" class="form-control" id="quantity">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ $i == $order->total ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>

        </div>

        <div class="row mb-3">
            <p>Total Price: <span id="totalPrice">0</span></p>
        </div>

        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log("DOM content loaded!");

        var quantitySelect = document.getElementById('quantity');
        var vehicleSelect = document.getElementById('vehicleID');
        var totalPriceSpan = document.getElementById('totalPrice');

        quantitySelect.addEventListener('change', calculateTotal);
        vehicleSelect.addEventListener('change', calculateTotal);

        function calculateTotal() {
            // Get the selected quantity and vehicle price
            var quantity = parseInt(quantitySelect.value);
            var vehiclePrice = parseFloat(vehicleSelect.options[vehicleSelect.selectedIndex].getAttribute('data-price'));

            // Calculate the total price
            var totalPrice = quantity * vehiclePrice;

            // Update the total price in the HTML
            totalPriceSpan.textContent = totalPrice;
        }
    });
</script>

@endsection
