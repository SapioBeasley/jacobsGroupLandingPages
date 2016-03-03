<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	'images_url'
    ];

    public function program() {
    	return $this->belongsToMany('App\Program');
    }
}
