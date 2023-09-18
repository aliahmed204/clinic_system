<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MangageMajorRequest extends FormRequest
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
                'title'=>'required|string|max:255|unique:majors,title',
                'image'=>'required|image|mimes:jpg,jpeg,png|max:2048',
            ];
        }elseif($this->isMethod('patch') || $this->isMethod('put')){
            $id = $this->input('major'); // catch parameter
            return [
                'title'=>'required|string|max:255|unique:majors,title,'.$id,
                'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ];
        }

    }


}
