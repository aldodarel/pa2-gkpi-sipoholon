<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Jadwal Pelayanan')
@section('page_name', 'Data Jadwal Pelayanan')
@section('navbar_content')

@endsection
@section('content')
    @include('components.createpelayanan')
    @include('sweetalert::alert')
@endsection
