<?php

namespace App\Http\Controllers;

use App\Http\Requests\BikeStoreRequest;
use App\Http\Requests\BikeUpdateRequest;
use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Auth;


class BikeController extends Controller
{
    public function index()
    {
        $this->middleware(['auth', 'verified']);

        $bikes = auth()->user()->bikes()->orderBy('created_at', 'desc')->paginate(10); 

        // dd($bikes);

        return Inertia::render('Dashboard', [
            'bikes' => $bikes,
        ]);


    }

    public function show(Bike $bike)
    {
      dd($bike->id);
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

        
        return Redirect::route('dashboard')->with('message', 'Bike added successfully!');

    }

    public function update(BikeUpdateRequest $request, Bike $bike)
    {
        
        $validatedData = $request->validated();

        $updateData = [];
    
        $fieldsToUpdate = ['bike_name', 'brand', 'model', 'year', 'serial_number'];
        
        
        foreach ($fieldsToUpdate as $field) {
            if (isset($validatedData[$field]) && !empty($validatedData[$field])) {
                $updateData[$field] = $validatedData[$field];
            }
        }
    
        $bike->update($updateData);


        return Redirect::route('dashboard')->with('message', 'Bike updated.');
    }

    public function destroy(Bike $bike)
    {
        $bike->delete();

        return Redirect::route('dashboard')->with('message', 'Bike deleted.');
    }


    public function destroyBikes()
{
    $user = auth()->user();

    $user->bikes()->delete();

    return Redirect::route('dashboard')->with('message', 'You have successfully deleted all your bikes.');
}

   
}
