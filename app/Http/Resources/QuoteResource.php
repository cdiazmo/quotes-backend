<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Quote */
class QuoteResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'quote' => $this->quote,
            'author' => $this->author->name,
            'categories' => $this->categories->pluck('name')->toArray()
        ];
    }
}
