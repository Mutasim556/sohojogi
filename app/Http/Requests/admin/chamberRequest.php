<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class chamberRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'chamber_name' => 'required|max:255',
            'chamber_phone' => 'required|max:255|unique:chambers,chamber_phone',
            'chamber_address' => 'required|max:255',
        ];
    }
}
