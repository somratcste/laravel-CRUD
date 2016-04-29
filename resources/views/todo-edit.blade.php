@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Task Edit</div>
				<div class="panel-body">
				<form action="{{route('postEditRoute',$data->id)}}" method="post" class="form-inline">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="text" class="form-control" name="name" value="{{$data->name}}">
				<input type="text" class="form-control" name="status" value="{{$data->status}}">
				<input type="submit" class="btn btn-primary" value="Submit">
					
				</form>
				</div>
				
				
			</div>
		</div>
	</div>
</div>

@endsection