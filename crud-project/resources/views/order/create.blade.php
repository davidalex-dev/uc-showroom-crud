@extends('layouts.layout')

@section('content')
    
    <h1 class="mb-0">Create Order</h1>
    <hr />

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class=row mb-3>

            <div class="col">
                <select name="customerID" class="form-control" id="customerID">
                    <option value="">Select Customer</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <select name="vehicleID" class="form-control" id="vehicleID">
                    <option value="">Select Vehicle</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}" data-price="{{ $vehicle->price }}">{{ $vehicle->manufacturer }} {{ $vehicle->model }} ({{ $vehicle->year }})</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <select name="quantity" class="form-control" id="quantity">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
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
