@extends('admin.layout.admin')

@section('header')
	
@stop

@section('content')

{!! Form::open(array('route' => array('admin.newsletter.update', $newsletter->id), 'method' => 'put')) !!}

<div class="row">
	<div>
		@include('admin.newsletter.errors')	
	</div>
</div><!-- /.row -->

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Mise à jour de la Newsletter n°{{$newsletter->id}}</h3>
	</div><!-- /.col -->
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-header"></div>
			<!-- form start -->			
			<div class="box-body">
				<div class="form-group">
                	{!! Form::label('id', 'Id :') !!}
                    {!!Form::input('texte', 'id', $newsletter->id, ['class' => 'form-control', 'name'=>'id', 'placeholder' => 'id'])!!}      
                </div>
                <div class="form-group">
                	{!! Form::label('langue', 'Langue :') !!}
                    {!! Form::select('langue', $langues, $newsletter->langue_id, ['class'=>'form-control']) !!}     
                </div>
                <div>
                	{!! Form::label('content', 'Contenu :') !!}
                    {!! Form::textarea('content', $newsletter->content, ['class' => 'form-control', 'name'=>'content', 'placeholder' => 'Contenu'])!!}
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