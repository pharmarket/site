@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
	    <div class="box-body">
	      <table class="datatable table table-bordered table-striped" >
	        <thead>
	          <tr>
	            <th>ID</th>
	            <th>Message</th>
	            <th> Mail </th>
	            <th>Phone</th>
	            <th>Done</th>
	            <th>added</th>
	            <th style="width:70px;"></th>
	          </tr>
	        </thead>
	        <tbody>
	        @foreach($contact as $row)
	          <tr>
	            <td>{{ $row->id  }}</td>
	            <td>{{ $row->message  }}</td>
	            <td>{{ $row->mail  }}</td>
	            <td>{{ $row->phone  }}</td>
	            <td>{{ $row->done  }}</td>
	            <td>{{ $row->created_at  }}</td>
	            <td>
	            	@if(empty($row->done))
				<a href="{{ route('admin.contact.done', $row->id) }}"><i class="fa fa-check-circle-o"></i></a>
			@endif

	            	{!! Form::open(array('route' => array('admin.contact.destroy', $row->id), 'method' => 'delete', 'style' => 'display:inline;')) !!}
				<button style="border:none;display:inline;background: none;" type="submit" ><i class="fa fa-trash-o"></i></button>
			{!!  Form::close() !!}
	          </tr>
	          @endforeach

	        </tbody>
	      </table>
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
@stop
@section('footer')
	<!-- DATA TABES SCRIPT -->
	<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
	<!-- FastClick -->
	<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
@stop
