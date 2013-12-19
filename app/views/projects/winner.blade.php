@extends('layout')

@section('content')
	<div class="has-header has-subheader content padding scroll overflow-scroll">
		@foreach($projects as $project)
			<h4>{{ $project->name }}</h4>
			<h5>{{ count($project->votes) }} votes</h5>
		@endforeach
	</div>
@stop