<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BikeUpdateRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'bike_name' => 'nullable|string|max:15',
            'brand' => 'nullable|string|max:10',
            'model' => 'nullable|string|max:15',
            'year' => 'nullable|integer',
            'serial_number' => 'nullable|string|max:20',
        ];
    }
}
