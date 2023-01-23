<?php

namespace App\Http\Requests\ComicBook;

use Illuminate\Foundation\Http\FormRequest;

class CreateComicBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'author' => 'required|string',
            'artist' => 'required|string',
            'description' => 'required|string',
            'is_featured' => 'nullable|boolean',
            'is_recommend' => 'nullable|boolean',
            'is_banner' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'rating'  => 'required|regex:/^\d{1,14}(\.\d{1,2})?$/',
        ];
    }
}


