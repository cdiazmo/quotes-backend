<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StickerStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'stickers' => ['required', 'array']
        ];
    }
}
