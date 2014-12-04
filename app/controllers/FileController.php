

<?php

class FileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//


		return View::make('pages.upload');

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = Sentry::getUser();
		$filename = str_random(20) . '.' . Input::file('file')->guessExtension();
		$description = Input::get('description');
		$title = Input::get('title');

		//First we need to locally store the file
		Input::file('file')->move(__DIR__.'/../images/', $filename);

		//We have to read the file in so we get the contents

		$file = File::get(__DIR__.'/../images/'. $filename);

		$photo = new Photo([
			'title' => $title,
			'description' => $description,
			
			]);
		//Store the path for the file.
		$photo->path = '/images/'. $user->first_name . '/' . $filename;

		//Upload the file to AWS
		$upload =  Flysystem::connection('awss3')->put('/images/'. $user->first_name . '/' . $filename, $file);

		$photo->user()->associate($user);
		$photo->save();
		return 'Perfect';
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
