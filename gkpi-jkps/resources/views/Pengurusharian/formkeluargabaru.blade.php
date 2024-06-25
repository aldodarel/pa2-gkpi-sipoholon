<?php
    $navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Data Keluarga Baru')
@section('page_name', "Data Keluarga Baru")
@section('content')
    @include("components.formkeluargabaru")
@endsection