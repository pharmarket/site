@extends('front.layout.home')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{Lang::get('user.login')}}</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open(array('url' => route('user.login'), 'class'=>'form-horizontal', 'role'=>'form', 'method'=>'POST')) !!}

						<div class="form-group">
							{!! Form::label('mail',  Lang::get('user.mail'), array('class' => 'col-md-4 control-label')); !!}
							<div class="col-md-6">
								{!! Form::email('mail', null, ["class"=>"form-control",  "value"=>old('email')]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('password', Lang::get('user.password'), array('class' => 'col-md-4 control-label')); !!}
							<div class="col-md-6">
								{!! Form::password('password', ["class"=>"form-control",  "value"=>old('password')]); !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										{!! Form::checkbox('remember'); !!}
										{!! Form::label('remember',  Lang::get('user.remember')); !!}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">{{ Lang::get('user.login')}}</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
