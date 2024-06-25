<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('page_name', 'Detail Pembagian Persembahan Ibadah')
@section('content')
    @include('components.detailpembagianpersembahanibadah')
@endsection
