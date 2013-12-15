@extends('layout')

@section('content')
	<p>Sei loggato come  {{ $email }}</p>
	@if (count($errors))
	<p>Non hai selezionato un progetto!</p>
	@endif
	{{ Form::open(array('url' => URL::route('create_vote'), 'method' => 'post')) }}
		<ul class="project-list">
			@foreach($projects as $project)
				<li class="project-list-item">
					{{ Form::radio('project_id', $project->id, '', array('class' => 'project-list-item-radio', 'id' => 'project_id_' . $project->id)) }}
					{{ Form::label('project_id_' . $project->id, $project->name, array('class' => 'project-list-item-label')) }}
				</li>
			@endforeach
		</ul>
		{{ Form::submit('Vota!', array('class' => 'btn btn-primary project-vote-button')) }}
	{{ Form::close() }}
@stop
