<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BikeStoreRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'bike_name' => 'required|string|max:15',
            'brand' => 'required|string|max:10',
            'model' => 'required|string|max:15',
            'year' => 'nullable|integer',
            'serial_number' => 'required|string|max:20',
        ];
    }
}
