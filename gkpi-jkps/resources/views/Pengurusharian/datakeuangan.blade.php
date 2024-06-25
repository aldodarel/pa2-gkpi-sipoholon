<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Kelola Persembahan Umum Aktif')
@section('page_name', 'Kelola Persembahan Umum Aktif')
@section('navbar_content')

@endsection
@section('content')
    @include('components.datakeuangan')
    @include('sweetalert::alert')
@endsection
