@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
					<form action="{{route('store.profile')}}" method="post" enctype= multipart/form-data>
						@csrf
					  <div class="row">
					  	    <div class="col-md-6">
								<div class="form-group">
									<h5>User Gender <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="gender" id="gender"  class="form-control">
											<option value="">Select Gender</option>
											<option value="Male" {{($editData->gender=='Male' ? "selected":"")}}>Male</option>
											<option value="Female" {{($editData->gender=='Female' ? "selected":"")}}>Female</option>
										</select>
									    <div class="help-block"></div>
								    </div>
							    </div>
							</div> 
							<div class="col-md-6">
								<div class="form-group">
								    <h5>User Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" value="{{$editData->name}}" class="form-control"> 
									</div>
							    </div>
							</div>

					  </div>	
					  <div class="row">
							<div class="col-md-6">						
								<div class="form-group">
									<h5>User Email <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="email" value="{{$editData->email}}" class="form-control" > <div class="help-block"></div></div>
								</div>
							</div>
							<div class="col-md-6">						
								<div class="form-group">
									<h5>User Mobile <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control" > <div class="help-block"></div></div>
								</div>
							</div>
					  </div>
					  <div class="row">
							<div class="col-md-6">						
								<div class="form-group">
									<h5>User Address <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="address" value="{{$editData->address}}" class="form-control" > <div class="help-block"></div></div>
								</div>
							</div>
							<div class="col-md-6">						
								<div class="form-group">
									<h5>Profile Image <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="file" name="image" id="image" value="{{$editData->image}}" class="form-control" > <div class="help-block"></div></div>
								</div>
								<div class="form-group">
									<img id="showImage" src="{{(!empty($viewData->image) ? url('upload/user_images/'.$viewData->image) : url('upload/No_1_image.jpg'))}}" alt="User Avatar" style="width:100px;height: 100px;border:1px solid #000000">
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader=new FileReader();
			reader.onload=function(e)
			{
				$("#showImage").attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files[0]);
		});
	});
</script>

@endsection