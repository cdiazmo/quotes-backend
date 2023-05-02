<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;
//use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FilePondService
{
    public static function generateFileObjectsFromMedia(MediaCollection $uploadedFiles): array
    {
        $files = [];
        foreach ($uploadedFiles as $file) {
            if ($file instanceof Media) {
                $files[] = static::filePondObjectFromMedia($file);
            }
        }

        return $files;
    }

    public static function generateFileObjectsFromTemp(array $files): array
    {
        foreach ($files as $index => $file) {
//            if ($file instanceof TemporaryUploadedFile) {
//                $files[$index] = self::filePondObjectFromTempFile($file);
//            }
        }

        return $files;
    }

    public static function filePondObjectFromMedia(Media $file): array
    {
        return [
            'source' => $file->id,
            'file_url' => static::getTempPath($file->file_name),
            'options' => [
                'type' => 'local',
                'file' => [
                    'name' => $file->name,
                    'size' => $file->size,
                    'type' => $file->mime_type,
                ],
                'metadata' => [
                    'poster' => $file->getUrl(),
                ],
            ],
        ];
    }

//    public static function filePondObjectFromTempFile(TemporaryUploadedFile $file): array
//    {
//        return self::generateFileObject($file,$file->getFilename());
//    }

    public static function filePondObjectFromUploadedFile(UploadedFile $file,$hashName): array
    {
        return self::generateFileObject($file,$hashName);
    }

    private static function getTempPath($fileName): string
    {
        return "temp" . DIRECTORY_SEPARATOR . $fileName;
    }

    public static function generateFileObject($file,$hashName): array
    {
        return [
            'source' => Storage::url(static::getTempPath($hashName)),
            'file_url' => static::getTempPath($hashName),
            'options' => [
                'type' => 'local',
                'file' => [
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'type' => $file->getMimeType(),
                ],
                'metadata' => [
                    'poster' => Storage::url(static::getTempPath($hashName)),
                ],
            ],
        ];
    }

}
