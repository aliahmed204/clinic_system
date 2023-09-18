<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageUserRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'name' => 'required|unique:users,name',
                'email' => 'required|email|max:45|unique:users,email',
                'password' => 'required|min:6',
                'phone' => 'nullable|regex:/^[0-9]{11}$/',
            ];
        }elseif( $this->isMethod('patch') || $this->isMethod('put')){
            return [
                'name' => 'required|string|max:255|unique:users,name,'.$this->user->id,
                'email' => 'required|email|max:255|unique:users,email,'.$this->user->id,
                'password' => 'nullable|string|min:6',
                'phone' => 'nullable|regex:/^[0-9]{11}$/',
            ];
        }

    }
}
