
<?php
    $navbars = StaticVariable::$navbarBendahara;
?>

@extends('layouts.home2')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Login')
@section('page_name', "Data Keluarga")
@section('content')
    @include("components.formkeluargatatausaha")
@endsection