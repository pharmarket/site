@extends('admin.layout.admin')
@section('content')
<section class="content-header">
	<h1>
		Utilisateur
		<small>Affichage</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ ucfirst(route('accueil')) }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Utilisateurs</li>
	</ol>
</section>

			<!-- Main content -->
<section class="content">
    <link href="{{ asset('front/css/onglet.css') }}" rel="stylesheet" type="text/css" />

    <div class="row navBlock">
        <div class="">
            <h3 style="text-align: center">Utilisateur n°{{ $user->id  }}</h3>
        </div><!-- /.col -->
    </div>

    <div class="row navTabs">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
            <div class="panel with-nav-tabs panel-primary" style="min-height: 350px">
                <!-- Nav tabs -->
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#infosGenerales" data-toggle="tab">Informations</a></li>
                        <li><a href="#avatar" data-toggle="tab">Avatar</a></li>
                        <li><a href="#insupp" data-toggle="tab">Information supplémentaire</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <!-- Tab panes Informations générales -->
                        <div class="tab-pane fade in active" id="infosGenerales">

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">INFORMATION GENERAL</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-weight: bold;">ROLE :</div>
                                                <div class="col-md-9">{{ $user->role->label }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-weight: bold;">VILLE :</div>
                                                <div class="col-md-9">{{ $user->ville->nom }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-weight: bold;">NOM :</div>
                                                <div class="col-md-9">{{ $user->nom }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-weight: bold;">PRENOM :</div>
                                                <div class="col-md-9">{{ $user->prenom }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-weight: bold;">MAIL :</div>
                                                <div class="col-md-9">{{ $user->mail }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-weight: bold;">PSEUDO :</div>
                                                <div class="col-md-9">{{ $user->pseudo }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-weight: bold;">BIRTH :</div>
                                                <div class="col-md-9">{{ $user->birth }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-weight: bold;">PHONE :</div>
                                                <div class="col-md-9">{{ $user->phone }}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-weight: bold;">MOBILE :</div>
                                                <div class="col-md-9">{{ $user->mobile }}</div>
                                            </div>


                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            </div>

                        </div>

                        <!-- Tab panes Description Multilangues -->
                        <div class="tab-pane fade" id="avatar">

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">AVATAR</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-9">{!! HTML::image($user->avatar, 'avatar', array('class' => 'thumb', 'height'=>'300', 'width'=>'300')) !!}</div>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            </div>

                        </div>

                        <!-- Tab panes Description Notice -->
                        <div class="tab-pane fade" id="insupp">

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-xs-12">
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <h3 class="box-title">INFORMATION SUPPLEMENTAIRE</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-3" style="text-align: right; font-size: 0.7em; font-weight: bold;">Crée le :</div>
                                                <div class="col-md-9" style="font-size: 0.7em;">{{ $user->created_at }}</div><br />
                                                <div class="col-md-3" style="text-align: right; font-size: 0.7em; font-weight: bold;">Modifié le :</div>
                                                <div class="col-md-9" style="font-size: 0.7em; font-weight: bold;">{{ $user->updated_at }}</div>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 navButton">
            <a class="btn btn-primary" title="Previous" alt="Previous" href="{{URL::previous()}}">Previous</a>
        </div>
    </div>
</section>
@stop
