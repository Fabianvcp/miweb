<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
            'category_p_id' => 'required',
        ];
    }
}
