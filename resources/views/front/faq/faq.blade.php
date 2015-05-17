
@extends('front.layout.app')
@section('content')

@section('header')
    <link href="{{ asset('front/css/faq.css') }}" rel="stylesheet" type="text/css" />

@stop


    <section class="content faq">
        <div class="container">
            <div class="row">
                <h1 class="title">FAQ</h1>
                <div class="col-lg-12">
                    <div class="panel-group accordion" id="accordion">
                        @foreach($faq as $row)
                            @if($row->langue->label == Lang::get('menu.langactiv'))

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                                <span class="accordian-icon">
                                                    <i class="switch fa fa-plus-circle"></i>
                                                </span>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$row->id}}">
                                                {!! $row->question !!}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$row->id}}" class="panel-collapse collapse">
                                        <div class="panel-body">{!! $row->answer !!}</div>
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    </div>
                </div>

                <!--Sidebar Widget-->
                <div class="col-lg-4">
                    <div class="sidebar">
                    </div>
                </div>

                <div class="widget widget_tag">
                </div>

                <div class="widget widget_archives">
                </div>
            </div>
        </div>
    </section>

    </section>
    <!--end wrapper-->


@stop
