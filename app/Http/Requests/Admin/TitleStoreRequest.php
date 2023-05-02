<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TitleStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_files' => ['required', 'array']
        ];
    }

}
