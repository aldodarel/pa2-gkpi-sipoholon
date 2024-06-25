<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Kelola Persembahan Khusus Aktif')
@section('page_name', 'Kelola Persembahan Khusus Aktif')
@section('navbar_content')

@endsection
@section('content')
    @include('components.dataPengeluaranpersembahankhusus')
    @include('sweetalert::alert')
@endsection
