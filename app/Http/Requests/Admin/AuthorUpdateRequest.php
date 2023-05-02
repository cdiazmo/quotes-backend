<?php

namespace App\Http\Requests\Admin;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique(Author::class, 'name')->ignore($this->author->id)]
        ];
    }
}
