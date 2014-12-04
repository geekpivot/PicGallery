<?php

use Aws\S3\S3Client;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\AwsS3 as Adapter;

class PhotosController extends \BaseController {

	/**
	 * Display a listing of photos
	 *
	 * @return Response
	 */
	public function index()
	{
		$photos = Photo::all();

		return View::make('photos.index', compact('photos'));
	}

	/**
	 * Show the form for creating a new photo
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('photos.create');
	}

	/**
	 * Store a newly created photo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Photo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Photo::create($data);

		return Redirect::route('photos.index');
	}

	/**
	 * Display the specified photo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$photo = Photo::findOrFail($id);

		$client = S3Client::factory(array(
	    	'key'    => '*******',
	    	'secret' => '*******',
		));

		$adapter = new Adapter($client, 'cartapp');
		$filesystem = new Filesystem($adapter);

		$imageurl = $filesystem->getAdapter()->getClient()->getObjectUrl('cartapp', $photo->path);

		return View::make('photos.show', compact('photo'))->with('imageurl', $imageurl);
	}

	/**
	 * Show the form for editing the specified photo.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$photo = Photo::find($id);

		return View::make('photos.edit', compact('photo'));
	}

	/**
	 * Update the specified photo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$photo = Photo::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Photo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$photo->update($data);

		return Redirect::route('photos.index');
	}

	/**
	 * Remove the specified photo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Photo::destroy($id);

		return Redirect::route('photos.index');
	}

}
