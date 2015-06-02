<section class="page_head">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
  <div class="col-sm-9 col-md-9 col-lg-9">
    <div class="widget widget_search">
    								<div class="site-search-area">
    									{!! Form::open(array('route'=>'front.recherche.resultat', 'class' => 'dropzone', 'id' =>'site-searchform', 'method' => 'get')) !!}
                                    <div>
                                       {!! Form::input('texte', 's', null, ['class' => 'input-text', 'id'=>'s', 'placeholder' => 'Saisir une recherche sur : reference, marque, catégorie, sous-catégorie, montant, nom et description du produit.'])!!}
                                       <input id="searchsubmit" value="Search" type="submit">
                                    </div>
                                {!! Form::close() !!}
    								</div><!-- end site search -->
    							</div>

									@yield('breadcrumbs')
  </div>
  <div class="col-sm-3 col-md-3 col-lg-3">

  </div>
</div>


					</div>
				</div>
			</div>
		</section>
