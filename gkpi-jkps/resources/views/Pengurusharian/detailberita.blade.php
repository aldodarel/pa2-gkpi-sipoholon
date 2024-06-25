<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Detail Berita')
@section('page_name', 'Detail Berita')
@section('content')
    @include('components.detailberita')
    @include('sweetalert::alert')
@endsection
