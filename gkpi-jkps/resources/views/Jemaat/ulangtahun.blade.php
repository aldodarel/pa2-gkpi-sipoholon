<?php
$navbars = StaticVariable::$navbarJemaat;
?>
@extends('layouts.home5')
@section('title', 'Jemaat Berulang Tahun')
@section('page_name', 'Jemaat Berulang Tahun')
@section('content')
    @include('components.ulangtahun')
    @include('sweetalert::alert')
@endsection
