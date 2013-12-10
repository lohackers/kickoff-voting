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

		return View::make('votes/index')->with(array('projects' => Project::all(), 'email' => $user['email']));
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
			$user = Session::get('user');
			$user_id = User::where('email', '=', $user['email'])->first()->id;
			$validator = Validator::make(Input::except('_token'), array(
				'project_id' => 'required'
			));

			if ( $validator->fails() )
			{
				return Redirect::action('VotesController@index')->with('errors', $validator->messages());
			}

			Vote::create(array(
				'user_id' => $user_id,
				'project_id' => Input::get('project_id')
			));

			return Redirect::route('thanks');
		}
		catch (\Exception $e)
		{
			return View::make('votes/index')->with(array('error' => 'Errore nel voto'));
		}
	}

	public function thanks()
	{
		return 'grazie!';
	}

}