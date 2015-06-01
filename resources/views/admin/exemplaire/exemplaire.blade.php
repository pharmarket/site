@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

<div class="row">
	@include('admin.exemplaire.succes')	
</div>

<div class="row">
	@include('admin.exemplaire.errors')	
</div>

<div class="row navBlock">
	<h3 style="text-align: center">Gestion des stocks</h3>
</div>

<div class="row">
	<div class="col-md-3 col-md-offset-8" style="text-align: right">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalImportCSV">
			Import CSV
		</button>
	</div>
</div>

<div class="row navTabs">
	<div class="col-md-10 col-md-offset-1 col-xs-12">
        <div class="panel with-nav-tabs panel-primary" style="min-height: 400px;">
        	<!-- Nav tabs -->
            <div class="panel-heading">
                    <ul class="nav nav-tabs">
                    	<li class="active"><a href="#stock" data-toggle="tab">Stock</a></li>
                        <li><a href="#stockImportant" data-toggle="tab">Stock Important (Sup.20)</a></li>
                        <li><a href="#stockFaible" data-toggle="tab">Stock Faible (Inf.20)</a></li>
                    </ul>
            </div>

            <div class="panel-body">
                <div class="tab-content">
                	<!-- Tab panes Stock -->
                    <div class="tab-pane fade in active" id="stock">
				    	<table class="datatable table table-bordered table-striped">
				    		<thead>
				    			<tr>
				    				<th>Produit Id</th>
				    				<th>Référence</th>
				    				<th>Quantité</th>
				    				<th>Prix unitaire(€)</th>
				    				<th>Montant (€)</th>
				    			</tr>
				    		</thead>

				    		<tbody>	
				    			@foreach($exemplaire as $row)
				    			<tr>
				    				<th><a href="{{ route('admin.exemplaire.listingExemplaires', $row->produit_id) }}">{{ $row->produit_id }}</a></th>
				    				<td>{{ $row->reference }}</td>
				    				<td><a href="#" data-toggle="modal" data-target="#exemplaire{{$row->produit_id}}">{{ $row->total }}</a></td>
				    				<td>{{ $row->montant }}</td>
				    				<td>{{ $row->total * $row->montant }}</td>
				    			</tr>

				    			<!-- Modal  Stock -->
								<div class="modal fade" id="exemplaire{{$row->produit_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  	<div class="modal-dialog">
								    	<div class="modal-content">
									      	<div class="modal-header">
									        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        	<h4 class="modal-title" id="myModalLabel">Gestion stock produit n°{{$row->produit_id}} ({{ $row->reference }})</h4>
									      	</div>
									      	
								    		<div class="modal-body">
								    			{!! Form::open(array('route'=>'admin.exemplaire.store', 'method' => 'post')) !!}
								    			{!! Form::hidden('produitId', $row->produit_id) !!}
									      		<div class="form-group navModalInformations">
								                	{!! Form::label('stockActuel', 'Stock actuel :') !!}
								                    {!!Form::input('texte', 'stockActuel', $row->total, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence', 'disabled'])!!}      
								                </div>
									      		<div class="form-group navModalInformations">
									      			{!! Form::label('reference', 'Référence :') !!}
									      			{!!Form::input('text', 'reference', null, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence'])!!}
									      		</div>
									      		<div class="form-group navModalInformations">
									      			{!! Form::label('datePeremption', 'Date de peremption :') !!}
									      			{!!Form::input('date', 'datePeremption', null, ['class' => 'form-control', 'name'=>'datePeremption', 'placeholder' => 'Date de peremption'])!!}
									      		</div>
									      		<div class="form-group navModalInformations" style="text-align: center">
									      			<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
									        		<button type="submit" class="btn btn-primary">Valider</button>
									      		</div>
									      		{!! Form::close() !!}
								      		</div>

									      	<div class="modal-footer">
									        	
									      	</div>
								    	</div>
								  	</div>
								</div>
				    			@endforeach
				    		</tbody>	
				    	</table>
                    </div>

                	<!-- Tab panes Stock Important (Sup.20) -->
                    <div class="tab-pane fade" id="stockImportant">
				    	<table class="datatable table table-bordered table-striped">
				    		<thead>
				    			<tr>
				    				<th>Produit Id</th>
				    				<th>Référence</th>
				    				<th>Quantité</th>
				    				<th>Prix unitaire(€)</th>
				    				<th>Montant (€)</th>
				    			</tr>
				    		</thead>

				    		<tbody>	
				    			@foreach($exemplaireImportant as $row)
				    			<tr>
				    				<th><a href="{{ route('admin.exemplaire.listingExemplaires', $row->produit_id) }}">{{ $row->produit_id }}</a></th>
				    				<td>{{ $row->reference }}</td>
				    				<td><a href="#" data-toggle="modal" data-target="#exemplaireImortant{{$row->produit_id}}">{{ $row->total }}</a></td>
				    				<td>{{ $row->montant }}</td>
				    				<td>{{ $row->total * $row->montant }}</td>
				    			</tr>

				    			<!-- Modal Stock Important -->
								<div class="modal fade" id="exemplaireImportant{{$row->produit_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  	<div class="modal-dialog">
								    	<div class="modal-content">
									      	<div class="modal-header">
									        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        	<h4 class="modal-title" id="myModalLabel">Gestion stock produit n°{{$row->produit_id}}</h4>
									      	</div>
								    		{!! Form::open(array('route'=>'admin.exemplaire.store', 'method' => 'post')) !!}
								    		<div class="modal-body">
								    			{!! Form::hidden('produitId', $row->produit_id) !!}
									      		<div class="form-group navModalInformations">
								                	{!! Form::label('stockActuel', 'Stock actuel :') !!}
								                    {!!Form::input('texte', 'stockActuel', $row->total, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence', 'disabled'])!!}      
								                </div>
									      		<div class="form-group navModalInformations">
									      			{!! Form::label('reference', 'Référence :') !!}
									      			{!!Form::input('text', 'reference', null, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence'])!!}
									      		</div>
									      		<div class="form-group navModalInformations">
									      			{!! Form::label('datePeremption', 'Date de peremption :') !!}
									      			{!!Form::input('date', 'datePeremption', null, ['class' => 'form-control', 'name'=>'datePeremption', 'placeholder' => 'Date de peremption'])!!}
									      		</div>								 
								      		</div>
									      	<div class="modal-footer">
									        	<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
									        	<button type="submit" class="btn btn-primary">Valider</button>
									      	</div>
									      	{!! Form::close() !!}
								    	</div>
								  	</div>
								</div>
				    			@endforeach
				    		</tbody>	
				    	</table>
                    </div>

                    <!-- Tab panes Stock Faible (Inf.20) -->
                    <div class="tab-pane fade" id="stockFaible">                					    	
				    	<table class="datatable table table-bordered table-striped">
				    		<thead>
				    			<tr>
				    				<th>Produit Id</th>
				    				<th>Référence</th>
				    				<th>Quantité</th>
				    				<th>Prix unitaire(€)</th>
				    				<th>Montant (€)</th>
				    			</tr>
				    		</thead>

				    		<tbody>
				    			@foreach($exemplaireFaible as $row)
				    			<tr>	
				    				<th><a href="{{ route('admin.exemplaire.listingExemplaires', $row->produit_id) }}">{{ $row->produit_id }}</a></th>
				    				<td>{{ $row->reference }}</td>
				    				<td><a href="#" data-toggle="modal" data-target="#exemplaireFaible{{$row->produit_id}}">{{ $row->total }}</a></td>
				    				<td>{{ $row->montant }}</td>
				    				<td>{{ $row->total * $row->montant }}</td>
				    			</tr>

				    			<!-- Modal Stock Faible -->
								<div class="modal fade" id="exemplaireFaible{{$row->produit_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  	<div class="modal-dialog">
								    	<div class="modal-content">
									      	<div class="modal-header">
									        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        	<h4 class="modal-title" id="myModalLabel">Gestion stock produit n°{{$row->produit_id}}</h4>
									      	</div>
								    		{!! Form::open(array('route'=>'admin.exemplaire.store', 'method' => 'post')) !!}
								    		<div class="modal-body">
								    			{!! Form::hidden('produitId', $row->produit_id) !!}
									      		<div class="form-group navModalInformations">
								                	{!! Form::label('stockActuel', 'Stock actuel :') !!}
								                    {!!Form::input('texte', 'stockActuel', $row->total, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence', 'disabled'])!!}      
								                </div>
									      		<div class="form-group navModalInformations">
									      			{!! Form::label('reference', 'Référence :') !!}
									      			{!!Form::input('text', 'reference', null, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence'])!!}
									      		</div>
									      		<div class="form-group navModalInformations">
									      			{!! Form::label('datePeremption', 'Date de peremption :') !!}
									      			{!!Form::input('date', 'datePeremption', null, ['class' => 'form-control', 'name'=>'datePeremption', 'placeholder' => 'Date de peremption'])!!}
									      		</div>								 
								      		</div>
									      	<div class="modal-footer">
									        	<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
									        	<button type="submit" class="btn btn-primary">Valider</button>
									      	</div>
									      	{!! Form::close() !!}
								    	</div>
								  	</div>
								</div>
				    			@endforeach
				    		</tbody>	
				    	</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Import Csv -->
<div class="modal fade" id="modalImportCSV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Ajout d'exemplaires</h4>
	      	</div>
	      	{!! Form::open(array('route'=>'admin.exemplaire.importCSV', 'method' => 'post', 'files' => true)) !!}
	      	<div class="modal-body">
		      	<div class="form-group">
					{!! Form::file('file', null, ['class' => 'form-control']) !!}<br>
				</div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	<button type="submit" class="btn btn-primary">Submit</button>
	      	</div>
	      	{!! Form::close() !!}
	    </div>
  	</div>
</div>

@stop
@section('footer')
	<!-- DATA TABES SCRIPT -->
	<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
	<!-- FastClick -->
	<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
@stop