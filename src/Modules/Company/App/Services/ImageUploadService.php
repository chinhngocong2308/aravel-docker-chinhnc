<?php

namespace Modules\Company\App\Services;

use Illuminate\Http\UploadedFile;

/**
 * Class ImageUploadService
 * @package Modules\Company\App\Services
 */
class ImageUploadService
{
    /**
     * @param \Illuminate\Http\UploadedFile $image
     * @return string|null
     */
    public function uploadLogo(UploadedFile $image)
    {
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = strtolower($image->getClientOriginalExtension());

        if (in_array($extension, ['png', 'jpg', 'jpeg', 'gif'])) {
            $imageName = $filename . '.' . $extension;
            $image->storeAs('public/company/logos', $imageName);
            return "storage/company/logos/" . $imageName;
        }

        return null;
    }
}
