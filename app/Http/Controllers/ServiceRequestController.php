<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequestStoreRequest;
use App\Http\Requests\ServiceRequestUpdateRequest;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index()
    {
        // Retrieve a list of service requests
        // ...
    }

    public function show(ServiceRequest $serviceRequest)
    {
        // Show a specific service request
        // ...
    }

    public function store(ServiceRequestStoreRequest $request)
    {
        // Create a new service request
        // ...
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
