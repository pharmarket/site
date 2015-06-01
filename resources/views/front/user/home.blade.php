@extends('front.layout.app')

@section('header')
	{!!HTML::style('front/css/purchase.css') !!}
@stop

@section('content')
<div class="container-fluid">
	<div class="row" id="my-account">
		<div id="center_column" class="center_column col-xs-12 col-sm-12">
			<h1 class="page-heading">{{Lang::get('purchase.account')}}</h1>
			<p class="info-account">{{Lang::get('purchase.account_present')}}</p>
			<div class="row addresses-lists">
				<div class="col-xs-12 col-sm-6 col-lg-4">
					<ul class="myaccount-link-list">
						<li><a href="{{route('purchase.suivi')}}" title="Commandes"><i class="icon-list-ol"></i><span>{{Lang::get('purchase.historic_command')}}</span></a></li>
						<li><a href="{{route('user.account')}}" title="Informations"><i class="icon-user"></i><span>{{Lang::get('purchase.personal_info')}}</span></a></li>
					</ul>
				</div>
			</div>
			<ul class="footer_links clearfix">
				<li><a class="btn btn-default button button-small" href="{{route('home')}}" title="{{Lang::get('menu.home')}}"><span><i class="icon-chevron-left"></i> Accueil</span></a></li>
			</ul>
		</div>
	</div>
</div>
@endsection
