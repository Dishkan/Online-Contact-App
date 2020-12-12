<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:contacts',
            'number' => array(
			'required:max:15',
			'regex: (998([\d]{9})$)',
			'unique:contacts'),
			'second_number' => array(
			'nullable:max:15',
			'regex: (998([\d]{9})$)',
			'unique:contacts'),
			'email' => 'required|email|unique:contacts',
			'second_email' => 'nullable|email|unique:contacts'
        ];
    }
}
