@extends('layouts.layout')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Vehicles</h1>
        <a href="{{ route('vehicle.create') }}" class="btn btn-primary">Add Vehicle</a>
    </div>
    <hr />
    
    <h2>Cars</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Model</th>
                <th>Manufacturer</th>
                <th>Year</th>
                <th>Price</th>
                <th>Fuel Type</th>
                <th>Trunk Area</th>
                <th>Seats</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($vehicle->where('type', 'car') as $car)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->manufacturer }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->price }}</td>
                    <td>{{ $car->car->fuelType }}</td>
                    <td>{{ $car->car->trunkArea }}</td>
                    <td>{{ $car->car->seats }}</td>
                    
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('vehicle.edit', $car->id) }}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('vehicle.destroy', $car->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Motorcycles</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Model</th>
                <th>Manufacturer</th>
                <th>Year</th>
                <th>Price</th>
                <th>Trunk Size</th>
                <th>Petrol Capacity</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($vehicle->where('type', 'motorcycle') as $motorcycle)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td>{{ $motorcycle->model }}</td>
                    <td>{{ $motorcycle->manufacturer }}</td>
                    <td>{{ $motorcycle->year }}</td>
                    <td>{{ $motorcycle->price }}</td>
                    <td>{{ $motorcycle->motorcycle->trunkSize }}</td>
                    <td>{{ $motorcycle->motorcycle->petrolCapacity }}</td>
                    
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('vehicle.edit', $motorcycle->id) }}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('vehicle.destroy', $motorcycle->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <h2>Trucks</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Model</th>
                <th>Manufacturer</th>
                <th>Year</th>
                <th>Price</th>
                <th>Tires</th>
                <th>Cargo Area</th>
                <th>Seats</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($vehicle->where('type', 'truck') as $truck)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td>{{ $truck->model }}</td>
                    <td>{{ $truck->manufacturer }}</td>
                    <td>{{ $truck->year }}</td>
                    <td>{{ $truck->price }}</td>
                    <td>{{ $truck->truck->numTires }}</td>
                    <td>{{ $truck->truck->cargoArea }}</td>
                    <td>{{ $truck->truck->seats }}</td>
                    
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('vehicle.edit', $truck->id) }}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('vehicle.destroy', $truck->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection