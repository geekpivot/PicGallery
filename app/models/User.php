<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel {


	public function photo(){

		return $this->hasMany('Photo');

	}

}
