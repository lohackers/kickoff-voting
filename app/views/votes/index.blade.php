@extends('layout')

@section('content')
	<div class="row col-xs-12">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">H-ART Makers Voting</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-4">
				<p class="navbar-text">Signed in as <a href="mailto:{{ $email }}">{{ $email }}</a></p>
			</div>
		</nav>
	</div>

	@if (count($errors))
		<div class="row col-xs-12">
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Error!</strong> You must select a project.
			</div>
		</div>
	@endif

	<div class="row col-xs-12">
		{{ Form::open(array('url' => URL::route('create_vote'), 'method' => 'post')) }}
			@foreach($projects as $project)
				<div class="radio">
					<label>
						{{ Form::radio('project_id', $project->id) }} {{ $project->name }}
					</label>
				</div>
			@endforeach
			{{ Form::submit('Vote!', array('class' => 'btn btn-primary btn-block')) }}
		{{ Form::close() }}
	</div>
@stop
