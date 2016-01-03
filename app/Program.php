<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
    	'titleStrong',
    	'title',
      'secondHead',
      'bullet1',
      'bullet2',
      'disclaimerAdd',
      'slug',
    ];
}
