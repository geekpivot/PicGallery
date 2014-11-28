<?php

class AuthController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

		return View::make('pages.index');
	}


	public function authenticate()
	{

		return View::make('sentry.login');
	}

	public function login()
	{
		
	}

}
