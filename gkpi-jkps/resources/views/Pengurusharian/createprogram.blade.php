<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Program Kerja Pelayanan')
@section('page_name', 'Data Program Kerja Pelayanan')
@section('navbar_content')

@endsection
@section('content')
    @include('components.createprogram')
    @include('sweetalert::alert')
@endsection
