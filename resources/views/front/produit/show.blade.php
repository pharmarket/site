@extends('front.layout.app')
@section('content')
@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/produit.css') }}" rel="stylesheet" type="text/css" />

@stop

<style>
    .space{
        margin-top: 150px;
    }






</style>

<div class="columns-container">
    <div id="columns" class="container">

        <div id="slider_row" class="row">
            <div id="top_column" class="center_column col-xs-12 col-sm-12"></div>
        </div>
        <div class="row">

            <div>
                @include('front.produit.error')
            </div>

            <div id="center_column" class="center_column col-xs-12 col-sm-12">


                <div itemscope="" itemtype="http://schema.org/Product">
                    <div class="primary_block row">
                        <div class="container">
                            <div class="top-hr"></div>
                        </div>
                        <!-- left infos-->
                        <div class="pb-left-column col-xs-12 col-sm-4 col-md-5">
                            <!-- product img-->
                            <div id="image-block" class="clearfix">
                                <span id="view_full_size">
                                    @foreach($res as $row)
                                        @if($row->type == 'image' AND $row->default == 1)
                                            {!! HTML::image($row->chemin . $row->nom, '', array('height'=>'300', 'width'=>'300')) !!}
                                        @endif
                                    @endforeach
                                </span>

                                <section class="image-gallery">
                                    <h3 style="margin-left: 150px;">{{Lang::get('show.image')}}</h3>
                                    @foreach($res as $row)
                                        @if($row->default === NULL)
                                            <p>{{Lang::get('show.pindisponible')}}</p>
                                        @else
                                            @if($row->type == 'image' AND $row->default == 0)
                                                @if($row->langue->label == Lang::get('menu.langactiv'))
                                                    <figure style="margin-left:50px;" tabindex="{{$row->id}}" contenteditable="true">
                                                        {!! HTML::image($row->chemin . $row->nom, '', array('height'=>'80', 'width'=>'80', 'contenteditable'=>'false')) !!}
                                                        <figcaption contenteditable="false"><span class="glyphicon glyphicon-picture"><br />{{$row->description}}</span></figcaption>
                                                    </figure>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </section>

                            </div> <!-- end image-block -->

                            <section class="image-gallery">
                                <h3 style="margin-left: 150px;">{{Lang::get('show.video')}}</h3>
                                @foreach($res as $row)
                                    @if($row->default === NULL)
                                        <p>{{Lang::get('show.vindisponible')}}</p>
                                    @else
                                        @if($row->type == 'video' AND $row->default == 0)
                                            @if($row->langue->label == Lang::get('menu.langactiv'))
                                                <figure style="height: 200px; width: 250px; margin-left:140px;" tabindex="{{$row->id}}" contenteditable="true">
                                                    <iframe width="200" height="150" src="{{$row->chemin}}" contenteditable="false" frameborder="0" allowfullscreen></iframe>
                                                    <figcaption contenteditable="false"><span class="glyphicon glyphicon-facetime-video">{{$row->nom}}<br />{{$row->description}}</span></figcaption>
                                                </figure>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            </section>

                        </div> <!-- end pb-left-column -->




                        <!-- center infos -->
                        <div class="pb-center-column col-xs-12 col-sm-4">
                            <h1 itemprop="name">
                                {{$produit_info->nom}}
                            </h1>
                            <p id="product_reference">
                                <label>{{ Lang::get('show.reference') }} </label>
                                <span class="editable" itemprop="sku">{{ $produit->reference  }}</span>
                            </p>
                            <p id="product_condition">
                                <label>{{ Lang::get('show.marque') }} </label>
                                <link itemprop="itemCondition" href="http://schema.org/NewCondition">
                                <span class="editable">{{ $produit->marque->nom }}</span>
                            </p>
                            <div id="short_description_block">
                                <div id="short_description_content" class="rte align_justify" itemprop="description"><p>
                                        {{$produit_info->description}}

                                        &nbsp;</p></div>
                                <!---->
                            </div> <!-- end short_description_block -->
                            <!-- number of item in stock -->
                            <p id="pQuantityAvailable">
                                <span style="display: none;" id="quantityAvailableTxt"></span>
                                <span id="quantityAvailableTxtMultiple">{{ Lang::get('show.create') }} {{ $produit->categorie->created_at  }}</span>
                            </p>
                            <!-- availability or doesntExist -->
                            <p id="availability_statut">
                                @if($exemplaire >= 5)
                                    <span id="availability_value" class="label label-success">{{$exemplaire}} {{ Lang::get('show.stock') }}</span>
                                @elseif($exemplaire == 5)
                                    <span id="availability_value" class="label label-warning">{{$exemplaire}} {{ Lang::get('show.stock') }}</span>
                                @elseif($exemplaire <= 3)
                                    <span id="availability_value" class="label label-danger">{{$exemplaire}} {{ Lang::get('show.stock') }}</span>
                                @elseif($exemplaire == 0)
                                    <span id="availability_value" class="label label-danger">{{ Lang::get('show.indi') }}</span>
                                @endif
                            </p>
                            <!-- Out of stock hook -->
                            <div id="oosHook" style="display: none;">

                            </div>
                        </div>
                        <!-- end center infos-->
                        <!-- pb-right-column-->
                        <div class="pb-right-column col-xs-12 col-sm-4 col-md-3">
                            <!-- add to cart form-->
                            <!-- hidden datas -->
                            <p class="hidden">
                                <input name="token" value="1f7065c610135e396ad8a05ee4174399" type="hidden">
                                <input name="id_product" value="1" id="product_page_product_id" type="hidden">
                                <input name="add" value="1" type="hidden">
                                <input name="id_product_attribute" id="idCombination" value="1" type="hidden">
                            </p>
                            <div class="box-info-product">
                                <div class="content_prices clearfix">
                                    <!-- prices -->
                                    <div>
                                        <h2 class="our_price_display" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer"><link itemprop="availability" href="http://schema.org/InStock"><span id="our_price_display" class="price" itemprop="price">{{$montant }} {{Lang::get('menu.devise')}}</span> TTC</h2>
                                    </div> <!-- end prices -->


                                    <div class="clear"></div>
                                </div> <!-- end content_prices -->
                                <!-- Ajout au panier de la quantite du produit -->
                                <div class="product_attributes clearfix">

                                    <!-- quantity wanted -->
                                    <p id="quantity_wanted_p">
                                        {!! Form::open(['route'=>['basket.store', $produit->id], 'method' => 'post']) !!}
                                        <label>{{ Lang::get('show.quantite') }}</label>
                                        {!! Form::text('quantite', '1', array('class'=>'text', 'name'=>'quantite', 'placeholder' => '1')) !!}
                                        <button type="submit" class="btn btn-default button-minus product_quantity_down">{{ Lang::get('show.addPanier') }}</button>
                                        <span class="clearfix"></span>
                                        {!!  Form::close() !!}
                                    </p>
                                    <!-- attributes -->
                                    <div id="attributes">
                                        <div class="clearfix"></div>
                                    </div><br /> <!-- end attributes -->

                                    <h3>{{ Lang::get('show.moyenLT') }}</h3>
                                    @foreach($livreur_info as $liv)
                                        <ul>
                                            <li>{{$liv->livreur->nom}}</li>
                                        </ul>
                                    @endforeach



                                    <h3>{{ Lang::get('show.moyenL') }}</h3>
                                    @foreach($livreur_info as $liv)
                                        @if(!$liv->livreur->logo == NULL)
                                            {!! HTML::image($liv->livreur->logo, '', array('height'=>'45', 'width'=>'105')) !!}
                                        @endif
                                    @endforeach

                                </div> <!-- end product_attributes -->
                            </div> <!-- end box-info-product -->
                        </div> <!-- end pb-right-column-->
                    </div> <!-- end primary_block -->




                    <section class="content faq">
                        <div class="container">
                            <div class="row">
                                <h1 class="title"></h1>
                                <div class="col-lg-12">
                                    <div class="panel-group accordion" id="accordion">
                                        @if($produit_info->langue->label == Lang::get('menu.langactiv'))
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                            <span class="accordian-icon">
                                                                <i class="switch fa fa-plus-circle"></i>
                                                            </span>

                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$produit_info->id}}">
                                                            {{ Lang::get('show.notice') }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse{{$produit_info->id}}" class="panel-collapse collapse">
                                                    <div class="panel-body">{{$produit_info->notice}}</div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                    </section>
                    <!--end wrapper-->






                    @if(Auth::check() == true)
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well well-sm">

                                        {!! Form::open(['route' => ['produit.store'], 'method' => 'post']) !!}
                                        <fieldset>
                                            <legend class="text-center header">{{Lang::get('show.cproduct')}}</legend>


                                            {!! Form::hidden('user_id', Auth::user()->id, array('class'=>'form-control', 'name'=>'user_id')) !!}

                                            {!! Form::hidden('produit_id', $produit->id, array('class'=>'form-control', 'name'=>'produit_id')) !!}



                                            <div class="form-group">
                                                <span class="col-md-2 col-md-offset-2 text-center"><i class="">{{Lang::get('show.name')}}</i></span>
                                                <div class="col-md-8">
                                                    {!! Form::text('nom', '', array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'nom :')) !!}
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <span class="col-md-2 col-md-offset-2 text-center"><i class="">{{Lang::get('show.note')}}</i></span>
                                                <div class="col-md-8">

                                                    {!! Form::select('note', array(
                                                    ''=>'',
                                                    '0'=>'0',
                                                    '1'=>'1',
                                                    '2'=>'2',
                                                    '3'=>'3',
                                                    '4'=>'4',
                                                    '5'=>'5',
                                                    '6'=>'6',
                                                    '7'=>'7',
                                                    '8'=>'8',
                                                    '9'=>'9',
                                                    '10'=>'10')) !!}
                                                </div>
                                            </div>






                                            <div class="form-group">
                                                <span class="col-md-2 col-md-offset-2 text-center"><i class="">{{Lang::get('show.description')}}</i></span>
                                                <div class="col-md-8">
                                                    {!! Form::textarea('description', '', array('class'=>'form-control', 'name'=>'description', 'rows' => '7', 'placeholder' => 'description :')) !!}
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary btn-lg">{{Lang::get('show.submit')}}</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                        {!!  Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    @else

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-md-12 col-md-12 col-md-12">
                                    <div class="box">
                                        <div class="box-icon">
                                            <span class="glyphicon glyphicon-comment"></span>
                                        </div>
                                        <div class="info">
                                            <h4 class="text-center">{{ Lang::get('show.commentaire') }}</h4>
                                            <p>{{ Lang::get('show.infoCommentaire') }}</p>
                                            <a href="{{route('user.account')}}" class="btn">{{ Lang::get('show.connection') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif





                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <h2 class="page-header"></h2>
                                @foreach($commentaire as $row)
                                    <section class="comment-list">
                                        <!-- First Comment -->
                                        <article class="row">
                                            <div class="col-md-2 col-sm-2 hidden-xs">
                                                <section class="image-gallery">
                                                    <figure tabindex="1" contenteditable="true">
                                                        <img src="{{asset($row->user->avatar)}}" class="img-responsive" alt="User Image" contenteditable=false />
                                                        <figcaption class="text-center" contenteditable="false">{{$row->user->nom}}</figcaption>
                                                    </figure>
                                                </section>
                                            </div>
                                            <div class="col-md-10 col-sm-10">
                                                <div class="panel panel-default arrow left">
                                                    <div class="panel-body">
                                                        <header class="text-left">
                                                            <div class="comment-user"><i class="fa fa-text-width"></i>{{$row->nom}}</div>
                                                            <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>{{$row->created_at}}</time>
                                                        </header>
                                                        <div class="comment-post">
                                                            <p>
                                                                {{$row->description}}
                                                            </p>
                                                        </div>
                                                        <p class="text-right"><i class="fa fa-rocket"></i>Note : {{$row->note}}</p>
                                                        <p class="text-right">

                                                            @if(Auth::check() == true)
                                                                @if($row->user_id == Auth::user()->id)
                                                                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#myModal{{$row->id}}"></button>
                                                        @endif
                                                        @else
                                                            <p><i style="font-size: 0.7em">{{ Lang::get('show.prefaceCommentaire') }}</i></p>
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </section>

















                                    <!-- Modal Confirmation de suppression -->
                                    <div class="modal fade" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">{{Lang::get('show.modalC')}} {{$row->nom}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{Lang::get('show.modalT')}} <br />{{$row->description}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger glyphicon glyphicon-trash " href="{{ route('produit.destroy', $row->id) }}"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- Fin Modal -->


                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div><!-- .columns-container -->
<!-- Footer -->
@endsection