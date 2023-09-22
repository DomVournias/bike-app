<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequestStoreRequest;
use App\Http\Requests\ServiceRequestUpdateRequest;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class ServiceRequestController extends Controller
{
    public function index()
    {
        $this->middleware(['auth', 'verified']);

        $bikes = auth()->user()->bikes()->orderBy('created_at', 'desc')->get(); 
        $service_requests = auth()->user()->serviceRequests()->orderBy('created_at', 'desc')->get(); 

        return Inertia::render('ServiceRequests', [
            'bikes' => $bikes,
            'service_requests' => $service_requests,
        ]);


    }

    public function show(ServiceRequest $serviceRequest)
    {
        // Show a specific service request
        // ...
    }

    public function store(ServiceRequestStoreRequest $request)
    {
        $validatedData = $request->validated();

        ServiceRequest::create([
            'bike_name' => $validatedData['bike_name'],
            'task' => $validatedData['task'],
            'bike_id' => $validatedData['bike_id'],
            'done' => $validatedData['done'],
            'cost' => $validatedData['cost'],
            'user_id' => auth()->user()->id, 
        ]);

        
        return Redirect::route('service-requests')->with('message', 'Service request sent successfully!');

    }

    public function update(ServiceRequestUpdateRequest $request, ServiceRequest $serviceRequest)
    {
        // Update an existing service request
        // ...
    }

    public function destroy(ServiceRequest $serviceRequest)
    {
        // Delete a service request
        // ...
    }

}
