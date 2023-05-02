<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    protected $fillable = ['id', 'name', 'status'];

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
