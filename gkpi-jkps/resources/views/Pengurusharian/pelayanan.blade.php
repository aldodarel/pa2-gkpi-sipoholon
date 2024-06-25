<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')
@section('title', 'pelayanan')
@section('page_name', 'Pelayanan')
@section('content')
    @include('components.pelayanan')
    @include('sweetalert::alert')
@endsection
