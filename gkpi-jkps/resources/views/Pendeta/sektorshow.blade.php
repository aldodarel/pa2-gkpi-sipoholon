<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('title', 'sektor')
@section('page_name', 'Data Sektor')
@section('content')
    @include('components.sektorshow')
    @include('sweetalert::alert')
@endsection
