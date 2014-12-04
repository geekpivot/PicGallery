<?php

class Photo extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'title' => 'required',
		'description' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'description'];

	public function user(){

		return $this->belongsTo('Photo');
	}

}