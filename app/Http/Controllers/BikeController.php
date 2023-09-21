<?php

namespace App\Http\Controllers;

use App\Http\Requests\BikeStoreRequest;
use App\Http\Requests\BikeUpdateRequest;
use App\Models\Bike;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Auth;


class BikeController extends Controller
{
    public function index()
    {
        $this->middleware(['auth', 'verified']);

        $bikes = auth()->user()->bikes()->orderBy('created_at', 'desc')->get(); 

        return Inertia::render('Dashboard', [
            'bikes' => $bikes,
        ]);

        // return Inertia::render('Dashboard', [
        //     'bikes' => Bike::with('user')->get(),
        // ]);

    }

    public function show(Bike $bike)
    {
      dd($bike->id);

    //   return inertia('Bikes/UpdateBikeForm', [
    //     'message'=> 'My message!',
    //   ]);
    // return Inertia::render('Dashboard', [
    //     'bike' => $bike,
    // ]);
    }

    public function store(BikeStoreRequest $request)
    {
        $validatedData = $request->validated();

        Bike::create([
            'bike_name' => $validatedData['bike_name'],
            'brand' => $validatedData['brand'],
            'model' => $validatedData['model'],
            'year' => $validatedData['year'],
            'serial_number' => $validatedData['serial_number'],
            'user_id' => auth()->user()->id, 
        ]);

        
        // session()->flash('success', 'Bike created successfully!');

        // return inertia('Dashboard');

    }

    public function update(BikeUpdateRequest $request, Bike $bike)
    {
        $this->authorize('update', $bike);

        $validatedData = $request->validated();

        $bike->update([
            'bike_name' => $validatedData['bike_name'],
            'brand' => $validatedData['brand'],
            'model' => $validatedData['model'],
            'year' => $validatedData['year'],
            'serial_number' => $validatedData['serial_number'],
        ]);
    }

    public function destroy(Bike $bike)
    {
        // Delete a bike
        // ...
    }

    public function mechanicname(Bike $name)
    {
        dd($name);
    }
}
