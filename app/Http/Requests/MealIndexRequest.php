<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'per_page' => 'integer|min:1',
            'category' => 'nullable|in:NULL,!NULL|integer',
            'tags' => 'nullable|string',
            'with' => 'nullable|string',
            'lang' => 'required|string',
            'diff_time' => 'integer|min:0',
        ];
    }
}
