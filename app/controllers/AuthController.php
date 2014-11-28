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
		try
		{
			$credentials = array(
				'email'    => Input::get('email'),
				'password' => Input::get('password'),
			);

			$rules = array(
				'email'     => 'required|email',
				'password'  => 'required',

				);

			$validator = Validator::make($credentials, $rules);

			if ($validator->fails())
			{
				return Redirect::back()->withInput->withErrors($validator);
			}

			if ( $user = Sentry::authenticate($credentials, false))
			{
				return Redirect::intended('/')->withSuccess('You are now Logged in!');
			}

			
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    return Redirect::back()->withInput->withErrors('Login field is required.');
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    return Redirect::back()->withInput->withErrors('Password field is required.');
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    return Redirect::back()->withInput->withErrors( 'Wrong password, try again.');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return Redirect::back()->withInput->withErrors('User was not found.');
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return Redirect::back()->withInput->withErrors('User is not activated.');
		}


	}

	public function register()
	{
		try
		{
			$user = Sentry::register(array(
				'first_name' => Input::get('first_name'),
				'last_name' => Input::get('last_name'),
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'activated' => true,

				));
		}

		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'User with this login already exists.';
		}

		return Redirect::to('/');
	}

	public function logout()
	{
		Sentry::logout();

		return Redirect::to('/');
	}

}
