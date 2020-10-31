<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $rule =[
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($this->route('user')->id)],
            'phone' => 'min:10| max:15',
            'personal_phrase' => 'required'
        ];
        if($this->filled('password'))
        {
            $rule['password'] = ['confirmed', 'min:6'];

        }
        return $rule;

    }


}
