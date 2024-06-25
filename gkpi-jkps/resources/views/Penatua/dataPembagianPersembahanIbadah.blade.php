<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Kelola Persembahan Umum')
@section('page_name', 'Kelola Persembahan Umum')
@section('navbar_content')

@endsection
@section('content')
    @include('components.dataPembagianPersembahanIbadah')
    @include('sweetalert::alert')
@endsection
