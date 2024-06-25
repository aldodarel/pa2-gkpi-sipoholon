<?php
    $navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', "Ubah Persentase Kas")
@section('content')
    @include("components.formubahPersentase")
    @include('sweetalert::alert')
@endsection