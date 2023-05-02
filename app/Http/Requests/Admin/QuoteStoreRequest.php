<?php

namespace App\Http\Requests\Admin;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuoteStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'quote' => ['required', 'string'],
            'author_id' => ['required', Rule::exists(Author::class, 'id')],
            'categories' => ['required', 'array'],
        ];
    }
}
