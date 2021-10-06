@extends('admin.admin_master')
@section('admin')

   <div class="content-wrapper">
	  <div class="container-full">
			<!-- Main content -->
			<section class="content">
			  <div class="row">
				<div class="col-12">
				 <div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">User List</h3>
					  <a href="{{route('user.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add User</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>SL</th>
									<th>Role</th>
									<th>Name</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($view as $key => $views)
								<tr>
									<td width="5%">{{$key+1}}</td>
									<td>{{$views->usertype}}</td>
									<td>{{$views->name}}</td>
									<td >{{$views->email}}</td>
									<td width="25%">
										<a href="{{route('user.edit',$views->id)}}" class="btn btn-info">Edit</a> <a href="{{route('user.delete',$views->id)}}" id="delete" class="btn btn-danger">Delete</a>
									</td>
								</tr>
								@endforeach
							</tbody>	
						  </table>
						</div>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->          
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</section>
		    <!-- /.content -->
	  </div>
  </div>
@endsection