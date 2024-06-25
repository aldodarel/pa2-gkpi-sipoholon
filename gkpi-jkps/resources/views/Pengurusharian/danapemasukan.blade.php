<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Dana Pemasukan')
@section('page_name', 'Data Dana Pemasukan')
@section('navbar_content')

@endsection
@section('content')
    @include('components.danapemasukan')
    @include('sweetalert::alert')
@endsection