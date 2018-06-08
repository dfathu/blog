<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function author()
    {
      // code...
      return $this->belongsTo(User::class);
    }
    public function getImageUrlAttribute($value)
    {
      // code...
      $imageUrl = "";
      if (! is_null($this->image))
      {
        $imagePath = public_path() . "/img/" . $this->image;
        if(file_exists($imagePath)) $imageUrl = asset("img/" . $this->image);
      }

      return $imageUrl;
    }
    public function getDateAttribute($value)
    {
      return $this->created_at->diffForHumans();
    }

    public function scopeLatestFirst()
    {
      // code...
      return $this->orderBy('created_at','desc');
    }
}
