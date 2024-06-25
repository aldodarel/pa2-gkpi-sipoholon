<?php
    $navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', "Ubah Data Keuangan")
@section('content')
    @include("components.formubahkeuangan")
    @include('sweetalert::alert')
@endsection