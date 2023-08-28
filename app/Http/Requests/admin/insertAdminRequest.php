<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class insertAdminRequest extends FormRequest
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
            'name'=>'required|max:70',
            'email'=>'required|max:50|email|unique:users,email',
            'password'=>'required|max:50|min:4',
        ];
    }
}
