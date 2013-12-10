<?php

class VotesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Session::get('user');
		$user_id = User::where('email', '=', $user['email'])->first()->id;

		if ( Vote::where('user_id', '=', $user_id)->count() )
		{
			// user already voted
			return Redirect::route('thanks');
		}

		return View::make('votes/index')->with(array(
			'projects' => Project::all(),
			'email' => $user['email']
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
			$user = Session::get('user');
			$user_id = User::where('email', '=', $user['email'])->first()->id;

			// create vote validator
			$validator = Validator::make(Input::except('_token'), array(
				'project_id' => 'required'
			));

			// catch validation errors
			if ( $validator->fails() )
			{
				return Redirect::action('VotesController@index')->with(array(
					'errors' => $validator->messages(),
					'email' => $user['email']
				));
			}

			// create the vote
			Vote::create(array(
				'user_id' => $user_id,
				'project_id' => Input::get('project_id')
			));

			return Redirect::route('thanks');
		}
		catch (\Exception $e)
		{
			// error creating vote
			return View::make('votes/index')->with(array(
				'errors' => 'Errore nel voto',
				'projects' => Project::all(),
				'email' => $user['email']
			));
		}
	}

	public function thanks()
	{
		// TODO
		return 'grazie!';
	}

}