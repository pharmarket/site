@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">

	  {{ $newsletter_mail->id  }} <br>
	  {{ $newsletter_mail->mail  }} <br>
	  {{ $newsletter_mail->choix }}

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

