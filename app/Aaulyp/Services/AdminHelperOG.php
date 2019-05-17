<?php

namespace App\Aaulyp\Services;

use App\Aaulyp\Tools\Toolbox;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Object_;

class AdminHelper
{
    const ADMIN_TOKEN_LENGTH = 6;

    protected $toolbox;
    protected $uploadCareHleper;

    /**
     * AdminHelper constructor.
     *
     * @param Toolbox          $toolbox
     * @param UploadCareHelper $uploadCareHelper
     */
    public function __construct(Toolbox $toolbox, UploadCareHelper $uploadCareHelper)
    {
        $this->toolbox = $toolbox;
        $this->uploadCareHleper = $uploadCareHelper;
    }

    /**
     *
     * @return array
     */
    public function getPositions()
    {
        $positions = [];
        $positionFiles = Storage::files('yp/positions');
        foreach ($positionFiles as $file) {
            $positions[] = json_decode(Storage::get($file));
        }

        return $positions;
    }

    /**
     * Sorted object of positions by meta index
     *
     * @return array
     */
    public function getSortedPositions()
    {
        $sorted = [];
        $positions = $this->getPositions();

        foreach($positions as $index => $position) {
            $sortIndex = $positions[$index]->meta->index;
            $sorted[$sortIndex] = $position;
        }

        ksort($sorted);

        return $sorted;
    }

    /**
     * Sorted object of positions by meta index
     *
     * @param string $type
     *
     * @return array
     */
    public function getSortedPositionsByType($type = "officer")
    {
        $sorted = [];
        $positions = $this->getPositions();

        foreach($positions as $position) {
            if ($position->meta->type != $type) {
                continue;
            }
            $sortIndex = $position->meta->index;
            $sorted[$sortIndex] = $position;
        }

        ksort($sorted);

        return $sorted;
    }

    /**
     * @param int $index
     *
     * @return array
     */
    public function getPositionByIndex($index)
    {
        $positions = $this->getPositions();

        foreach($positions as $position) {
            if ($position->meta->index == $index) {
                return json_decode(json_encode($position), true);
            }
        }

        return [];
    }


    /**
     * @param string $token
     *
     * @return bool
     */
    public function isTokenValid($token)
    {
        $files = Storage::files('yp/tokens');

        foreach($files as $file) {
            $meta = json_decode(Storage::get($file));
            if($meta->active && ($meta->token === $token) && ($meta->expires_at >= time())){
                return true;
            }
        }

        return false;
    }

    /**
     *
     */
    public function deleteExpiredTokens()
    {
        $files = Storage::files('yp/tokens');

        foreach($files as $file) {
            $meta = json_decode(Storage::get($file));
            if(!$meta->active || ($meta->expires_at <= time())){
                Storage::delete($file);
            }
        }
    }

    /**
     * @param array  $formUser
     * @param string $posIndex
     *
     * @return bool
     */
    public function updatePositionViaFormUser($formUser, $posIndex)
    {
        $position = $this->getPositionByIndex($posIndex);
        $position['first_name'] = trim($formUser['first_name']);
        $position['last_name'] = trim($formUser['last_name']);
        $position['title'] = trim($formUser['title']);
        $position['email'] = trim($formUser['email']);
        $position['about'] = trim($formUser['about']);
        $position['description'] = trim($formUser['description']);
        $position['social']['twitter'] = trim($formUser['social-twitter']);
        $position['social']['facebook'] = trim($formUser['social-facebook']);
        $position['social']['linkedin'] = trim($formUser['social-linkedin']);


        $positionFiles = Storage::files('yp/positions');
        foreach ($positionFiles as $file) {
            $data = json_decode(Storage::get($file), true);

            if ($data['meta']['index'] == $position['meta']['index']) {
                return Storage::put($file, json_encode($position));
            }
        }

        return false;
    }

    /**
     * @param array  $fileInfo
     * @param string $index
     *
     * @return bool
     */
    public function updateImgPositionViaUCInfo($fileInfo, $index)
    {
        $position = $this->getPositionByIndex($index);
        $position['img']['uc_meta'] = json_decode(json_encode($fileInfo), true);

        if (isset($position['img']['uc_meta'])) {
            $position['img']['profile'] = $this->uploadCareHleper->createImgProfileUrl($position['img']['uc_meta']);
        }

        $positionFiles = Storage::files('yp/positions');
        foreach ($positionFiles as $file) {
            $data = json_decode(Storage::get($file), true);

            if ($data['meta']['index'] == $position['meta']['index']) {
                return Storage::put($file, json_encode($position));
            }
        }

        return false;
    }

    /**
     * @param $index
     *
     * @return mixed
     */
    public function resetImgInfo($index)
    {
        $position = $this->getPositionByIndex($index);
        if (isset($position['img']))
        {
            $position['img']['profile'] = "";
            $position['img']['uc_meta'] = [];
        }

        $positionFiles = Storage::files('yp/positions');
        foreach ($positionFiles as $file) {
            $data = json_decode(Storage::get($file), true);

            if ($data['meta']['index'] == $position['meta']['index']) {
                return Storage::put($file, json_encode($position));
            }
        }
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public function isAdminEmail($email)
    {
        $files = Storage::files('yp/positions');

        foreach($files as $file) {
            $positionMeta = json_decode(Storage::get($file));
            if($positionMeta->email === trim($email)){
                return true;
            }
        }

        return false;
    }

    /**
     * @return object
     */
    public function runAdminTokenProcess()
    {
        $token = $this->createAdminToken();
        $meta = $this->createAdminTokenMeta($token);
        $this->createTokenFile($meta);

        return $meta;
    }

    /**
     * @return object
     */
    protected function generateAdminToken()
    {
        $token = $this->createAdminToken();
        $meta = $this->createAdminTokenMeta($token);

        return $meta;
    }

    /**
     * @param object $meta token meta data
     *
     * @return mixed
     */
    protected function createTokenFile($meta)
    {
        return Storage::put("yp/tokens/{$meta->token}.json", json_encode($meta));
    }


    /**
     * @param string $token
     *
     * @return object
     */
    protected function createAdminTokenMeta($token)
    {
        date_default_timezone_set('America/Chicago');
        $created = date("Y-m-d H:i:s");
        $meta = [];
        $meta['token'] = $token;
        $meta['created'] = strtotime($created);
        $meta['expires_at'] = strtotime($created. "+ 4 hour");
        $meta['active'] = true;

        return json_decode(json_encode($meta));
    }

    /**
     * @return string
     */
    protected function createAdminToken()
    {
        return strtolower($this->toolbox->generateToken(self::ADMIN_TOKEN_LENGTH));
    }
}