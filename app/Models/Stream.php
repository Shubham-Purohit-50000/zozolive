<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Stream extends BaseModel
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'stream_key', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }

    public function getThumbnailUrlAttribute()
    {
        if (Storage::disk('public')->exists("thumbnails/{$this->uuid}.jpg")) {
            return asset("storage/thumbnails/{$this->uuid}.jpg");
        }
        $thumbnail = Image::make("storage/{$this->user_id}/{$this->stream_key}/thumbnail.jpg")->fit(360, 240)->encode('jpg');
        Storage::disk('public')->put("thumbnails/{$this->uuid}.jpg", $thumbnail);

        return asset("storage/thumbnails/{$this->uuid}.jpg");
    }
}

