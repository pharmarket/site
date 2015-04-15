@extends('layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">

	  <div>
	    <div class="box-header">
	      <h3 class="box-title">Data Table With Full Features</h3>
	    </div><!-- /.box-header -->
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
	            <td>{{ $row->added  }}</td>
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
