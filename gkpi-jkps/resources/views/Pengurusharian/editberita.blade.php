<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Berita Gereja')
@section('page_name', 'Data Berita Gereja')
@section('content')
    @include('components.editberita')
    @include('sweetalert::alert')
@endsection
