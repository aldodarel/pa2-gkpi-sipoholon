<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')
@section('title', 'Program Kerja Pelayanan')
@section('page_name', 'Program Kerja Pelayanan')
@section('content')
    @include('components.editprogram')
    @include('sweetalert::alert')
@endsection
