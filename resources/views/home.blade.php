@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
				<form action="" method="post" class="form-inline">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="text" class="form-control" name="name" placeholder="Enter a Task Name">
				<input type="submit" class="btn btn-primary" value="Submit">
					
				</form>
				</div>
				<div class="panel-heading">Task List</div>
				<div class="panel-body">
					<table class="table">
						<tr>
							<th>S.No.</th>
							<th>Name</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						<?php $i=1; ?>
						@foreach ($data as $row)

						<tr>
							<td>{{$i}}</td>
							<td>{{$row->name}}</td>
							<td>{{$row->status}}</td>
							<td>
								<a href="{{route('getEditRoute',$row->id)}}" class="btn btn-warning">Edit</a>
								<form action="{{route('deleteTask',$row->id)}}" method="post" style="display:inline;" onsubmit="if(confirm('Delete ? Are you sure ?')) {return true} else {return false};">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>
							</td>
						</tr>	
						<?php $i=$i+1; ?>
						@endforeach
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection