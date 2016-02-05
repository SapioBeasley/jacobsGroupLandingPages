<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
	protected $fillable = [
    		'program_ad_id',
		'program_ad_title',
		'destination_url',
		'program_ad_subtitle',
		'program_ad_description',
		'program_ad_category',
		'contextual_keywords',
		'program_ad_image_url'
    	];

    	public function program()
    	{
    		$this->belongsToMany('App\Program');
    	}
}
