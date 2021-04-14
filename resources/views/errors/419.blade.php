@extends('layout')

@section('title','Session Expired')
@section('content')
	<h1>Lo sentimos, su sesion ha expirado ingresa nuevamente!</h1>
	@include('auth/login');
@endsection