<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Yoeunes\Toastr\Toastr;


class StorePostRequest extends FormRequest
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
            'portada' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5300',
            'title' => 'required',
            'body' => 'required|min:10',
            'published_at' => 'required',
            'excerpt' => 'required|min:10',
            'category_id' => 'required',
            'tags' => 'required'
        ];
    }
    protected function formatErrors(Validator $validator)
    {
        $messages = $validator->messages();

        foreach ($messages as $message)
        {
            Toastr::error($message, 'Failed', ['timeOut' => 10000]);
        }

        return $validator->errors()->all();
    }
}
