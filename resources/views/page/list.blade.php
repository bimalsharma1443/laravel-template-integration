<?php $public_url =  url(''); ?>
@extends('layouts.templates')

@section('page-title')
  View List
@endsection

@section('page-css')
 	<!-- DataTables -->
    <link rel="stylesheet" href="{{ $public_url }}/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('main-content')
 	<!-- Content Header (Page header) -->
    <section class="content-header">
      	<h1>
        	Data Tables
        	<small>advanced tables</small>
      	</h1>
      	<ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        	<li><a href="#">Tables</a></li>
        	<li class="active">Data tables</li>
      	</ol>
    </section>
    <!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-xs-12">
	        	@if(isset($flash['type']) && !empty($flash['type'])) 
	    			<div class="alert alert-{{ $flash['type'] }}">
	  					{{ $flash['msg'] }}
					</div>
	    		@endif
	          	<div class="box">
	            	<div class="box-header">
	              		<h3 class="box-title">Hover Data Table</h3>
	            	</div>
	            	<!-- /.box-header -->
	            	<div class="box-body">
		              	<table id="user_list" class="table table-bordered table-hover">
		                	<thead>
				                <tr>
					                <th>Id</th>
					                <th>User First Name</th>
					                <th>User Last Name</th>
					                <th>Email Id</th>
					                <th>Contact Number</th>
					                <th>Date of Birth</th>
					                <th>Place of Birth</th>
					                <th>Address</th>
					                <th>Status</th>
					                <th>Action</th>
				                </tr>
		                	</thead>
			                <tbody>
			                	<?php $i=1; ?>
			                	@foreach($users as $user)
			                		<tr>
			                			<td>{{ $i }}</td>
			                			<td>{{ $user->first_name }}</td>
			                			<td>{{ $user->last_name  }}</td>
			                			<td>{{ $user->email_id }}</td>
			                			<td>{{ $user->contact_number }}</td>
			                			<td>{{ $user->dob }}</td>
			                			<td>{{ $user->place_birth }}</td>
			                			<td>{{ $user->address }}</td>
			                			<td>
			                				<a class="btn btn btn-block @if($user->status == 'active')  btn-success @else btn-danger @endif btn-xs ajax-change" data-href="{{ url('') }}/ajax" data-value="{{ $user->status }}" data-id="{{ $user->id }}">{{ $user->status }}</a>
			                			</td>
			                			<td>
			                				<a class="btn btn btn-block btn-primary" href="edit/{{ $user->id}}">Edit</a>
			                				<a class="btn btn btn-block btn-primary" href="delete/{{ $user->id}}">Delete</a>
			                			</td>
			                		</tr>
			                		<?php $i++; ?>
			                	@endforeach
			                </tbody>
			                <tfoot>
			                	<tr>
			                  		<th>Id</th>
					                <th>User First Name</th>
				                  	<th>User Last Name</th>
				                  	<th>Email Id</th>
			                		<th>Contact Number</th>
				                  	<th>Date of Birth</th>
				                  	<th>Place of Birth</th>
				                  	<th>Address</th>
				                  	<th>Status</th>
			                	</tr>
			                </tfoot>
		              	</table>
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
@endsection

@section('page-js')
	<!-- DataTables -->
	<script src="{{ $public_url }}/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{ $public_url }}/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="{{ $public_url }}/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ $public_url }}/dist/js/demo.js"></script>

	<script>
		 $("#user_list").DataTable();
	</script>

	<script>
	$('.ajax-change').click(function (){
		url = $(this).data('href');
		id = $(this).data('id');
		thisObj = $(this);

		$.ajax({
			type: "post",
			dataType:"json",
			url: url,
			data: {
        		"_token": "{{ csrf_token() }}",
        		"id": id
       		 },

			success : function(data,ui){ 
				console.log(data);
				if(data == 'active'){
					thisObj.removeClass('btn-danger');
					thisObj.addClass('btn-success');
					thisObj.html(data);
				}else{
					thisObj.addClass('btn-danger');
					thisObj.removeClass('btn-success');
					thisObj.html(data);
				}
				
			},
			error : function(data,ui){
				console.log(data);
				console.log(data.responseText);
				console.log(ui);
			} 
		});
	});
	</script>
@endsection