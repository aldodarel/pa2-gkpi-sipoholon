<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Sektor')
@section('page_name', 'Data Sektor')
@section('navbar_content')

@endsection
@section('content')
    @include('components.createsektor')
    @include('sweetalert::alert')
@endsection
