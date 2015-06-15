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
			{{Lang::get('purchase.breadscrumbs_paiement')}}
		</div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<!-- Steps -->
				<ul class="step clearfix" id="order_step">
					<li class="step_done first">
						<a href="{{ route('basket.index')}}">
							<em>01.</em> {{Lang::get('purchase.breadscrumbs_recapitulatif')}}
						</a>
					</li>
					<li class="step_done second">
						<a href="{{route('home')}}">
							<em>02.</em> {{Lang::get('purchase.breadscrumbs_connexion')}}
						</a>
					</li>
					<li class="step_done third">
						<a href="{{route('purchase.address')}}">
							<em>03.</em> {{Lang::get('purchase.breadscrumbs_address')}}
						</a>
					</li>
					<li class="step_done step_done_last four">
						<a href="{{route('purchase.livraison')}}">
							<em>04.</em>{{Lang::get('purchase.breadscrumbs_livraison')}}
						</a>
					</li>
					<li id="step_end" class="step_current last">
						<span><em>05.</em> {{Lang::get('purchase.breadscrumbs_paiement')}}</span>
					</li>
				</ul>
				<!-- /Steps -->
				<div class="paiement_block">
					<div id="order-detail-content" class="table_block table-responsive">
						<table id="cart_summary" class="table table-bordered">
							<thead>
								<tr>
									<th class="cart_product first_item">{{Lang::get('purchase.basket_produit')}}</th>
									<th class="cart_description item">{{Lang::get('purchase.basket_description')}}</th>
									<th class="cart_unit item text-right">{{Lang::get('purchase.basket_price_unit')}}</th>
									<th class="cart_quantity item text-center">{{Lang::get('purchase.basket_qty')}}</th>
									<th class="cart_total item text-right">{{Lang::get('purchase.totalht')}}</th>
									<th class="cart_total last_item text-right">{{Lang::get('purchase.basket_total')}}</th>
								</tr>
							</thead>
							<tfoot>
								<tr class="cart_total_price">
									<td colspan="4" class="text-right">{{Lang::get('purchase.totalht')}} :</td>
									<td colspan="2" class="price" id="total_product">{{$ht = round(Cart::total() * $pays->tva,2)}} {{ Lang::get('menu.devise') }}</td>
								</tr>
								<tr class="cart_total_price">
									<td colspan="4" class="text-right">{{Lang::get('purchase.totaltva')}} :</td>
									<td colspan="2" class="price" id="total_product">{{Cart::total()  - $ht}} {{ Lang::get('menu.devise') }}</td>
								</tr>
								<tr class="cart_total_price">
									<td colspan="4" class="text-right">{{Lang::get('purchase.basket_total_produit')}} :</td>
									<td colspan="2" class="price" id="total_product">{{Cart::total()}} {{ Lang::get('menu.devise') }}</td>
								</tr>
								<tr class="cart_total_delivery">
									<td colspan="4" class="text-right">{{Lang::get('purchase.delivrey_pay')}}</td>
									<td colspan="2" class="price" id="total_shipping">{{$livreurPrix}}{{ Lang::get('menu.devise') }}</td>
								</tr>
								<tr class="cart_total_price">
									<td colspan="4" class="total_price_container text-right"><span>{{Lang::get('purchase.basket_total')}}</span></td>
									<td colspan="2" class="price" id="total_price_container">
										<span id="total_price" data-selenium-total-price="31.2">{{$total}} {{ Lang::get('menu.devise') }}</span>
									</td>
								</tr>
							</tfoot>
							<tbody>
								@foreach(Cart::content() as $row)
									<tr id="product_3_13_0_5" class="cart_item address_5 odd">
										<td class="cart_product">
											<a href="{{route('produit.show', $row->id) }}"><img src="{{asset($row->options->logo)}}" alt="Robe imprimée" height="98" width="98"></a>
										</td>
										<td class="cart_description">
											<p class="product-name"><a href="{{route('produit.show', $row->id) }}">{{$row->name}}</a></p>
										</td>
										<td class="cart_unit" data-title="Prix unitaire">
											<ul class="price text-right" id="product_price_3_13_5">
						            					<li class="price">{{$row->price}}{{ Lang::get('menu.devise') }}</li>
											</ul>
										</td>

										<td class="cart_quantity text-center">
											<span>{{$row->qty}}</span>
										</td>
									<td>
										<span>
											{{round($row->subtotal*$pays->tva, 2)}}
										</span>
									</td>
										<td class="cart_total" data-title="Total">
											<span class="price" id="total_product_price_3_13_5">{{$row->subtotal}} {{ Lang::get('menu.devise') }}</span>
										</td>

									</tr>
								@endforeach
							</tbody>
						</table>
					</div> <!-- end order-detail-content -->
					<div id="HOOK_PAYMENT">
						<div class="row">
							<div class="col-xs-12">
								<p class="payment_module">
										{!! Form::open(['route' => ['purchase.confirm'], 'method' => 'post', 'id' => 'validPanier', 'style' => 'display:inline;']) !!}
											<input style="float:right;margin:15px;" type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
										{!!  Form::close() !!}
								</p>
							</div>
						</div>
					</div>
				</div> <!-- end HOOK_TOP_PAYMENT -->
			</div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div><!-- .columns-container -->
@stop
