@extends('front.layout.app')
@section('header')
	{!!HTML::style('front/css/purchase.css') !!}
@stop
@section('content')

<div id="order" class="columns-container">
	<div id="columns" class="container">

		<!-- Breadcrumb -->
		<div class="breadcrumb clearfix">
			<a class="home" href="{{route('home')}}" title="retour à Accueil"><i class="icon-home"></i></a>
			<span class="navigation-pipe">&gt;</span>
			{{Lang::get('purchase.breadscrumbs_livraison')}}
		</div>

		<!-- /Breadcrumb -->
		<div id="slider_row" class="row">
			<div id="top_column" class="center_column col-xs-12 col-sm-12"></div>
		</div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<div id="carrier_area">
					<h1 class="page-heading">{{Lang::get('purchase.breadscrumbs_livraison')}}</h1>
					<!-- Steps -->
					<ul class="step clearfix" id="order_step">
						<li class="step_done first">
							<a href="{{ route('basket.index')}}">
								<em>01.</em> {{Lang::get('purchase.breadscrumbs_recapitulatif')}}
							</a>
						</li>
						<li class="step_done second">
							<a href="http://localhost:8888/prestashop/commande?step=1">
								<em>02.</em> {{Lang::get('purchase.breadscrumbs_connexion')}}
							</a>
						</li>
						<li class="step_done step_done_last third">
							<a href="{{route('purchase.address')}}">
								<em>03.</em> {{Lang::get('purchase.breadscrumbs_address')}}
							</a>
						</li>
						<li class="step_current four">
							<span><em>04.</em> {{Lang::get('purchase.breadscrumbs_livraison')}}</span>
						</li>
						<li id="step_end" class="step_todo last">
							<span><em>05.</em> {{Lang::get('purchase.breadscrumbs_paiement')}}</span>
						</li>
					</ul>
					@if(!empty($errors))
						<span style="color:red; font-weight:bold">{{Lang::get('site.forgetTransport')}}</span>
					@endif
					<form id="form" action="{{route('purchase.livraison.post')}}" method="post" name="carrier_area">
						<div class="order_carrier_content box">
							<div class="delivery_options_address">
								<div class="delivery_options">
								@foreach($livreurs as $row)
									<div class="delivery_option item">
										<div>
											<table class="resume table table-bordered">
												<tbody>
													<tr>
														<td class="delivery_option_radio">
															<div id="uniform-delivery_option_5_0" class="radio">
																<span class="checked">
																	<input class="delivery_option_radio" name="livreur" value="{{$row->livreur_id}}"  {{{($row->livreur_id == \Session::get('livreur'))? 'checked' : ''}}}  type="radio">
																</span>
															</div>
														</td>
														<td class="delivery_option_logo">
														@if(!empty($row->logo))
														<img src="{{ asset($row->logo)}}" width="50px">
														@endif
														</td>
														<td>
															<strong>{{$row->nom}}</strong>
															<br>
															<span class="best_grade best_grade_price best_grade_speed">{{$row->description}}</span>
														</td>																																							</td>
														<td class="delivery_option_price">
															<div class="delivery_option_price">
																{{round($row->prix*$taux, 2)}}{{ Lang::get('menu.devise') }}
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div> <!-- end delivery_option -->
								@endforeach
								</div> <!-- end delivery_options -->
							</div> <!-- end delivery_options_address -->
							<div id="extra_carrier" style="display: none;">
							</div>
							<div class="checkbox">
								<div id="uniform-cgv" class="checker">
									<span>
										<input required name="cgv" id="cgv" value="1" type="checkbox">
									</span>
								</div>
								<label for="cgv">{{Lang::get('purchase.cgv')}}</label>
								<a href="http://localhost:8888/prestashop/content/3-conditions-utilisation?content_only=1" class="iframe" rel="nofollow">({{Lang::get('purchase.cgv_link')}})</a>
							</div>
						</div> <!-- end delivery_options_address -->
						<p class="cart_navigation clearfix">
							<a href="{{route('purchase.address')}}" title="{{Lang::get('purchase.back')}}" class="button-exclusive btn btn-default">
								<i class="icon-chevron-left"></i>
								{{Lang::get('purchase.back')}}
							</a>
							<button style="" type="submit" name="processCarrier" class="button btn btn-default standard-checkout button-medium">
								<span>
									{{Lang::get('purchase.continuer')}}
									<i class="icon-chevron-right right"></i>
								</span>
							</button>
						</p>
					</form>
				</div> <!-- end carrier_area -->
			</div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div><!-- .columns-container -->
@stop
