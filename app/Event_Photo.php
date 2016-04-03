<?php

namespace App;

use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class Event_Photo extends Model
{
    protected $file;
    protected $event;
    protected $eventInfo;
    protected $filepath;
    protected $photoDir;
    protected $table = 'event_photos';
    protected $baseDir =  "img/events";
    protected $fillable = ['path', 'thumbnail_path', 'name', 'event_main'];


    /**
     * An Event is composed of many photos
     *
     * @return object
     */
    public function events()
    {
        return $this->belongsTo('App\Event');
    }

//    protected static function boot()
//    {
//        static::creating(function ($photo) {
//            return $photo->upload();
//        });
//    }

    public static function fromFileWithEvent(UploadedFile $file, Event $event)
    {
        $photo = new static;

        $photo->file = $file;
        $photo->event = $event;
        $photo->eventInfo = $photo->buildEventArray($photo->event->name, $photo->event->date_start);

        return $photo->fill([
            'name'           => $photo->fileName(),
            'path'           => $photo->filePath(),
            'thumbnail_path' => $photo->thumbnailPath(),
            'event_main'     => 0
        ]);
    }

    /**
     * @return $this
     */
    public function Upload()
    {
        $this->file->move($this->photoDir, $this->fileName());

        $this->makeThumbnail();

        return $this;
    }

    /**
     *
     * @return string
     */
    protected function fileName()
    {
        $name = $this->eventInfo['date'] .  "_" . $this->eventInfo['slug'] . "_" . $this->file->getClientOriginalName();

        return $name;
    }

    /**
     * @return string
     */
    protected function filePath()
    {
        $this->photoDir = $this->buildPhotoDir($this->eventInfo['directory']);

        return $this->photoDir . "/" . $this->fileName();
    }

    /**
     * Create the thumbnail
     *
     * @return string
     */
    protected function thumbnailPath()
    {
        $this->photoDir = $this->buildPhotoDir($this->eventInfo['directory']);;

        return $this->photoDir . "/tn-" . $this->fileName();
    }

    /**
     * @param string|null $dir
     *
     * @return string
     */
    protected function buildPhotoDir($dir = null)
    {
        if ($dir) {
            return $this->baseDir. "/" . $dir;
        }

        return $this->baseDir;
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

    /**
     * Use intervention to create thumbnail based on the
     */
    protected function makeThumbnail()
    {
        Image::make($this->filePath())
            ->fit(200)
            ->save($this->thumbnailPath());
    }

}
