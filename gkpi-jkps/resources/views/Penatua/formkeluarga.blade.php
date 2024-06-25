<?php
    $navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keluarga')
@section('page_name', "Data Keluarga")
@section('content')
    @include("components.formkeluarga")
    @include('sweetalert::alert')
@endsection