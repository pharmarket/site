@extends('admin.layout.admin')
@section('content')
<section class="content-header">
	<h1>
		Utilisateur
		<small>Création</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Utilisateurs</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">
    <div class="row">
        <div>
            @include('admin.user.errors')
            @include('admin.user.messageFalse')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h3 style="text-align: center">Ajout d'un utilisateur</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route'=>'admin.user.store')) !!}

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Informations générales</h3>
                </div>
                <!-- form start -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('role_id', 'role :') !!}
                        {!! Form::select('role_id', $role, '', ['class'=>'form-control']) !!}
                    </div>

                                            <div class="form-group">
                                                {!! Form::label('ville', 'Ville :') !!}
                                                {!! Form::text('ville', null, array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'nom :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('cp', 'cp :') !!}
                                                {!! Form::text('cp', null, array('class'=>'form-control', 'name'=>'cp', 'placeholder' => 'cp :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('adresse', 'adresse :') !!}
                                                {!! Form::textarea('adresse', null, array('class'=>'form-control', 'name'=>'adresse', 'placeholder' => 'adresse :')) !!}
                                            </div>
                    <div class="form-group">
                        {!! Form::label('pays_id', 'Pays :') !!}
                        {!! Form::select('pays_id', $pays, '', ['class'=>'form-control']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('nom', 'nom :') !!}
                        {!! Form::text('nom', '', array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'nom :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('prenom', 'prenom :') !!}
                        {!! Form::text('prenom', '', array('class'=>'form-control', 'name'=>'prenom', 'placeholder' => 'prenom :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('mail', 'mail :') !!}
                        {!! Form::text('mail', '', array('class'=>'form-control', 'name'=>'mail', 'placeholder' => 'mail :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password :') !!}
                        {!! Form::password('password', array('class'=>'form-control', 'name'=>'password', 'placeholder' => 'password :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password :') !!}
                        {!! Form::password('password2', array('class'=>'form-control', 'name'=>'password2', 'placeholder' => 'password :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pseudo', 'pseudo :') !!}
                        {!! Form::text('pseudo', '', array('class'=>'form-control', 'name'=>'pseudo', 'placeholder' => 'pseudo :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::hidden('avatar', 'img/user/default.jpg', array('class'=>'form-control', 'name'=>'avatar', 'placeholder' => 'avatar :')) !!}

                    </div>

                    <div class="form-group">
                        {!! Form::label('birth', 'birth :') !!}
                        {!!Form::input('date', 'birth', null, ['class' => 'form-control', 'name'=>'birth', 'placeholder' => 'Date'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone', 'phone :') !!}
                        {!! Form::text('phone', '', array('class'=>'form-control', 'name'=>'phone', 'placeholder' => 'phone :')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('mobile', 'mobile :') !!}
                        {!! Form::text('mobile', '', array('class'=>'form-control', 'name'=>'mobile', 'placeholder' => 'mobile :')) !!}
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
  </section>

@stop
