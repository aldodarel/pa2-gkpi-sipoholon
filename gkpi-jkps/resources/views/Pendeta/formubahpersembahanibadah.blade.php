<?php
    $navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', "Ubah Data Persembahan Ibadah")
@section('content')
    @include("components.formubahpersembahanibadah")
    @include('sweetalert::alert')
@endsection