<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')
@section('page_name', 'Renungan Harian')

@section('title', 'Renungan Harian')
@section('content')
    @include('components.editrenungan')
    @include('sweetalert::alert')
@endsection
