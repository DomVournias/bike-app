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
            'description' => 'required|string|max:255',
            'worksheet' => 'required|json',
        ];
    }
}
