<?php

namespace App\Aaulyp\Services;

use App\Aaulyp\Tools\Toolbox;
use Illuminate\Support\Facades\Storage;

class AdminHelper
{
    const ADMIN_TOKEN_LENGTH = 6;

    protected $toolbox;

    public function __construct(Toolbox $toolbox)
    {
        $this->toolbox = $toolbox;
    }

    /**
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
        $meta['expires_at'] = strtotime($created. "+ 30 minute");
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