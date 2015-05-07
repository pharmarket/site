@extends('front.layout.app')

@section('content')
	{!! Form::open(['route' => ['basket.post'], 'method' => 'post', 'id' => 'validPanier', 'style' => 'display:inline;']) !!}

	<table id="panier">
		<thead>
			<tr>
				<th>Produit</th>
				<th>Quantité</th>
				<th>Prix</th>
				<th>Total</th>
			</tr>
		</thead>
		<tfoot id="panier_foot">
			<tr>
				<td></td>
				<td></td>
				<td>Total:</td>
				<td id="panier_foot_total"></td>
			</tr>
		</tfoot>

		<tbody>

			<?php foreach(Cart::content() as $row) :?>

			<tr>
				<td>
				    	<p>
				    		<strong>{{$row->name}}</strong>
				    	</p>
				</td>
				<td class="panier_row_qty">
					<input name="produit#{{$row->rowid}}" type="text" value="<?php echo $row->qty;?>">
				</td>
				<td class="panier_row_price">{{$row->price}}</td>
				<td class="panier_row_subtotal">{{$row->subtotal}}</td>
				<td>
				            <a href="{{ route('basket.destroy', $row->rowid) }}" style="border:none;display:inline;background: none;"><i class="fa fa-times"></i></a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<input type="image" src="{{ asset('img/bouton_panier.png') }}" alt="Submit"></input>
	{!!  Form::close() !!}
@stop

@section('footer')
<script type="text/javascript">
	devise = "{{{ Lang::get('menu.devise') }}}";
	$( document ).ready(function() {
		calculPanier();

		$(".panier_row_qty input").keyup(function() {
			qty = parseInt($(this).val());
			price = parseInt($(this).parent().parent().find('.panier_row_price').text());
			$(this).parent().parent().find('.panier_row_subtotal').html(qty*price);
			calculPanier();
		});
	});

	function calculPanier(){
		total = 0;
		$( ".panier_row_subtotal" ).each(function( index ) {
		  	total += parseInt($( this ).text()) ;
		});
		$("#panier_foot_total").html(total + ' ' + devise);
	}
</script>
@stop
