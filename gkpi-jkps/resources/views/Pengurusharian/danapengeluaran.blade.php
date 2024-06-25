<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')
@section('style', asset('css/style/pendeta.css'))
@section('title', 'Dana Pengeluaran')
@section('page_name', 'Dana Pengeluaran')
@section('navbar_content')

@endsection
@section('content')
    @include('components.danapengeluaran')
    @include('sweetalert::alert')
@endsection