<?php

namespace App\Models\Traits;

use App\Services\FilePondService;
use Spatie\MediaLibrary\InteractsWithMedia;

trait HasFileUpload
{
    use InteractsWithMedia;

    public function filePondObjectsFromMedia(string $collectionName, array $previousFiles = []): array
    {
        if (!empty($previousFiles)) {
            return $previousFiles;
        }

        $media = $this->getMedia($collectionName);

        return FilePondService::generateFileObjectsFromMedia($media);
    }

    public function filePondObjectsFromTemp(array $uploadedTempFiles): array
    {
        return FilePondService::generateFileObjectsFromTemp($uploadedTempFiles);
    }

    private function deleteFilesExcept(string $collectionName, array $exceptIds): void
    {
        $exceptMedia = $this->getMedia($collectionName)->whereIn('id', $exceptIds);

        $this->clearMediaCollectionExcept($collectionName, $exceptMedia);
    }

    public function addFiles(string $collectionName, array $files, bool $isDelete = true)
    {
        $files = collect($files)->map(function ($file) {
            return is_string($file) ? json_decode($file, true) : $file;
        })->all();

        $files = $this->filePondObjectsFromTemp($files);

        if ($isDelete) {
            $this->deleteFilesExcept($collectionName, collect($files)->pluck('source')->all());
        }

        foreach ($files as $file) {
            if (!is_numeric($file['source'])) {
                $this->addMediaFromDisk($file['file_url'])
                    ->usingName($file['options']['file']['name'])
                    ->toMediaCollection($collectionName);
            }
        }
    }

    public function addFile(string $collectionName, $file): void
    {
        $this->clearMediaCollection($collectionName);
        $this->addMedia($file)->toMediaCollection($collectionName);
    }

}
