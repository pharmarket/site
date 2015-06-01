@extends('admin.layout.admin')

@section('header')
	<!-- DATA TABLES -->
	<link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
	@include('admin.produit.succes')	
</div>

<div class="row navBlock">
	<div class="">
		<h3 style="text-align: center">Produit n°{{ $produit->id  }}</h3>
	</div><!-- /.col -->
</div>

<div class="row navTabs">
	<div class="col-md-10 col-md-offset-1 col-xs-12">
        <div class="panel with-nav-tabs panel-primary" style="min-height: 350px">
        	<!-- Nav tabs -->
            <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#infosGenerales" data-toggle="tab">Informations</a></li>
                        <li><a href="#descriptionMultilangues" data-toggle="tab">Descriptions multi-langues</a></li>
					    <li><a href="#images" data-toggle="tab">Images</a></li>
					    <li><a href="#videos" data-toggle="tab">Vidéos</a></li>
                    </ul>
            </div>

            <div class="panel-body">
                <div class="tab-content">
                	<!-- Tab panes Informations générales -->
                    <div class="tab-pane fade in active" id="infosGenerales">
                    	<div class="row">
			      			<div class="col-md-6 navTabsAlignRight" >Id :</div>
			      			<div class="col-md-6 navTabsAlignLeft">{{ $produit->id  }}</div>
			      		</div>
				      	<div class="row">
				      		<div class="col-md-6 navTabsAlignRight">Référence :</div>
				      		<div class="col-md-6 navTabsAlignLeft">{{ $produit->reference  }}</div>
				      	</div>
				      	<div class="row">
				      		<div class="col-md-6 navTabsAlignRight">Nom :</div>
				      		<div class="col-md-6 navTabsAlignLeft">
				      			@foreach ($produit->info as $value)
					            	@if($value->langue_id==1)
					            		{{$value->nom}}
				            		@endif
					            @endforeach
				      		</div>
				      	</div>
				      	<div class="row">
				      		<div class="col-md-6 navTabsAlignRight">Marque :</div>
				      		<div class="col-md-6 navTabsAlignLeft">{{ $produit->marque->nom }}</div>
				      	</div>
				      	<div class="row">
				      		<div class="col-md-6 navTabsAlignRight">Catégorie :</div>
				      		<div class="col-md-6 navTabsAlignLeft">{{ $produit->categorie->nom }}</div>
				      	</div>
				      	<div class="row">
				      		<div class="col-md-6 navTabsAlignRight">Sous-catégorie :</div>
				      		<div class="col-md-6 navTabsAlignLeft">{{ $produit->sous_categorie->nom }}</div>
				      	</div>
				      	<div class="row">
				      		<div class="col-md-6 navTabsAlignRight">Notice :</div>
				      		<div class="col-md-6 navTabsAlignLeft"><a href="{{asset($produit->notice)}}">PDF</a></div>
				      	</div>
				      	<div class="row">
				      		<div class="col-md-6 navTabsAlignRight">Fournisseur :</div>
				      		<div class="col-md-6 navTabsAlignLeft">
				      			@foreach ($produit->fournisseurs as $row)
					            	{{ $row->nom }}<br>
					            @endforeach
				      		</div>
				      	</div>
				      	<div class="row">
				      		@if($exemplaire[0]->total > 20)
				      		<div class="col-md-6 navTabsAlignRight">Stock :</div>
				      		<div class="col-md-6 navTabsAlignLeft">{{ $exemplaire[0]->total }}</div>
				      		@elseif($exemplaire[0]->total >= 1 && $exemplaire[0]->total <= 20)
				      		<div class="col-md-6 navTabsAlignRight alertYellowStock">Stock :</div>
				      		<div class="col-md-6 navTabsAlignLeft alertYellowStock">{{ $exemplaire[0]->total }}</div>
				      		@elseif($exemplaire[0]->total < 1)
				      		<div class="col-md-6 navTabsAlignRight alertRedStock">Stock :</div>
				      		<div class="col-md-6 navTabsAlignLeft alertRedStock">{{ $exemplaire[0]->total }}</div>
				      		@endif
				      	</div>
				      	<div class="row">
				      		<div class="col-md-6 navTabsAlignRight">Creation :</div>
				      		<div class="col-md-6 navTabsAlignLeft">{{ $produit->categorie->created_at  }}</div>
				      	</div>
				      	<div class="row">
				      		<div class="col-md-6 navTabsAlignRight">Mise à jour :</div>
				      		<div class="col-md-6 navTabsAlignLeft">{{ $produit->categorie->updated_at }}</div>
				      	</div>
                    </div>

                    <!-- Tab panes Description Multilangues -->
                    <div class="tab-pane fade" id="descriptionMultilangues">
                    	@foreach ($produit->langues as $value)
					    <div class="col-md-6 navBlock">
				            <div class="panel panel-success">
				                <div class="panel-heading">
				                    <h4 class="text-center">{{ $value->label}}</h4>
				                </div>
				                <div class="panel-body">
				                    <div class="row">
							            <div class="col-md-4 navTabsAlignRight">Nom :</div>
							            <div class="col-md-8 navTabsAlignLeft">{{ $value->pivot->nom }}</div>
							        </div>
							        <div class="row">
							            <div class="col-md-4 navTabsAlignRight">Description :</div>
							            <div class="col-md-8 navTabsAlignLeft">{{ $value->pivot->description }}</div>
							        </div>
				                </div>
				            </div>
				        </div>
				    	@endforeach
                    </div>

                    <!-- Tab panes Images -->
                    <div class="tab-pane fade" id="images">
                    	<div class="row navImages">
							@foreach($produit->media as $row)
								@if($row->type === 'image')
									<div class="col-md-3" style="text-align: center">
										<div class="navVignette">
											{!! HTML::image($row->chemin, '', array('height'=>'100')) !!}
										</div>
										@if($row->default == 1)
											{{ '(Image par défault)'}}
										@endif
									</div>
								@endif
							@endforeach
						</div>
                    </div>

                    <!-- Tab panes Videos -->
                    <div class="tab-pane fade" id="videos">
                    	<div class="row navImages">
							@foreach($produit->media as $row)
								@if($row->type === 'video')
									<div class="col-md-4" style="text-align: center">
										<div class="row navTitreVideos">
											Langue : {{$row->langue->code}}
										</div>
										<div class="row">
											<iframe width="215" height="160" src="{{$row->chemin}}" frameborder="0" allowfullscreen></iframe>
										</div>
										<div class="row" style="padding-top: 5px">
											{{$row->description}}
										</div>
									</div>
								@endif
							@endforeach
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row navTabs">
	<div class="col-md-10 col-md-offset-1 col-xs-12">
        <div class="panel with-nav-tabs panel-primary" style="min-height: 400px;">
        	<!-- Nav tabs -->
            <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#posologieAge" data-toggle="tab">Posologie Age</a></li>
                        <li><a href="#posologiePoids" data-toggle="tab">Posologie Poids</a></li>
                        <li><a href="#posologieTaille" data-toggle="tab">Posologie Taille</a></li>
                        <li><a href="#posologieSex" data-toggle="tab">Posologie Sex</a></li>
                    </ul>
            </div>

            <div class="panel-body">
                <div class="tab-content">

                	<!-- Tab panes Posologie Age -->
                    <div class="tab-pane fade in active" id="posologieAge">
					    <table class="datatable table table-bordered table-striped" id="select_table">
					        <thead>
					        	<tr>
						            <th>Id</th>
				    				<th>Age Minimum</th>
				    				<th>Age Maximum</th>
				    				<th>Coefficient</th>
				    			</tr>
				    		</thead>

					        <tfoot>
					        	<tr>
						            <th>Id</th>
				    				<th>Age Minimum</th>
				    				<th>Age Maximum</th>
				    				<th>Coefficient</th>
					          	</tr>
					        </tfoot>
					     	
					        <tbody>
						        @foreach ($produit->posologie as $value)
                    				@if($value->type_id==10)
					    			<tr>
					    				<th><a href="{{ route('admin.posologie.edit', $value->id) }}">{{ $value->id }}</a></th>
					    				<td>{{ $value->min }}</td>
					    				<td>{{ $value->max }}</td>
					    				<td>{{ $value->coeff }}</td>
					    			</tr>
					    			@endif
					    		@endforeach
				    		</tbody>
				    	</table>
                    </div>

                    <!-- Tab panes Posologie Poids -->
                    <div class="tab-pane fade" id="posologiePoids">                					    	
				    	<table class="datatable table table-bordered table-striped" id="select_table2">
				    		<thead>
				    			<tr>
				    				<th>Id</th>
				    				<th>Poids Minimum (Kg)</th>
				    				<th>Poids Maximum (Kg)</th>
				    				<th>Coefficient</th>
				    			</tr>
				    		</thead>

				    		<tfoot>
					        	<tr>
						            <th>Id</th>
				    				<th>Age Minimum</th>
				    				<th>Age Maximum</th>
				    				<th>Coefficient</th>
					          	</tr>
					        </tfoot>

				    		<tbody>
				    			@foreach ($produit->posologie as $value)
                    				@if($value->type_id==11)
					    			<tr>
					    				<th><a href="{{ route('admin.posologie.edit', $value->id) }}">{{ $value->id }}</th>
					    				<td>{{ $value->min }}</td>
					    				<td>{{ $value->max }}</td>
					    				<td>{{ $value->coeff }}</td>
					    			</tr>
					    			@endif
					    		@endforeach
				    		</tbody>
				    	</table>
                    </div>

                    <!-- Tab panes Posologie Taille -->
                    <div class="tab-pane fade" id="posologieTaille">                	
				    	<table class="datatable table table-bordered table-striped" id="select_table3">
				    		<thead>
				    			<tr>
				    				<th>Id</th>
				    				<th>Taille Minimale (Cm)</th>
				    				<th>Taille Maximal (Cm)</th>
				    				<th>Coefficient</th>
				    			</tr>
				    		</thead>

				    		<tfoot>
					        	<tr>
						            <th>Id</th>
				    				<th>Age Minimum</th>
				    				<th>Age Maximum</th>
				    				<th>Coefficient</th>
					          	</tr>
					        </tfoot>

				    		<tbody>
				    			@foreach ($produit->posologie as $value)
                    				@if($value->type_id==12)
					    			<tr>
					    				<th><a href="{{ route('admin.posologie.edit', $value->id) }}">{{ $value->id }}</th>
					    				<td>{{ $value->min }}</td>
					    				<td>{{ $value->max }}</td>
					    				<td>{{ $value->coeff }}</td>
					    			</tr>
					    			@endif
					    		@endforeach
				    		</tbody>
				    	</table>
                    </div>


                    <!-- Tab panes Posologie Sexe -->
                    <div class="tab-pane fade" id="posologieSex">                	
				    	<table class="datatable table table-bordered table-striped" id="select_table4">
				    		<thead>
				    			<tr>
				    				<th>Id</th>
				    				<th>Sexe</th>
				    				<th>Coefficient</th>
				    			</tr>
				    		</thead>

				    		<tfoot>
				    			<tr>
				    				<th>Id</th>
				    				<th>Sexe</th>
				    				<th>Coefficient</th>
				    			</tr>
				    		</tfoot>

				    		<tbody>
				    			@foreach ($produit->posologieSex as $value)
				    			<tr>
				    				<th><a href="{{ route('admin.posologie_sex.edit', $value->id) }}">{{ $value->id }}</th>
				    				<td>{{ $value->sexe }}</td>
				    				<td>{{ $value->coeff }}</td>
				    			</tr>
					    		@endforeach
				    		</tbody>
				    	</table>
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

