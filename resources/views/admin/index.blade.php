@extends('admin.layout.admin')

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-lg-3 col-xs-6">
     	<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{$new_sales}}</h3>
				<p>Nouvelle commande</p>
			</div>
			<div class="icon">
			  	<i class="ion ion-bag"></i>
			</div>
			<a href="{{route('admin.vente.index')}}" class="small-box-footer">Info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{$new_users}}</h3>
				<p>Nouveaux utilisateurs</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="{{route('admin.user.index')}}" class="small-box-footer">Info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div><!-- ./col -->
</div><!-- /.row -->
<!-- Main row -->
<div class="row">
	<!-- Left col -->
	<section class="col-lg-7 connectedSortable">
		<!-- Custom tabs (Charts with tabs)-->
		<div class="nav-tabs-custom">
			<!-- Tabs within a box -->
			<ul class="nav nav-tabs pull-right">
				<li class="pull-left header"><i class="fa fa-inbox"></i> Achats</li>
			</ul>
			<div class="tab-content no-padding">
			<!-- Morris chart - Sales -->
				<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
			</div>
		</div><!-- /.nav-tabs-custom -->

	</section><!-- /.Left col -->
	<!-- right col (We are only adding the ID to make the widgets sortable)-->
	<section class="col-lg-5 connectedSortable">

		<!-- solid sales graph -->
		<div class="box box-solid bg-teal-gradient">
			<div class="box-header">
				<i class="fa fa-th"></i>
				<h3 class="box-title">Commande</h3>
				<div class="box-tools pull-right">
					<button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body border-radius-none">
				<div class="chart" id="line-chart" style="height: 250px;"></div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- right col -->
</div><!-- /.row (main row) -->

@stop
@section('footer')
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('js/pages/dashboard.js') }}" type="text/javascript"></script>
  <script type="text/javascript">


/* Morris.js Charts */
// Sales chart
var area = new Morris.Area({
	element: 'revenue-chart',
	resize: true,
	data:{!!$json_sales!!},
	xkey: 'y',
	ykeys: ['total'],
	labels: ['Achat'],
	lineColors: ['#a0d0e0'],
	hideHover: 'auto'
});

var line = new Morris.Line({
	element: 'line-chart',
	resize: true,
	data:{!!$json_purchase!!},
	xkey: 'y',
	ykeys: ['total'],
	labels: ['Commande'],
	lineColors: ['#efefef'],
	lineWidth: 2,
	hideHover: 'auto',
	gridTextColor: "#fff",
	gridStrokeWidth: 0.4,
	pointSize: 4,
	pointStrokeColors: ["#efefef"],
	gridLineColor: "#efefef",
	gridTextFamily: "Open Sans",
	gridTextSize: 10
});
  </script>
@stop
