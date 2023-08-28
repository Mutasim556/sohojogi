<?php

namespace App\Http\Requests\admin\auth;

use Illuminate\Foundation\Http\FormRequest;

class resetPasswordrequest extends FormRequest
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
            'email'=>'required|max:50|exists:password_reset_tokens,email',
            'code'=>'required|max:6|exists:password_reset_tokens,token',
            'new_password'=>'required|min:4',
            'retype_new_password'=>'required|min:4|same:new_password',
        ];
    }
}
