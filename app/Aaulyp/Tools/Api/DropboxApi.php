<?php

namespace App\Aaulyp\Tools\Api;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Request;

class DropboxApi
{
    protected $guzzle;

    public function __construct()
    {
        $this->guzzle = new Guzzle([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.dropboxapi.com/2/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }

    public function getAllFilesFromFolder($folder = '')
    {
        $paths = $this->getPathsFromFolder($folder);

        $urls = $this->getUrlsArray($paths);

        return $urls;
    }

    /**
     * Gets contents of a single folder
     *
     * @param string $folder
     *
     * @return string
     */
    protected function getSingleFolderContents($folder = '')
    {
        $headers = [
            'Authorization' => 'Bearer ' . env('DROPBOX_AUTH'),
            'Content-Type' => 'application/json',
        ];

        $postParams = [
            'path' => $folder,
        ];


        $options = [
            'headers' => $headers,
            'body' => json_encode($postParams)
        ];

        $response = $this->guzzle->request('POST', "https://api.dropboxapi.com/2/files/list_folder", $options);

        $json = json_decode($response->getBody()->getContents());

        return $json;
    }

    protected function getImageUrl($path)
    {

        $headers = [
            'Authorization' => 'Bearer ' . env('DROPBOX_AUTH'),
            'Content-Type' => 'application/json',
        ];

        $postParams = [
            'path' => $path,
        ];


        $options = [
            'headers' => $headers,
            'body' => json_encode($postParams)
        ];

        $response = $this->guzzle->request('POST', "https://api.dropboxapi.com/2/files/get_temporary_link", $options);

        $json = json_decode($response->getBody()->getContents());

        return $json->link;
    }

    /**
     * Gets the paths recursively of all the files from a folder passed in
     *
     * @param string $folder
     *
     * @return array
     */
    protected function getPathsFromFolder($folder)
    {
        $contents = $this->getSingleFolderContents($folder);

        $paths = [];

        foreach ($contents->entries as $tags) {
            if ($tags->{".tag"} == "folder") {
                $urls = $this->getPathsFromFolder($tags->path_display);
                $paths = array_merge($paths, $urls);

                continue;
            }

            $paths[] = $tags->path_display;
        }

        return $paths;
    }

    /**
     * Returns an array of image url's from array of file paths passed in
     *
     * @param array $paths file paths to reteive urls of tmp link
     *
     * @return array
     */
    protected function getUrlsArray($paths) {
        $urls = [];

        foreach ($paths as $k => $path) {
            $urls[] = $this->getImageUrl($path);
        }

        return $urls;
    }
}