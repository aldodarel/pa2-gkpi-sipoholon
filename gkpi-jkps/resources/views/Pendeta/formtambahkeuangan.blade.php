<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', "Data Keuangan")
@section('content')
    @include("components.formtambahkeuangan")
    @include('sweetalert::alert')
@endsection