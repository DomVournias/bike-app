<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequestStoreRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'bike_name' => 'required|string',
            'task' => 'required|string|max:100',
            'bike_id' => 'nullable|integer',
            'done' => 'nullable',
            'cost' => 'nullable|integer',
        ];
    }
}
