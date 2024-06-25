<?php
    $navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Kas')
@section('page_name', "Data Kas")
@section('content')
    @include("components.formtambahkas")
    @include('sweetalert::alert')
@endsection