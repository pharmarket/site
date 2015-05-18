@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

<div class="row">
	<div>
		@include('admin.newsletter.errors')	
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Ajout d'un mail</h3>
	</div><!-- /.col -->
</div>

{!! Form::open(array('route'=>'admin.newsletter.store')) !!}

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('langue', 'Langue') !!}
					{!! Form::select('langue_id', $langues, '', ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('content', 'Contenu') !!}
					{!! Form::textarea('content', '', array('class'=>'form-control', 'name'=>'content', 'placeholder' => 'Contenu')) !!}
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div style="text-align: center" >
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
{!!  Form::close() !!}

@stop
@section('footer')
	<!-- DATA TABES SCRIPT -->
	<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
	<!-- FastClick -->
	<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
	<!-- TinyMCE-->
	<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            plugins: [
                "",
                "",
                ""
            ],
            toolbar: "undo redo | styleselect | bold italic | bullist numlist"
        });
    </script>
@stop

