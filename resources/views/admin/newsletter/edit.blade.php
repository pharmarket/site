@extends('admin.layout.admin')
@section('content')

{!! Form::open(array('route' => array('admin.newsletter.update', $newsletter->id), 'method' => 'put')) !!}

<div class="row">
	<div>
		@include('admin.newsletter.errors')
	</div>
</div><!-- /.row -->

<div class="row navBlock">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Mise à jour de la Newsletter n°{{$newsletter->id}}</h3>
	</div><!-- /.col -->
</div>

<div class="row navTabs">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-header"></div>
			<!-- form start -->
			<div class="box-body">
				<div class="form-group">
                </div>
                <div class="form-group">
                	{!! Form::label('langue', 'Langue :') !!}
                    {!! Form::select('langue_id', $langues, $newsletter->langue_id, ['class'=>'form-control']) !!}
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
