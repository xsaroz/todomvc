@section('new_content')
@foreach($todos_send as $show)
		<div class="panel-heading panel-heading_{{$show->id}}" >
				<div class="pannel-listing" >
					<h4>
							{{$show->title}}
					</h4>
					<a href="#" class="delete_title" data-id="{{$show->id}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					<div class="clear"></div>	
				</div>	
			</div>
@endforeach
@endsection