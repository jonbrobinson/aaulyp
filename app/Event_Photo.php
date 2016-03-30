<?php

namespace App;

use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class Event_Photo extends Model
{
    protected $filepath;
    protected $table = 'event_photos';
    protected $fillable = ['path', 'thumbnail_paith', 'name', 'event_main'];
    protected $baseDir = "img/events";
    protected $photoDir;


    /**
     * An Event is composed of many photos
     *
     * @return object
     */
    public function events()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * @param $name
     * @param $startDate
     * @param $eventName
     *
     * @return static
     */
    public static function fromForm( $name, $startDate, $eventName)
    {
        $photo = new static;

        $eventData = $photo->buildEventArray($eventName, $startDate);

        $photo->photoDir = $photo->baseDir. "/" . $eventData['directory'] . "/";
        $photo->saveAs($name, $eventData['date'], $eventData['slug']);
        $photo->event_main = 0;

        return $photo;
    }

    public function store(UploadedFile $file)
    {
        $file->move($this->photoDir, $this->name);

        $this->makeThumbnail();

        return $this;
    }

    /**
     * @param string $name
     * @param string $date
     * @param string $slug
     *
     * @return $this
     */
    protected function saveAs($name, $date, $slug)
    {
        $this->name = sprintf("%s_%s_%s", $date, $slug, $name);

        $this->path = sprintf("%s/%s", $this->photoDir, $this->name);

        $this->thumbnail_path = sprintf("%s/tn-%s", $this->photoDir, $this->name);

        return $this;
    }

    /**
     * @param string $name
     * @param String $date
     *
     * @return array
     */
    protected function buildEventArray($name, $date)
    {
        $event = array();
        $event['date'] = date('Y-m-d', $date);
        $event['slug'] = str_slug($name);
        $event['directory'] = $event['date'] . "_" . $event['slug'];

        return $event;
    }

    protected function makeThumbnail()
    {
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }

}
