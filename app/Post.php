<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','body',
        'catpogery_id',
        'photo_id','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function catogery()
    {
        return $this->hasOne('App\Catogery');
    }
}
