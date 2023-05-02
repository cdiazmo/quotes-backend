<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HomeCategoryStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_files' => ['required', 'array'],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }
}
