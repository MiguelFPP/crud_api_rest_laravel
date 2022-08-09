<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'identification'=>'required|numeric|unique:students,identification',
            'name'=>'required|string|max:255',
            'surname'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:students,email',
            'phone'=>'required|string|max:255',
            'birthdate'=>'required|date',
            'address'=>'required|string|max:255',
        ];
    }
}
