<?php

class VotesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if ( Session::has('user') )
		{
			// user already voted
			return Redirect::route('thanks');
		}

		return View::make('votes/index')->with(array(
			'projects' => Project::all()
		));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		try
		{
			// get user info
			if ( Session::get('user') )
			{
				// Already voted
				return View::make('votes/thanks');
			}

			// create vote validator
			$validator = Validator::make(Input::except('_token'), array(
				'project_id' => 'required'
			));

			// catch validation errors
			if ( $validator->fails() )
			{
				return Redirect::action('VotesController@index')->with(array(
					'errors' => $validator->messages()
				));
			}

			// set session
			Session::put('user', true);

			// create the vote
			Vote::create(array(
				'project_id' => Input::get('project_id')
			));

			return Redirect::route('thanks');
		}
		catch (\Exception $e)
		{
			// error creating vote
			return View::make('votes/index')->with(array(
				'errors' => 'Errore nel voto',
				'projects' => Project::all()
			));
		}
	}

	public function thanks()
	{
		return View::make('votes/thanks');
	}

}