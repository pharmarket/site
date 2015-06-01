@extends('front.layout.app')

@section('header')
	{!!HTML::style('front/css/purchase.css') !!}
@stop

@section('content')
<div class="container-fluid">
	<div class="row" style="margin-left:30px;">
		<div id="center_column" class="center_column col-xs-12 col-sm-12">
			<h1 class="page-heading bottom-indent">{{Lang::get('purchase.historic_command')}}</h1>
			<p class="info-title">{{Lang::get('purchase.historic_command_present')}}</p>
			<div class="block-center" id="block-history">
				<table id="order-list" class="table table-bordered footab default footable-loaded footable">
					<thead>
						<tr>
							<th class="first_item footable-first-column" data-sort-ignore="true">{{Lang::get('purchase.reference')}}</th>
							<th class="item footable-sortable">{{Lang::get('purchase.date')}}<span class="footable-sort-indicator"></span></th>
							<th data-hide="phone" class="item footable-sortable">{{Lang::get('purchase.basket_total')}}<span class="footable-sort-indicator"></span></th>
							<th class="item footable-sortable">{{Lang::get('purchase.etat')}}<span class="footable-sort-indicator"></span></th>
							<th data-sort-ignore="true" data-hide="phone,tablet" class="item">{{Lang::get('purchase.invoice')}}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($commande as $row)
							<tr class="first_item ">
								<td class="history_link bold footable-first-column"><span class="footable-toggle"></span>
									{{$row->reference}}
								</td>
								<td data-value="20150601163225" class="history_date bold">
									{{strftime ('%e %B %Y', date_timestamp_get(date_create($row->created_at)))}}
								</td>
								<td class="history_price" data-value="31.200000">
									<span class="price">
										{{$row->total}}
									</span>
								</td>
								<td data-value="10" class="history_state">
									<span class="label" style="background-color:#4169E1; border-color:#4169E1;">
										{{Lang::get('purchase.'.$row->statut)}}
									</span>
								</td>
								<td class="history_invoice">
									<a href="{{asset($row->invoice)}}">{{Lang::get('purchase.invoice')}}</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<ul class="footer_links clearfix">
					<li>
						<a class="btn btn-default button button-small" href="{{route('user.home')}}">
							<span>
								<i class="icon-chevron-left"></i> {{Lang::get('purchase.account')}}
							</span>
						</a>
					</li>
					<li>
						<a class="btn btn-default button button-small" href="{{route('home')}}">
							<span><i class="icon-chevron-left"></i> {{Lang::get('menu.home')}}</span>
						</a>
					</li>
				</ul>
			</div><!-- #center_column -->
		</div>
	</div>
</div>
@endsection
