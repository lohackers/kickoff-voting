@extends('layout')

@section('content')
	<div class="row col-xs-12">
		<h1>And the winner is...</h1>
		@foreach($projects as $project)
			<div class="jumbotron">
				<h3>{{ $project->name }}</h3>
				<h4>{{ count($project->votes) }} votes</h4>
			</div>
		@endforeach
	</div>
@stop