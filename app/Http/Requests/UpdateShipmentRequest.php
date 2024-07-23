<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'code' => 'required|string|unique:shipments,code,' . $this->shipment->id,
            'shipper' => 'required|string',
            'image' => 'nullable|image',
            'weight' => 'required|numeric|min:0',
            'description' => 'required|string',
            'status' => 'required|in:Pending,Progress,Done',
        ];
    
        if ($this->isMethod('post')) { 
            $rules['code'] = 'required|unique:shipments,code';
            $rules['image'] = 'required|image';
        }
    
        return $rules;
    }
    

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'code.required' => 'A shipment code is required',
            'code.unique' => 'This shipment code is already in use',
            'shipper.required' => 'The shipper name is required',
            'image.required' => 'An image is required',
            'image.image' => 'The file must be an image',
            'weight.required' => 'The weight is required',
            'weight.numeric' => 'The weight must be a number',
            'weight.min' => 'The weight must be at least 0',
            'description.required' => 'A description is required',
            'status.required' => 'The status is required',
            'status.in' => 'The status must be one of: Pending, Progress, Done',
        ];
    }
}
