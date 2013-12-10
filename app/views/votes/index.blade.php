@extends('layout')

@section('content')
	@if (count($errors))
	<p>Non hai selezionato un progetto!</p>
	@endif
	{{ Form::open(array('url' => URL::route('create_vote'), 'method' => 'post')) }}
		@foreach($projects as $project)
			<p>{{ Form::radio('project_id', $project->id) }} {{ $project->name }}</p>
		@endforeach
		{{ Form::submit('Vota!') }}
	{{ Form::close() }}
@stop
