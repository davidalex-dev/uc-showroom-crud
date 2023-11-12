<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Truck;
use App\Models\Order;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        
        $vehicle = Vehicle::with(['car', 'truck', 'motorcycle'])->get();
        return view('vehicle.index')
        ->with('vehicle', $vehicle);

    }

    public function create()
    {
        return view('vehicle.create');
    }

    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicle.show')->with('vehicle', $vehicle);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:car,truck,motorcycle',
            'model' => 'required|string',
            'year' => 'required|integer',
            'manufacturer' => 'required|string',
            'price' => 'required|numeric',
            // 'image' => 'required|image|mimes:jpeg,jpg,png|max:16384'
        ]);

        $newVehicle = Vehicle::create([
            'type' => $request->input('type'),
            'image' => "https://i.imgflip.com/7rnfsb.jpg",
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'manufacturer' => $request->input('manufacturer'),
            'price' => $request->input('price'),
            ]);

        if ($request->input('type') === 'car') {
            Car::create([
                'fuelType' => $request->input('fuelType'),
                'trunkArea' => $request->input('trunkArea'),
                'seats' => $request->input('seats'),
                'vehicleID' => $newVehicle->id,
            ]);
        };

        if ($request->input('type') === 'motorcycle') {
            Motorcycle::create([
                'trunkSize' => $request->input('trunkSize'),
                'petrolCapacity' => $request->input('petrolCapacity'),
                'vehicleID' => $newVehicle->id,
            ]);
        };

        if ($request->input('type') === 'truck') {
            Truck::create([
                'numTires' => $request->input('numTires'),
                'cargoArea' => $request->input('cargoArea'),
                'seats' => $request->input('seats'),
                'vehicleID' => $newVehicle->id,
            ]);
        };
    
        return redirect()->route('vehicle.index');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:car,truck,motorcycle',
            'model' => 'required|string',
            'year' => 'required|integer',
            'manufacturer' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $vehicle = Vehicle::findOrFail($id);

        $vehicle->update($request->all());

        if ($request->input('type') === 'motorcycle') {
            Motorcycle::where('vehicleID', $vehicle->id)->update($request->except(['_token', '_method', 'type', 'name', 'model', 'year', 'manufacturer', 'price']));
        } elseif ($request->input('type') === 'car') {
            Car::where('vehicleID', $vehicle->id)->update($request->except(['_token', '_method', 'type', 'name', 'model', 'year', 'manufacturer', 'price']));
        } elseif ($request->input('type') === 'truck') {
            Truck::where('vehicleID', $vehicle->id)->update($request->except(['_token', '_method', 'type', 'name', 'model', 'year', 'manufacturer', 'price']));
        }

        return redirect()->route('vehicle.index')->with('success', 'Vehicle updated successfully');
    }

    public function destroy(Vehicle $vehicle)
    {
        Order::where('vehicleID', $vehicle->id)->delete();

        if ($vehicle->type === 'motorcycle') {
            Motorcycle::where('vehicleID', $vehicle->id)->delete();
        } elseif ($vehicle->type === 'car') {
            Car::where('vehicleID', $vehicle->id)->delete();
        } elseif ($vehicle->type === 'truck') {
            Truck::where('vehicleID', $vehicle->id)->delete();
        }

        $vehicle->delete();

        return redirect()->route('vehicle.index');
    }
}
