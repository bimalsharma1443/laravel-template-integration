<?php $public_url =  url(''); ?>
@extends('layouts.templates')

@section('page-title')
  Add Form
@endsection

@section('page-css')
 	<!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ $public_url }}/plugins/iCheck/all.css">
    <!-- bootstrap datepicker -->
  	<link rel="stylesheet" href="{{ $public_url }}/plugins/datepicker/datepicker3.css">
  	<!-- Select2 -->
  	<link rel="stylesheet" href="{{ $public_url }}/plugins/select2/select2.min.css">
@endsection

@section('main-content')
	<section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Forms</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      	<div class="row">
	      	<div class = "col-md-12">
	      		 <!-- general form elements -->
	      		 @php 
	      		 	$errors_data = session('field_errors');
	      		 	
	      		 	if(!isset($_old_input) && empty($_old_input)){
	      		 		$_old_input = session('_old_input');
	      		 	}
	      		 @endphp
	      		<div class="box box-primary">
	            	<div class="box-header with-border">
	              		<h3 class="box-title">Quick Example</h3>
	            	</div>
	            	<!-- /.box-header -->
	            	<!-- form start -->
		            <form method="post" action="{{ $url }}">
		            	@if(isset($flash['type']) && !empty($flash['type'])) 
    						<div class="alert alert-{{ $flash['type'] }}">
  								{{ $flash['msg'] }}
							</div>
    					@endif
		            	{{ csrf_field() }}
		              	<div class="box-body">
		                	<div class="form-group col-md-6 @if(isset($errors_data) && $errors_data->has('first_name'))  has-error @endif">
		                  		<label for="first_name" class="col-md-4 control-label">User First Name</label>
		                  		<div class="col-md-8">
		                  			<input type="text" class="form-control required" id="first_name" name="first_name" placeholder="First Name" value="@php echo $_old_input['first_name'] @endphp">
		                  		</div>
		                	</div>
		                	<div class="form-group col-md-6 @if(isset($errors_data) && $errors_data->has('last_name'))  has-error @endif">
		                  		<label for="last_name" class="col-md-4 control-label">User Last Name</label>
		                  		<div class="col-md-8">
		                  			<input type="text" class="form-control required" id="last_name" placeholder="Last Name" name="last_name" value="@php echo $_old_input['last_name'] @endphp">
		                  		</div>
		                	</div>
		                	<div class="form-group col-md-6 @if(isset($errors_data) && $errors_data->has('email_id')) has-error @endif">
		                  		<label for="last_name" class="col-md-4 control-label">User Email Id</label>
		                  		<div class="col-md-8">
		                  			<input type="text" class="form-control required" id="email_id" placeholder="Email Id" name="email_id" value="@php echo $_old_input['email_id'] @endphp">
		                  		</div>
		                	</div>		                	
		                	<div class="form-group col-md-6  @if(isset($errors_data) && $errors_data->has('contact_number')) has-error @endif">
		                  		<label for="contact_number" class="col-md-4 control-label">Contact Number</label>
		                  		<div class="col-md-8">
		                  			<input type="text" class="form-control required" id="contact_number" placeholder="Contact Number" name="contact_number" value="@php echo $_old_input['contact_number'] @endphp">
		                  		</div>
		                	</div>
		                	<div class="form-group col-md-6  @if(isset($errors_data) && $errors_data->has('place_birth')) has-error @endif">
		                  		<label for="place_of_birth" class="col-md-4 control-label">Place Of Birth</label>
		                  		<div class="col-md-8">
		                  			<select class="form-control select2" style="width: 100%;" name="place_birth">
					                  	<option selected="selected" value="">Please Select User Birth Place</option>
					                  	<option @php if($_old_input['place_birth'] == 'Mumbai'){ echo 'selected'; } @endphp>Mumbai</option>
					                  	<option @php if($_old_input['place_birth'] == 'Pune'){ echo 'selected'; } @endphp>Pune</option>
					                  	<option @php if($_old_input['place_birth'] == 'Nagpur'){ echo 'selected'; } @endphp>Nagpur</option>
					                  	<option @php if($_old_input['place_birth'] == 'Delhi'){ echo 'selected'; } @endphp>Delhi</option>
						            </select>
		                  		</div>
		                	</div>
		                	<div class="form-group col-md-6 @if(isset($errors_data) && $errors_data->has('dob')) has-error @endif">
                				<label class="col-md-4 control-label">Date of Birth</label>
	                			<div class="col-md-8">	
	                				<div class="input-group date">
	                  					<div class="input-group-addon">
	                    					<i class="fa fa-calendar"></i>
	                  					</div>
	                  					<input type="text" class="form-control pull-right" id="dob" name="dob" value="@php echo $_old_input['dob'] @endphp">
	                				</div>
	                			</div>
                				<!-- /.input group -->
              				</div>
		                	<div class="form-group col-md-6 @if(isset($errors_data) && $errors_data->has('status')) has-error @endif">
		                		<label for="Status" class="col-md-4 control-label">Status</label>
		                  		<label class="control-label col-md-4">
		                  			Active
                  					<input type="radio" name="status" value="active" class="minimal" @php if($_old_input['status'] == 'active' || empty($_old_input['status'])){ echo 'Checked';} @endphp>
                				</label>
                				<label class="control-label col-md-4">
                					In Active
                  					<input type="radio" name="status" value="inactive" class="minimal" @php if($_old_input['status'] == 'inactive'){ echo 'Checked';} @endphp>
                				</label>
		                	</div>
		                	<div class="form-group col-md-12 @if(isset($errors_data) && $errors_data->has('address')) has-error @endif">
		                		<label for="address" class="col-md-2 control-label">Address</label>
		                		<div class="col-md-8">
		                  			<textarea class="form-control" name="address" cols="120" rows="4">@php echo $_old_input['address'] @endphp</textarea>
		                		</div>
		                	</div>
		              	</div>
		              	<!-- /.box-body -->
		              	<div class="box-footer">
		                	<button type="submit" class="btn btn-primary">Submit</button>
		              	</div>
		            </form>	
	        	</div>
	      	</div>
      	</div>
      	<!-- /.row -->
    </section>
    <!-- /.content -->

 
@endsection

@section('page-js')
	<!-- FastClick -->
	<script src="{{ $public_url }}/plugins/fastclick/fastclick.js"></script>
	<!-- Select2 -->
	<script src="{{ $public_url }}/plugins/select2/select2.full.min.js"></script>
	<!-- iCheck 1.0.1 -->
	<script src="{{ $public_url }}/plugins/iCheck/icheck.min.js"></script>
	<!-- bootstrap datepicker -->
	<script src="{{ $public_url }}/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- AdminLTE App -->
	<script src="{{ $public_url }}/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ $public_url }}/dist/js/demo.js"></script>
	
	<script>
		//iCheck for checkbox and radio inputs
    	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      		checkboxClass: 'icheckbox_minimal-blue',
      		radioClass: 'iradio_minimal-blue'
    	});

    	//Date range picker
    	$('#dob').datepicker({ dateFormat: 'DD YYYY' });

    	//Initialize Select2 Elements
    	$(".select2").select2();
	
	</script>


@endsection