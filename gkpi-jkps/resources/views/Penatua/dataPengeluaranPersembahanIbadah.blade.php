<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Kelola Persembahan Ibadah')
@section('page_name', 'Kelola Persembahan Ibadah')
@section('navbar_content')

@endsection
@section('content')
    @include('components.dataPengeluaranPersembahanIbadah')
    @include('sweetalert::alert')
@endsection
