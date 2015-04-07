
@extends('front.layout.app')
@extends('front.layout.menu')
@section('content')

Click here to reset your password: {{ url('password/reset/'.$token) }}
@endsection
