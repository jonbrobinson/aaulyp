<?php

namespace App\Aaulyp\Services;

use app\Aaulyp\Constants\ApiConstants;
use Illuminate\Support\Facades\Storage;

/**
 * Class UploadCareHelper
 *
 * @package App\Aaulyp\Services
 * @link https://uploadcare.com/docs/processing/
 */
class UploadCareHelper
{
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
        $url = ApiConstants::UPLOADCARE_BASE_URL;

        $url .= $ucMeta['uuid'];
        if (!$ucMeta['crop']) {
            return $url;
        }

        $url .= "/-/".$this->buildCropExtension($ucMeta['crop']);

        return $url;
    }
}