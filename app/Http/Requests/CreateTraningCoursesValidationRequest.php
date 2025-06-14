<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTraningCoursesValidationRequest extends FormRequest
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
            'courseID'=>'required',
            'price'=>'required',
            'startDate'=>'required',
            'endDate'=>'required'
        ];
    }

     public function message(){
        return [
            'courseID.required'=>'course is required',
            'price.required'=>'course price is required',
            'startDate.required'=>'start Date is required',
            'endDate.required'=>'end Date is required'
        ];
    }
}
