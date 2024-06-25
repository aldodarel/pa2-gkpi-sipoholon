<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')
@section('title', 'sektor')
@section('page_name', 'Sektor')
@section('content')
    @include('components.sektorshowanggota')
    @include('sweetalert::alert')
@endsection
