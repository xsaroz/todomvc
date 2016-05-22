@extends('layouts.main')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
		@foreach($show_data as $show)
			<div class="pannel-listing">
				<h4>
					{{$show->todo_name}}
				</h4>
				<a href="delete/{{$show->id}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				<div class="clear"></div>
			</div>
		@endforeach
		</div>
	</div>
@endsection

