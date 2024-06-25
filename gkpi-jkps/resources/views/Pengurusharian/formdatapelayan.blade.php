<?php
    $navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Pelayan')
@section('page_name', "")
@section('content')
    @include("components.formdatapelayan")
    @include('sweetalert::alert')
@endsection