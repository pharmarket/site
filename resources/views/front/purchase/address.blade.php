@extends('front.layout.app')

@section('header')
	{!!HTML::style('front/css/purchase.css') !!}
@stop
@section('content')


<div class="columns-container">
	<div id="columns" class="container">
		<!-- Breadcrumb -->
		<div class="breadcrumb clearfix">
			<a class="home" href="{{route('home')}}" title="retour à Accueil"><i class="icon-home"></i></a>
			<span class="navigation-pipe">&gt;</span>
					{{Lang::get('purchase.breadscrumbs_address')}}
		</div>
		<!-- /Breadcrumb -->
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<h1 class="page-heading">{{Lang::get('purchase.breadscrumbs_address')}}</h1>

				<!-- Steps -->
				<ul class="step clearfix" id="order_step">
					<li class="step_done first">
						<a href="{{ route('basket.index') }}">
							<em>01.</em> {{Lang::get('purchase.breadscrumbs_recapitulatif')}}
						</a>
					</li>
					<li class="step_done step_done_last second">
						<a href="http://localhost:8888/prestashop/commande?step=1">
							<em>02.</em> {{Lang::get('purchase.breadscrumbs_connexion')}}
						</a>
					</li>
					<li class="step_current third">
						<span><em>03.</em> {{Lang::get('purchase.breadscrumbs_address')}}</span>
					</li>
					<li class="step_todo four">
						<span><em>04.</em> {{Lang::get('purchase.breadscrumbs_livraison')}}</span>
					</li>
					<li id="step_end" class="step_todo last">
						<span><em>05.</em> {{Lang::get('purchase.breadscrumbs_paiement')}}</span>
					</li>
				</ul>

				<div class="addresses clearfix">
					<div class="row">
						@if(!empty($user->ville_id))
							<div class="col-xs-12 col-sm-6">
								<ul class="address item box" id="address_delivery">
										<li class="address_title"><h3 class="page-subheading">{{Lang::get('purchase.delivery_choice')}}</h3></li>
										<li class="address_firstname address_lastname">{{$user->fullname}}</li>
										<li class="address_address1">{{$user->ville->adresse}}</li>
										<li class="address_postcode address_city">{{$user->ville->cp}}, {{$user->ville->nom}}</li>
										<li class="address_country_name">{{$user->ville->pays->nom}}</li>
										<li class="address_phone">{{$user->phone}}</li>
									<li class="address_update"><a class="button button-small btn btn-default" href="{{route('user.account')}}" title="{{Lang::get('purchase.update')}}"><span>{{Lang::get('purchase.update')}}<i class="icon-chevron-right right"></i></span></a></li>
								</ul>
							</div>
						@else
							<a class="button button-small btn btn-default" href="{{route('user.account')}}" title="{{Lang::get('purchase.updateAddress')}}"><span>{{Lang::get('purchase.updateAddress')}}<i class="icon-chevron-right right"></i></span></a>
						@endif
					</div> <!-- end addresses -->
					<p class="cart_navigation clearfix">
						<a href="{{ route('basket.index') }}" title="{{Lang::get('purchase.back')}}" class="button-exclusive btn btn-default">
							<i class="icon-chevron-left"></i>
							{{Lang::get('purchase.back')}}
						</a>
						<a href="{{route('purchase.livraison')}}" title="{{Lang::get('purchase.continuer')}}" class="button btn btn-default button-medium">
							<span>{{Lang::get('purchase.continuer')}}<i class="icon-chevron-right right"></i></span>
						</a>
					</p>
				</div>
			</div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div><!-- .columns-container -->
@stop
