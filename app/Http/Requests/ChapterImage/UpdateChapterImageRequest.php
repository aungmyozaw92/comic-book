<?php

namespace App\Http\Requests\ChapterImage;

use Illuminate\Foundation\Http\FormRequest;

class CreateChapterImageRequest extends FormRequest
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
            'images'  => 'required|array',
            'images.*.'  =>  'require|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
