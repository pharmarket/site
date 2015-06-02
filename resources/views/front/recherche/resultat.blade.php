@extends('front.layout.app')

@section('header')
    <!-- Custom CSS -->
    <link href="{{ asset('front/css/produit.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/recherche.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1 bloc">
            <div class="row">
                <!-- Plans -->
                <section id="plans">
                    @foreach($produits as $row)
                        @if($row->label == Lang::get('menu.langactiv'))
                            <div class="col-md-3 text-center">
                                <div class="panel panel-warning panel-pricing">
                                        <a class="" href="{{route('produit.show', $row->idProduit)}}">
                                    <div class="panel-heading">
                                        <h3>
                                            <i class="">{!! HTML::image($row->chemin , '', array('height'=>'200', 'width' => '200')) !!}</i>
                                            <h3>{{$row->nom}}</h3>
                                        </h3>
                                    </div>
                                    <div class="panel-body text-center">
                                        <p><strong>{{$row->montant}} {{ Lang::get('menu.devise') }}</strong></p>
                                    </div>
                                    <ul class="list-group text-center">
                                        <li class="list-group-item"><i class=""></i>{{ $row->reference  }}</li>
                                        <li class="list-group-item"><i class=""></i>{{ $row->marqueProduit }}</li>
                                        <li class="list-group-item"><i class=""></i>{{ $row->categorieProduit }} / {{ $row->sousCategorieProduit }} </li>
                                        <li class="list-group-item"><i class=""></i>
                                            <div class="minHeight">
                                                <div class="minHeight">
                                                    @if($row->label == Lang::get('menu.langactiv'))
                                                        {!!mb_strimwidth($row->description, 0, 150, "...")!!}
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </section>
            </div>
        <div class="row">
                {!!$produits->render()!!}
        </div>
        </div>
    </div>
@stop

@section('footer')
@stop
