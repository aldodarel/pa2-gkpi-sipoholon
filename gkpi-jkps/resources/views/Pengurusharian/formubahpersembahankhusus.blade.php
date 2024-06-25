<?php
    $navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', "Ubah Data Persembahan Khusus")
@section('content')
    @include("components.formubahpersembahankhusus")
    @include('sweetalert::alert')
@endsection