<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SplashStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'splash_files' => ['required', 'array']
        ];
    }
}
