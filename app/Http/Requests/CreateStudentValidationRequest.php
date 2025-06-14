<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentValidationRequest extends FormRequest
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
        return [
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'status'=>'required'
        ];
    }

     public function message(){
        return [
            'name.required'=>'student name is required',
            'phone.required'=>'student phone is required',
            'address.required'=>'Student address is required',
            'status.required'=>'student status is required'
        ];
    }
}
