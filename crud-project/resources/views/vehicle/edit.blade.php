@extends('layouts.layout')

@section('content')

    @php
        use App\Models\Car;
        use App\Models\Motorcycle;
        use App\Models\Truck;
    @endphp
    
    <h1 class="mb-0">Edit Vehicle</h1>
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

    <form action="{{ route('vehicle.update', ['vehicle' => $vehicle->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class=row mb-3>

            <div class="col">
                <input type="text" name="model" class="form-control" placeholder="model" value="{{ $vehicle->model }}">
            </div>

            <div class="col">
                <input type="text" name="manufacturer" class="form-control" placeholder="manufacturer" value="{{ $vehicle->manufacturer }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="type" value="{{ $vehicle->type }}">
                <p>{{ $vehicle->type }}</p>
            </div>
            
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $vehicle->price }}">
            </div>
        </div>

        @if($vehicle->type == 'car')
            <div class="row mb-3" id="carFields">
                <div class="col">
                    <input type="text" name="fuelType" class="form-control" placeholder="Fuel Type" value="{{ $vehicle->car->fuelType }}">
                </div>
                <div class="col">
                    <input type="text" name="trunkArea" class="form-control" placeholder="Trunk Area" value="{{ $vehicle->car->trunkArea }}">
                </div>
                <div class="col">
                    <input type="text" name="seats" class="form-control" placeholder="Seats" value="{{ $vehicle->car->seats }}">
                </div>
            </div>
        @endif

        @if($vehicle->type == 'motorcycle')
            <div class="row mb-3" id="motorFields">
                <div class="col">
                    <input type="text" name="trunkSize" class="form-control" placeholder="Trunk Size" value="{{ $vehicle->motorcycle->trunkSize }}">
                </div>
                <div class="col">
                    <input type="text" name="petrolCapacity" class="form-control" placeholder="Petrol Capacity" value="{{ $vehicle->motorcycle->petrolCapacity }}">
                </div>
            </div>
        @endif

        @if($vehicle->type == 'truck')
            <div class="row mb-3" id="truckFields">
                <div class="col">
                    <input type="text" name="numTires" class="form-control" placeholder="Number of Tires" value="{{ $vehicle->truck->numTires }}">
                </div>
                <div class="col">
                    <input type="text" name="cargoArea" class="form-control" placeholder="Cargo Area" value="{{ $vehicle->truck->cargoArea }}">
                </div>
                <div class="col">
                    <input type="text" name="seats" class="form-control" placeholder="Seats" value="{{ $vehicle->truck->seats }}">
                </div>
            </div>
        @endif

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="year" class="form-control" placeholder="Year" value="{{ $vehicle->year }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

