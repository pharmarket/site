@extends('front.layout.app')

@section('header')
    <!-- Custom CSS -->
    <link href="{{ asset('front/css/produit.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/categories.css') }}" rel="stylesheet" type="text/css" />

@stop

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    @foreach($produit_categorie as $row)
                        @if($row->langue->label == Lang::get('menu.langactiv'))
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$row->id}}"><span class="">
                            </span>{{$row->nom}}</a>
                                </h4>
                            </div>

                            <div id="collapse{{$row->id}}" class="panel-collapse collapse out">
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                @foreach($row->sous_categorie as $sc)
                                                    @if($sc->langue->label == Lang::get('menu.langactiv'))
                                                        <p><a class="" href="{{route('produit.callCategorie', $sc->id)}}">{{$sc->nom}}</a></p>
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>









        <div class="col-md-9">
            <div class="row">
                <!-- Plans -->
                <section id="plans">

                    @foreach($produit as $row)
                        @foreach ($row->info as $value)
                            @if($value->langue->label == Lang::get('menu.langactiv'))

                                <!-- item -->
                                <div class="col-md-4 text-center">
                                    <div class="panel panel-warning panel-pricing">
                                        <div class="panel-heading">
                                            <i class=""><a class="" href="{{ route('produit.show', $row->id) }}">{!! HTML::image($row->media[0]->chemin . $row->media[0]->nom, '', array('height'=>'200', 'width' => '200')) !!}</a></i>
                                            <h3>

                                                {{$value->nom}}
                                            </h3>
                                        </div>
                                        <div class="panel-body text-center">
                                            <p><strong>{{$row->montant}} {{ Lang::get('menu.devise') }}</strong></p>
                                        </div>
                                        <ul class="list-group text-center">
                                            <li class="list-group-item"><i class=""></i>{{ $row->reference  }}</li>
                                            <li class="list-group-item"><i class=""></i>{{ $row->marque->nom }}</li>
                                            <li class="list-group-item"><i class=""></i>
                                                <div class="minHeight">
                                                    <div class="minHeight">
                                                        @foreach ($row->info as $value)
                                                            @if($value->langue->label == Lang::get('menu.langactiv'))
                                                                {!!mb_strimwidth($value->description, 0, 150, "...")!!}
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="panel-footer">
                                            <a class="btn btn-lg btn-block btn-warning fa fa-shopping-cart" href="{{ route('produit.show', $row->id) }}"></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /item -->

                            @endif
                        @endforeach

                    @endforeach
                </section>


            </div>


            <div class="row">
                {!!$product->render()!!}
            </div>

        </div>
    </div>


@stop

@section('footer')
@stop