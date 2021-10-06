@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper" style="min-height: 1188.75px;">
	  	<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Form Validation</h4>
			  <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('user.store')}}" method="post">
						@csrf
					  <div class="row">
					  	    <div class="col-md-6">
								<div class="form-group">
									<h5>User Role <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="usertype" id="usertype"  class="form-control">
											<option value="">Select Your Role</option>
											<option value="Admin">Admin</option>
											<option value="User">User</option>
										</select>
									    <div class="help-block"></div>
								    </div>
							    </div>
							</div> 
							<div class="col-md-6">
								<div class="form-group">
								    <h5>User Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" class="form-control"> 
									</div>
							    </div>
							</div>

					  </div>	
					  <div class="row">
							<div class="col-md-6">						
								<div class="form-group">
									<h5>User Email <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="email" class="form-control" > <div class="help-block"></div></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<h5>User Password <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password" id="password" class="form-control" > <div class="help-block"></div></div>
								</div>
								
							</div>
					  </div>
					  <div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info">Submit</button>
					  </div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>

@endsection