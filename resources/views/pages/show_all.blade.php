@extends('layouts.main')

@section('content')
<div class="panel panel-default" id="add_task"> 
	@foreach($show_data as $show)
		<div class="panel-heading  panel-heading_{{$show->id}}" data-attr-id='{{$show->id}}' >
				<div class="pannel-listing" >
					<h4>
							{{$show->title}}
					</h4>
					<a href="#" class="delete_title" data-id="{{$show->id}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					<div class="clear"></div>	
				</div>	
			</div>
	@endforeach
</div>
@endsection