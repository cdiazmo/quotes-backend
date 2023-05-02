<?php

namespace App\View\Components\Ui;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaFilePreview extends Component
{
    public $media;
    public string $col;

    public function __construct(Media $media, $col="col-md-3")
    {
        $this->media = $media;
        $this->col = $col;
    }

    public function render(): View
    {
        return view('components.ui.media-file-preview');
    }
}
