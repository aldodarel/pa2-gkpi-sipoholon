<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('title', 'rancangan program kerja')
@section('page_name', 'Program Kerja Pelayanan')
@section('content')
    @include('components.programkerja')
    @include('sweetalert::alert')
@endsection
