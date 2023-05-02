<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TemplateStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'templates' => ['required', 'array']
        ];
    }
}
