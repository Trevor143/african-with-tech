<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:2|max:255',
            'slug' => 'unique:articles,slug,'.\Request::get('id'),
            'content' => 'required|min:2',
            'date' => 'required|date',
            'status' => 'required',
            'category' => 'required',
            'description' => 'required|min:2|max:255',

        ];
    }
}
