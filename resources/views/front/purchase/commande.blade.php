@extends('front.layout.app')

@section('header')
	{!!HTML::style('front/css/purchase.css') !!}
@stop
@section('content')

<div class="columns-container">
	<div id="columns" class="container">
		<div>
		    	@include('front.produit.error')
		</div>

		<!-- Breadcrumb -->
		<div class="breadcrumb clearfix">
			<a class="home" href="http://localhost:8888/prestashop/" title="retour à Accueil"><i class="icon-home"></i></a>
			<span class="navigation-pipe">&gt;</span>
			{{Lang::get('purchase.basket_yours')}}
		</div>
<!-- /Breadcrumb -->

		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<h1 id="cart_title" class="page-heading">
					{{Lang::get('purchase.basket_recap')}}
				</h1>
				@if(\Cart::count() != 0)
				<span class="heading-counter">{{sprintf(Lang::choice('purchase.basket_recap_content', Cart::count()), Cart::count())}}</span>
				@endif

				<!-- Steps -->
				<ul class="step clearfix" id="order_step">
					<li class="step_current  first">
						<span><em>01.</em>{{Lang::get('purchase.breadscrumbs_recapitulatif')}}</span>
					</li>
					<li class="step_todo second">
						<span><em>02.</em> {{Lang::get('purchase.breadscrumbs_connexion')}}</span>
					</li>
					<li class="step_todo third">
						<span><em>03.</em> {{Lang::get('purchase.breadscrumbs_address')}}</span>
					</li>
					<li class="step_todo four">
						<span><em>04.</em> {{Lang::get('purchase.breadscrumbs_livraison')}}</span>
					</li>
					<li id="step_end" class="step_todo last">
						<span><em>05.</em> {{Lang::get('purchase.breadscrumbs_paiement')}}</span>
					</li>
				</ul>
				@if(\Cart::count() == 0)
					<p id="emptyCartWarning" class="alert alert-warning unvisible">Votre panier est vide</p>
				@endif

				{!! Form::open(['route' => ['basket.post'], 'method' => 'post', 'id' => 'validPanier', 'style' => 'display:inline;']) !!}
				<div id="order-detail-content" class="table_block table-responsive">
					<table id="cart_summary" class="table table-bordered stock-management-on">
						<thead>
							<tr>
								<th class="cart_product first_item">{{Lang::get('purchase.basket_produit')}}</th>
								<th class="cart_description item">{{Lang::get('purchase.basket_description')}}</th>
								<th class="cart_unit item text-right">{{Lang::get('purchase.basket_price_unit')}}</th>
								<th class="cart_quantity item text-center">{{Lang::get('purchase.basket_qty')}}</th>
								<th class="cart_delete last_item">&nbsp;</th>
								<th class="cart_total item text-right">{{Lang::get('purchase.totalht')}}</th>
								<th class="cart_total item text-right">{{Lang::get('purchase.basket_total')}}</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="5" id="cart_voucher" class="cart_voucher"></td>
								<td colspan="1" class="text-right">{{Lang::get('purchase.totalht')}} :</td>
								<td id="panier_foot_total_ht" colspan="1" class="price" id="total_ht_product"></td>
							</tr>
							<tr>
								<td colspan="5" id="cart_voucher" class="cart_voucher"></td>
								<td colspan="1" class="text-right">{{Lang::get('purchase.totaltva')}} :</td>
								<td id="panier_foot_total_tva" colspan="1" class="price" id="total_tva_product"></td>
							</tr>
							<tr class="cart_total_price">
								<td rowspan="3" colspan="5" id="cart_voucher" class="cart_voucher"></td>
								<td colspan="1" class="text-right">{{Lang::get('purchase.basket_total')}} :</td>
								<td id="panier_foot_total" colspan="1" class="price" id="total_product"></td>
							</tr>
						</tfoot>
						<tbody>
							@foreach(\Cart::content() as $row)
								<tr id="product_3_13_0_0" class="cart_item last_item first_item address_0 odd">
									<td class="cart_product">
										<a href="{{route('produit.show', $row->id) }}"><img src="{{asset($row->options->logo)}}" alt="Robe imprimée" height="98" width="98"></a>
									</td>
									<td class="cart_description">
										<p class="product-name"><a href="{{route('produit.show', $row->id) }}">{{$row->name}}</a></p>
									</td>
									<td class="cart_unit" data-title="Prix unitaire">
										<ul class="price text-right" id="product_price_3_13_0">
				            						<li class="panier_row_price">{{ $row->price }}</li>
										</ul>
									</td>
									<td class="cart_quantity text-center panier_row_qty">
										<input size="2" autocomplete="off" class="cart_quantity_input form-control grey" value="{{$row->qty}}" name="produit#{{$row->rowid}}" type="text">
									</td>
									<td class="cart_delete text-center" data-title="Delete">
										<div>
				            						<a href="{{ route('basket.destroy', $row->rowid) }}" style="border:none;display:inline;background: none;"><i class="fa fa-times"></i></a>
										</div>
									</td>
									<td>
										<span>
											{{round($row->subtotal*$pays->tva, 2)}}
										</span>
									</td>
									<td data-title="Total" class="panier_row_subtotal">
										<span class="price" id="total_product_price_3_13_0">
											{{$row->subtotal}}
										</span>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div> <!-- end order-detail-content -->
				<div id="HOOK_SHOPPING_CART"></div>
					<p class="cart_navigation clearfix">
						<a class="button btn btn-default standard-checkout button-medium" title="{{Lang::get('purchase.commander')}}">
								<input style="padding:10px;background:none;border:none;font-size:1em;" type="submit" alt="Submit" value="{{Lang::get('purchase.commander')}}" />
								<i style="padding-right:10px;" class="icon-chevron-right right"></i>
						</a>
						<a href="{{route('home')}}" class="button-exclusive btn btn-default" title="{{Lang::get('purchase.keep_buying')}}">
							<i class="icon-chevron-left"></i>{{Lang::get('purchase.keep_buying')}}
						</a>
					</p>

				</div><!-- #center_column -->
				{!!  Form::close() !!}
			</div><!-- .row -->
		</div><!-- #columns -->
	</div><!-- .columns-container -->
@stop

@section('footer')
<script type="text/javascript">
	devise = "{{{ Lang::get('menu.devise') }}}";
	$( document ).ready(function() {
		calculPanier();

		$(".panier_row_qty input").keyup(function() {
			qty = parseInt($(this).val());
			console.log($(this).parent().parent().find('.panier_row_price'));
			price = parseFloat($(this).parent().parent().find('.panier_row_price').text().replace(',', '.'));
			$(this).parent().parent().find('.panier_row_subtotal').html(qty*price);
			calculPanier();
		});
	});

	function calculPanier(){
		total = 0;
		tva = {{$pays->tva}};

		$( ".panier_row_subtotal" ).each(function( index ) {
		  	total = parseFloat($( this ).text().replace(',', '.').trim());
		});
		console.log(total);
		ht = total * tva;
		taxe = total - ht;
		$("#panier_foot_total").html(total.toFixed(2) + ' ' + devise);
		$("#panier_foot_total_tva").html(taxe.toFixed(2) + ' ' + devise);
		$("#panier_foot_total_ht").html(ht.toFixed(2) + ' ' + devise);
	}
</script>
@stop

