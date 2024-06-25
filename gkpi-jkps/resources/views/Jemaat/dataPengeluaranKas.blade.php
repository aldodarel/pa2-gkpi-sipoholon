<?php
$navbars = StaticVariable::$navbarJemaat;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Kelola Kas Gereja')
@section('page_name', 'Kelola Kas Gereja')
@section('navbar_content')

@endsection
@section('content')
    @include('components.dataPengeluaranKas')
    @include('sweetalert::alert')
@endsection
