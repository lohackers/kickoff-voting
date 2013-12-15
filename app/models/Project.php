<?php

class Project extends Eloquent {

	public $timestamps = false;

	public function votes()
	{
		return $this->hasMany('Vote');
	}

}