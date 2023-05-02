<?php

namespace App\Models;

use App\Models\Traits\HasFileUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use HasFileUpload;

    const HOME_CATEGORY_FILES_COLLECTION = 'template-files';
    const QUOTE_TYPE = 'quote';
    const HOME_TYPE = 'home';

    protected $fillable = ['id', 'name', 'type'];

    public function quotes(): BelongsToMany
    {
        return $this->belongsToMany(Quote::class);
    }

    public function scopeQuote($query)
    {
        return $query->where('type', self::QUOTE_TYPE);
    }

    public function scopeHomeCategory($query)
    {
        return $query->where('type', self::HOME_TYPE);
    }

    public function getTemplateFiles()
    {
        return $this->morphMany(Media::class, 'model')->where('collection_name', self::HOME_CATEGORY_FILES_COLLECTION);
    }
}
