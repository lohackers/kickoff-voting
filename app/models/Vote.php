<?php

class Vote extends Eloquent {

	public static $unguarded = true;
	public $timestamps = false;

	public function project()
	{
		return $this->belongsTo('Project');
	}

}