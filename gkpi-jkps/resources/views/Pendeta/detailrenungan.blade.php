<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Detail Renungan')
@section('page_name', 'Detail Renungan')
@section('content')
    @include('components.detailrenungan')
@endsection
