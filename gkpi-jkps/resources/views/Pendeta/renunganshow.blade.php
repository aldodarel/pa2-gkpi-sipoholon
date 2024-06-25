<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('title', 'renungan')
@section('page_name', 'Renungan Harian')
@section('content')
    @include('components.renunganshow')
    @include('sweetalert::alert')
@endsection
