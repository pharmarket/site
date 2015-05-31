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

<div class="row navBlock">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Ajout d'un mail</h3>
	</div><!-- /.col -->
</div>

{!! Form::open(array('route'=>'admin.newsletter.store')) !!}

<div class="row navTabs">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('langue', 'Langue') !!}
					{!! Form::select('langue_id', $langues, '', ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('title', 'Titre') !!}
					{!! Form::text('title', '', array('class'=>'form-control', 'name'=>'title', 'placeholder' => 'Titre')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('content', 'Contenu') !!}
					{!! Form::textarea('content', '', array('class'=>'form-control', 'name'=>'content', 'placeholder' => 'Contenu')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('send_at', 'Envoi') !!}
					{!! Form::input('date', 'send_at', null, ['class'=>'form-control', 'name'=>'send_at']) !!}
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div style="text-align: center" >
			<button type="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-danger" title="Previous" alt="Previous" href="{{URL::previous()}}">Cancel</a>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
{!!  Form::close() !!}

@stop
@section('footer')
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

