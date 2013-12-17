@extends('layout')

@section('content')
	<div class="row col-xs-12">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">H-ART Makers Voting</a>
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
