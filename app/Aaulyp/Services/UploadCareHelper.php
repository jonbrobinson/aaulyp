<?php

namespace App\Aaulyp\Services;

use Illuminate\Support\Facades\Storage;

class UploadCareHelper
{

    /**
     * @link https://uploadcare.com/docs/processing/
     *
     * @return string
     */
    public function getBaseUrl() {
        return "https://ucarecdn.com/";
    }

    /**
     * @link https://uploadcare.com/docs/processing/image/size_crop/#operation-crop
     * @param array $crop
     *
     * @return string
     */
    public function buildCropExtension($crop) {
        $height = $crop['height'];
        $width = $crop['width'];
        $top = $crop['top'];
        $left = $crop['left'];

        $extension = "crop/{$width}x{$height}/{$left},{$top}";

        return $extension;
    }

    /**
     * @param array $ucMeta
     *
     * @return string
     */
    public function createImgProfileUrl($ucMeta) {
        $url = $this->getBaseUrl();

        $url .= $ucMeta['uuid'];
        if (!$ucMeta['crop']) {
            return $url;
        }

        $url .= "/-/".$this->buildCropExtension($ucMeta['crop']);

        return $url;
    }
}