@extends('front.layout.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(!empty($message))
				<h2>{{$message}}</h2>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">{{Lang::get('menu.suscribe')}}</div>
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
					{!! Form::open(array('url' => route('user.suscribe'), 'class'=>'form-horizontal', 'role'=>'form', 'method'=>'POST', 'files' => true )) !!}

						<div class="form-group">
							{!! Form::label('pseudo',Lang::get('user.pseudo'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::text('pseudo', (Auth::user())?Auth::user()->pseudo:((Input::get('pseudo'))?:null), ["class"=>"form-control", "required"]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('mail', Lang::get('user.mail'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::email('mail', (Auth::user())?Auth::user()->mail:((Input::get('mail'))?:null), ["class"=>"form-control"]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('password', Lang::get('user.password'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::password('password', ["class"=>"form-control"]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('password_confirmation', Lang::get('user.confirm_password'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::password('password_confirmation', ["class"=>"form-control",  "value"=>old('password_confirmation')]); !!}
							</div>
						</div>
						<div class="g-recaptcha" data-sitekey="6LeGSwgTAAAAAB-J6NO6_w019b4Fi9eieows04Xx"></div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									{{Lang::get('site.valid')}}
								</button>
							</div>
						</div>
					{!! Form::close() !!}

					<div>
						<span>* {{Lang::get('site.required')}}</span><br/>
						<span>** {{Lang::get('site.required_without')}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
