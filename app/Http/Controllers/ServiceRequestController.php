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


    public function adminIndex()
    {
        $this->middleware(['auth', 'verified']);

        
        $service_requests = ServiceRequest::with('user')->orderBy('created_at', 'desc')->get();

        return Inertia::render('Admin', [
            'service_requests' => $service_requests,
        ]); 
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
        
        $validatedData = $request->validated();

        $updateData = [];
    
        $fieldsToUpdate = ['cost', 'done'];
        
        
        foreach ($fieldsToUpdate as $field) {
            if (isset($validatedData[$field]) && !empty($validatedData[$field])) {
                $updateData[$field] = $validatedData[$field];
            }
        }
    
        $serviceRequest->update($updateData);


        return Redirect::route('admin')->with('message', 'Service Request completed.');
    }

    public function updateStatus(ServiceRequest $serviceRequest, $status)
    {
    
        $serviceRequest->update(['done' => $status]);
    
        return Redirect::route('service-requests')->with('message', 'Service Request status updated.');
    }

    public function destroy(ServiceRequest $serviceRequest)
    {
        $serviceRequest->delete();

        return Redirect::route('service-requests')->with('message', 'Service Request deleted.');
    }

}
