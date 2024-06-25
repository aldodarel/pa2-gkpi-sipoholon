<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Berita Gereja')
@section('page_name', 'Data Berita Gereja')
@section('navbar_content')

@endsection
@section('content')
    @include('components.createberita')
    @include('sweetalert::alert')
@endsection
