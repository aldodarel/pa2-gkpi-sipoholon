<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Renungan Harian')
@section('page_name', 'Data Renungan Harian')
@section('navbar_content')

@endsection
@section('content')
    @include('components.createrenungan')
    @include('sweetalert::alert')
@endsection
