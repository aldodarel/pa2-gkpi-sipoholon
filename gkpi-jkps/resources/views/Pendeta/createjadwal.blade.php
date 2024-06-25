<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Jadwal Ibadah')
@section('page_name', 'Data Jadwal Ibadah')
@section('navbar_content')

@endsection
@section('content')
    @include('components.createjadwal')
    @include('sweetalert::alert')
@endsection
