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
					<form action="{{route('student.year.update',$editData->id)}}" method="post">
						@csrf
								<div class="form-group">
								    <h5>Name<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" id="name" value="{{$editData->name}}" class="form-control"> 
									</div>
									@error('name')
										 <div class="text-danger">{{ $message }}</div>
									@enderror
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