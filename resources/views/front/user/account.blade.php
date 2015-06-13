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
					{!! Form::open(array('url' => route('user.account'), 'class'=>'form-horizontal', 'role'=>'form', 'method'=>'POST', 'files' => true )) !!}

						<div class="form-group">
							{!! Form::label('pseudo',Lang::get('user.pseudo'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::text('pseudo', (Auth::user()->pseudo)?Auth::user()->pseudo:((Input::get('pseudo'))?:null), ["class"=>"form-control", "required"]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('mail', Lang::get('user.mail'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::email('mail', (Auth::user()->mail)?Auth::user()->mail:((Input::get('mail'))?:null), ["class"=>"form-control"]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('ville#pays_id', Lang::get('user.pays'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::select('ville#pays_id', $pays, (Auth::user()->ville_id)?Auth::user()->ville->pays_id:((Input::get('ville#pays_id'))?:null), ["class"=>"form-control",  "value"=>old('pays_id')]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('ville#adresse', Lang::get('user.adresse'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::text('ville#adresse', (Auth::user()->ville_id)?Auth::user()->ville->adresse:((Input::get('ville#adresse'))?:null), ["class"=>"form-control",  "value"=>old('ville_adresse')]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('ville#cp', Lang::get('user.cp'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::text('ville#cp', (Auth::user()->ville_id)?Auth::user()->ville->cp:((Input::get('ville#cp'))?:null), ["class"=>"form-control",  "value"=>old('ville_cp')]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('ville#nom', Lang::get('user.ville'), array('class' => 'col-md-4 control-label')); !!}*
							<div class="col-md-6">
								{!! Form::text('ville#nom', (Auth::user()->ville_id)?Auth::user()->ville->nom:((Input::get('ville#nom'))?:null), ["class"=>"form-control",  "value"=>old('ville_nom')]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('nom', Lang::get('user.nom'), array('class' => 'col-md-4 control-label')); !!}
							<div class="col-md-6">
								{!! Form::text('nom', (Auth::user()->nom)?Auth::user()->nom:((Input::get('nom'))?:null), ["class"=>"form-control",  "value"=>old('nom')]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('prenom', Lang::get('user.prenom'), array('class' => 'col-md-4 control-label')); !!}
							<div class="col-md-6">
								{!! Form::text('prenom', (Auth::user()->prenom)?Auth::user()->prenom:((Input::get('prenom'))?:null), ["class"=>"form-control",  "value"=>old('prenom')]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('avatar', Lang::get('user.avatar'), array('class' => 'col-md-4 control-label')); !!}
							<div class="col-md-6">
								{!! Form::file('avatar', ["class"=>"form-control",  "value"=>old('avatar')]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('birth', Lang::get('user.naissance'), array('class' => 'col-md-4 control-label')); !!}
							<div class="col-md-6">
								{!! Form::input('date', 'birth', (Auth::user()->birth)?date('Y-m-d' , strtotime(Auth::user()->birth)):((Input::get('birth'))?:null), ["class"=>"form-control",  "value"=>old('birth')]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('phone', Lang::get('user.phone'), array('class' => 'col-md-4 control-label')); !!}
							<div class="col-md-6">
								{!! Form::input('tel', 'phone', (Auth::user()->phone)?Auth::user()->phone:((Input::get('phone'))?:null), ["class"=>"form-control"]); !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('mobile', Lang::get('user.mobile'), array('class' => 'col-md-4 control-label')); !!}
							<div class="col-md-6">
								{!! Form::input('tel', 'mobile', (Auth::user()->mobile)?Auth::user()->mobile:((Input::get('mobile'))?:null), ["class"=>"form-control",  "value"=>old('mobile')]); !!}
							</div>
						</div>

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
