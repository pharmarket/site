@extends('admin.layout.admin')
@section('content')

    <link href="{{ asset('front/css/onglet.css') }}" rel="stylesheet" type="text/css" />

    <div class="row">
        <div>
            @include('admin.user.errors')
            @include('admin.user.messageFalse')
        </div>
    </div>

    <div class="row navBlock">
        <div class="">
            <h3 style="text-align: center">Modification d'utilisateur</h3>
        </div><!-- /.col -->
    </div>

    {!! Form::open(array('route' => array('admin.user.update', $user->id), 'method' => 'put')) !!}

    <div class="row navTabs">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <div class="panel with-nav-tabs panel-primary" style="min-height: 350px">
                <!-- Nav tabs -->
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#user" data-toggle="tab">Utilisateur</a></li>
                        <li><a href="#ville" data-toggle="tab">Ville</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <!-- Tab panes Informations générales -->
                        <div class="tab-pane fade in active" id="user">

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <!-- general form elements -->
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Utilisateur</h3>
                                        </div>
                                        <!-- form start -->
                                        <div class="box-body">
                                            <div class="form-group">
                                                {!! Form::label('role_id', 'role :') !!}
                                                {!! Form::select('role_id', $role, $user->role_id, ['class'=>'form-control']) !!}
                                            </div>


                                            <div class="form-group">
                                                {!! Form::label('nom', 'nom :') !!}
                                                {!! Form::text('nom', $user->nom, array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'nom :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('prenom', 'prenom :') !!}
                                                {!! Form::text('prenom', $user->prenom, array('class'=>'form-control', 'name'=>'prenom', 'placeholder' => 'prenom :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('mail', 'mail :') !!}
                                                {!! Form::text('mail', $user->mail, array('class'=>'form-control', 'name'=>'mail', 'placeholder' => 'mail :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('pseudo', 'pseudo :') !!}
                                                {!! Form::text('pseudo', $user->pseudo, array('class'=>'form-control', 'name'=>'pseudo', 'placeholder' => 'pseudo :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::hidden('avatar', 'img/user/default.jpg', array('class'=>'form-control', 'name'=>'avatar', 'placeholder' => 'avatar :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('birth', 'birth :') !!}
                                                {!!Form::input('', 'birth', $user->birth, ['class' => 'form-control', 'name'=>'birth'])!!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('phone', 'phone :') !!}
                                                {!! Form::text('phone', $user->phone, array('class'=>'form-control', 'name'=>'phone', 'placeholder' => 'phone :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('mobile', 'mobile :') !!}
                                                {!! Form::text('mobile', $user->mobile, array('class'=>'form-control', 'name'=>'mobile', 'placeholder' => 'mobile :')) !!}
                                            </div>


                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                        </div>

                        <!-- Tab panes Description Multilangues -->
                        <div class="tab-pane fade" id="ville">

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <!-- general form elements -->
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">Ville</h3>
                                        </div>
                                        <!-- form start -->
                                        <div class="box-body">
                                            <div class="form-group">
                                                {!! Form::label('pays_id', 'pays :') !!}
                                                {!! Form::select('pays_id', $pays, $user->ville->pays_id, ['class'=>'form-control']) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('nom', 'nom :') !!}
                                                {!! Form::text('nom', $user->ville->nom, array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'nom :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('cp', 'cp :') !!}
                                                {!! Form::text('cp', $user->ville->cp, array('class'=>'form-control', 'name'=>'cp', 'placeholder' => 'cp :')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('adresse', 'adresse :') !!}
                                                {!! Form::textarea('adresse', $user->ville->adresse, array('class'=>'form-control', 'name'=>'adresse', 'placeholder' => 'adresse :')) !!}
                                            </div>

                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div style="text-align: center" >
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
            </div>
        </div><!-- /.col -->
    </div>

    {!!  Form::close() !!}

@stop
