<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Event_Photo extends Model
{
    protected $table = 'event_photos';

    protected $fillable = ['photo_path', 'event_main'];

    protected $baseDir = "img/events";

    /**
     * An Event is composed of many photos
     *
     * @return object
     */
    public function events()
    {
        return $this->belongsTo('App\Event');
    }

    public static function fromForm($name, $startDate, UploadedFile $file)
    {
        $photo = new static;

        $eventDate = date('Y-m-d', $startDate);
        $slug = str_slug($name);
        $eventDir = "{$eventDate}_{$slug}";
        $fileName = $eventDate . "_" . $slug .  "_" . $file->getClientOriginalName();
        $fileDir = $photo->baseDir . "/" . $eventDir . "/";

        $photo->photo_path = $fileDir . $fileName;
        $photo->event_main = 0;

        $file->move($fileDir, $fileName);

        return $photo;
    }
}
