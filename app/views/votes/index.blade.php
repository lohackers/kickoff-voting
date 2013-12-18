@extends('layout')

@section('content')
	<div class="has-header has-subheader content padding">

		@if (count($errors))
			<div class="card">
				<div class="item item-text-wrap" style="background:#F0B840;color:#FFF;font-weight:bold;">
					You must select one project!
				</div>
			</div>
		@endif

		{{ Form::open(array('url' => URL::route('create_vote'), 'method' => 'post')) }}
			<div class="list">
				@foreach($projects as $project)
					<label class="item item-radio">
						{{ Form::radio('project_id', $project->id) }}
						<div class="item-content">
							{{ $project->name }}
						</div>
						<i class="radio-icon ion-checkmark"></i>
					</label>
				@endforeach
			</div>
			{{ Form::button('Vote!', array('type' => 'submit', 'class' => 'button button-block button-positive')) }}
		{{ Form::close() }}
	</div>
@stop
