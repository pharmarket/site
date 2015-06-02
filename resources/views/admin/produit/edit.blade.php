@extends('admin.layout.admin')

@section('header')

@stop

@section('content')

{!! Form::open(array('method' => 'put', 'url' => route('admin.produit.update', $produit->id), 'enctype' => 'multipart/form-data', 'files' => true, 'class' => 'dropzone')) !!}

<div class="row">
	<div>
		@include('admin.produit.errors')
	</div>
</div><!-- /.row -->

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<h3 style="text-align: center">Mise à jour du produit n°{{$produit->id}}</h3>
	</div><!-- /.col -->
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-1 col-xs-12">
        <div class="panel with-nav-tabs panel-primary">
        	<!-- Nav tabs -->
            <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li  class="active"><a href="#infosGenerales" data-toggle="tab">Informations</a></li>
					    <li><a href="#descriptionMultilangues" data-toggle="tab">Descriptions multi-langues</a></li>
					    <li><a href="#images" data-toggle="tab">Images</a></li>
					    <li><a href="#videos" data-toggle="tab">Videos</a></li>
                    </ul>
            </div>

            <div class="panel-body">
                <div class="tab-content">
                	<!-- Tab panes Informations générales -->
                    <div class="tab-pane fade in active" id="infosGenerales">
                    	<div class="form-group navInformations">
		                	{!! Form::label('reference', 'Référence :') !!}
		                    {!! Form::input('texte', 'reference', $produit->reference, ['class' => 'form-control', 'name'=>'reference', 'placeholder' => 'Référence']) !!}
		                </div>
		                <div class="form-group navInformations">
		                    {!! Form::label('marque', 'Marque :') !!}
		                    {!! Form::select('marque', $marques, $produit->marque_id, ['class'=>'form-control']) !!}
		                </div>
		                <div class="form-group navInformations">
		                    {!! Form::label('categorie', 'Catégorie :') !!}
		                    {!! Form::select('categorie', $categories, $produit->categorie_id, ['class'=>'form-control']) !!}
		                </div>
		                <div class="form-group navInformations">
		                    {!! Form::label('sousCategorie', 'Sous-catégorie :') !!}
		                    {!! Form::select('sousCategorie', $sousCategories, $produit->sous_categorie_id, ['class'=>'form-control']) !!}
		                </div>
		                <div class="form-group navInformations">
		                    {!! Form::label('notice', 'Notice:') !!}
		                    {!! Form::file('notice', ['class'=>'form-control']) !!}
		                </div>
		                <div class="form-group navInformations">
		                    {!! Form::label('fournisseur', 'Fournisseur :') !!}
		                    {!! Form::select('fournisseur', $fournisseurs, $produit->fournisseurs->lists('id'), ['multiple' => 'multiple', 'class'=>'form-control', 'name'=>'fournisseur[]']) !!}
		                </div>
		                <div class="form-group navInformations">
		                	{!! Form::label('montant', 'Prix (euros) :') !!}
		                    {!! Form::input('texte', 'montant', $produit->montant, ['class' => 'form-control', 'name'=>'montant', 'placeholder' => 'Montant'])!!}
		                </div>
                    </div>

                    <!-- Tab panes Description Multilangues -->
                    <div class="tab-pane fade" id="descriptionMultilangues">
                    	@foreach ($langues as $row)
                    	<div class="col-md-6">
                    		<div class="row">
					            <div class="col-md-12"><h4 class="navTitle">{{ $row->label }}</h4></div>
					        </div>
                    		<div class="form-group">
		                		{!! Form::label('nom_'.$row->id, 'Nom :') !!}
		                    	{!! Form::input('nom_'.$row->id, 'nom_'.$row->id, $produit->info[$row->id-1]->nom, ['class' => 'form-control', 'placeholder' => $row->label]) !!}
		                	</div>
			                <div class="form-group">
			                	{!! Form::label('description_'.$row->id, 'Description :') !!}
			                    {!! Form::textarea('description_'.$row->id, $produit->info[$row->id-1]->description, ['class' => 'form-control', 'placeholder' => $row->label]) !!}
			                </div>
			            </div>
                    	@endforeach
                    </div>

                    <!-- Tab panes Images -->
                    <div class="tab-pane fade" id="images">
                    	<div class="form-group">
							<div class="row navImages">
								@foreach($produit->media as $row)
									@if($row->type === 'image')
										{!! Form::hidden('image', $row->id) !!}
										<div class="col-md-3" style="text-align: center">
											<div class="navVignette">{!! HTML::image($row->chemin, '', array('style' =>"max-width:300px", 'height'=>'100')) !!}</div>
											<div id="removeDefault">
												{!! Form::label('parDefault', 'Par défault') !!}
												{!! Form::radio('parDefault', $row->id, $row->default, array('id'=>'parDefault'.$row->id));!!}
											</div>
											<div id="langueImage">
												{!! Form::label('langues_'.$row->id, 'Langues') !!}
	   											{!! Form::select('langues_'.$row->id, $langues_list, $row->langue_id) !!}
											</div>
											<div id="removeImage">
												{!! Form::label('supprimer_'.$row->id, 'Supprimer') !!}
	   											{!! Form::checkbox('supprimer_'.$row->id, $row->id,  false) !!}
	   										</div>
										</div>
									@endif
								@endforeach
							</div>
						</div>
						<div class="form-group">
		                    <h4>{!! Form::label('upload_'.$row->id, "Ajout d'images :", array('style'=>'margin-left:10px')) !!}</h4>
		                    <div id="mulitplefileuploader">Upload</div>
		                    <div id="status" data-id="{{$produit->id}}"></div>
		                </div>
                    </div>

                    <!-- Tab panes Videos -->
                    <div class="tab-pane fade" id="videos">
                    	<div class="row navImages">
							@foreach($produit->media as $row)
								@if($row->type === 'video')
									<div class="col-md-4" style="text-align: center">
										<div class="navTitreVideos">
											Langue : {{$row->langue->code}}
										</div>
										<div>
											<iframe width="215" height="160" src="{{$row->chemin}}" frameborder="0" allowfullscreen></iframe>

										</div>
										<div>
											{{$row->description}}
										</div>
										<div id="removeVideo">
											{!! Form::label('videoSupprimer_'.$row->id, 'Supprimer') !!}
   											{!! Form::checkbox('videoSupprimer_'.$row->id, $row->id,  false) !!}
   										</div>
									</div>
								@endif
							@endforeach
						</div>
						<div class="row">
							<div class="form-group navInformations">
								<h4 class="navTitle">Ajout d'une vidéo :</h4>
							</div>

							<div class="form-group navInformations">
	                    		{!! Form::label('video_langue', ' Langue :') !!}
	                    		{!! Form::select('video_langue', $langueVideos, '', ['class'=>'form-control', 'name'=>'video_langue']) !!}
	                		</div>
	                		<div class="form-group navInformations">
	                    		{!! Form::label('video_nom', ' Nom :') !!}
	                    		{!! Form::input('texte', 'video_nom', null, ['class' => 'form-control', 'name' => 'video_nom', 'placeholder' => 'Nom']) !!}
	                		</div>
	                		<div class="form-group navInformations">
	                    		{!! Form::label('video_description', ' Description :') !!}
	                    		{!! Form::input('texte', 'video_description', null, ['class' => 'form-control', 'name' => 'video_description', 'placeholder' => 'Description']) !!}
	                		</div>
	                		<div class="form-group navInformations">
	                    		{!! Form::label('video_chemin', ' Chemin :') !!}
	                    		{!! Form::input('texte', 'video_chemin', null, ['class' => 'form-control', 'name' => 'video_chemin', 'placeholder' => 'Chemin']) !!}
	                		</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3 col-xs-12">
		<div  class="navButton">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a class="btn btn-danger" title="Previous" alt="Previous" href="{{URL::previous()}}">Cancel</a>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->
{!!  Form::close() !!}

@stop
@section('footer')

	<!-- Hayageek Jquery Uploadfile-->
	<script src="{{ asset('plugins/jqueryfileupload/jquery.uploadfile.js') }}"></script>

	<script>



		$(document).ready(function()
		{
			var id = $("#status").data('id');

			var settings = {
			    url: "{{ URL::to('admin/produit/upload') }}",
			    dragDrop:true,
			    data : id,
			    formData: {"idproduit":id},
			    fileName: "myfile",
			    allowedTypes:"jpg,png,gif,doc,pdf,zip",
			    returnType:"json",
				onSuccess:function(files,data,xhr)
			    {
			       // alert((data));
			    },
			    showDelete:true,
			    deleteCallback: function(data,pd)
				{
			    for(var i=0;i<data.length;i++)
			    {
			        $.post("{{ URL::to('admin/produit/delete') }}",{op:"delete", idProduit:{{ $produit->id }}, name:data[i]},
			        function(resp, textStatus, jqXHR)
			        {
			            //Show Message
			            $("#status").append("<div>File Deleted</div>");
			        });
			     }
			    pd.statusbar.hide(); //You choice to hide/not.
			}
		}

		var uploadObj = $("#mulitplefileuploader").uploadFile(settings);

		});

	</script>
@stop
