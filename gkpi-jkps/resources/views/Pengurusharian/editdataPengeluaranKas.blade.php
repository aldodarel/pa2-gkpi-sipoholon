<?php
    $navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keuangan')
@section('page_name', "Ubah Data Kas Gereja")
@section('content')
    @include("components.editdataPengeluaranKas")
    @include('sweetalert::alert')
@endsection