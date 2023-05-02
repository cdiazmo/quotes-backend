<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JsonQuotesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'json_file' => ['required', 'file']
        ];
    }
}
