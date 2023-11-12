@extends('layouts.layout')

@section('content')

    @php
        use App\Models\Car;
        use App\Models\Motorcycle;
        use App\Models\Truck;
    @endphp
    
    <h1 class="mb-0">Add Vehicle</h1>
    <hr />

    <form action="{{ route('vehicle.store') }}" method="POST">
        @csrf
        <div class=row mb-3>

            <div class="col">
                <input type="text" name="model" class="form-control" placeholder="model">
            </div>

            <div class="col">
                <input type="text" name="manufacturer" class="form-control" placeholder="manufacturer">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <select name="type" class="form-control" id="vehicleType">
                    <option value="">Select Vehicle Type</option>
                    <option value="car">Car</option>
                    <option value="truck">Truck</option>
                    <option value="motorcycle">Motorcycle</option>
                </select>
            </div>
            
            <div class="col">
            <input type="text" name="price" class="form-control" placeholder="Price">
            </div>
        </div>

        <div class="row mb-3" id="carFields" style="display: none;">
            <div class="col">
                <input type="text" name="fuelType" class="form-control" placeholder="Fuel Type">
            </div>
            <div class="col">
                <input type="text" name="trunkArea" class="form-control" placeholder="Trunk Area">
            </div>
            <div class="col">
                <input type="text" name="carSeats" class="form-control" placeholder="Seats">
            </div>
        </div>

        <div class="row mb-3" id="motorFields" style="display: none;">
            <div class="col">
                <input type="text" name="trunkSize" class="form-control" placeholder="Trunk Size">
            </div>
            <div class="col">
                <input type="text" name="petrolCapacity" class="form-control" placeholder="Petrol Capacity">
            </div>
        </div>

        <div class="row mb-3" id="truckFields" style="display: none;">
            <div class="col">
                <input type="text" name="numTires" class="form-control" placeholder="Number of Tires">
            </div>
            <div class="col">
                <input type="text" name="cargoArea" class="form-control" placeholder="Cargo Area">
            </div>
            <div class="col">
                <input type="text" name="seats" class="form-control" placeholder="Seats">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="year" class="form-control" placeholder="Year">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('vehicleType').addEventListener('change', function() {
            var selectedValue = this.value;
            var carFieldsRow = document.getElementById('carFields');
            var motorFieldsRow = document.getElementById('motorFields');
            var truckFieldsRow = document.getElementById('truckFields');

            carFieldsRow.style.display = (selectedValue === 'car') ? 'flex' : 'none';
            motorFieldsRow.style.display = (selectedValue === 'motorcycle') ? 'flex' : 'none';
            truckFieldsRow.style.display = (selectedValue === 'truck') ? 'flex' : 'none';
        });
    </script>
@endsection

