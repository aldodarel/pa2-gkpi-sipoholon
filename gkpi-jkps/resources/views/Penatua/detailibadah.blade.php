<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tata Ibadah')
@section('page_name', 'Tata Ibadah')
@section('content')
    @include('components.detailibadah')
    @include('sweetalert::alert')
@endsection
