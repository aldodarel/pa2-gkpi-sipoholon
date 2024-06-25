<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')
@section('page_name', 'Sektor')

@section('title', 'Sektor')
@section('content')
    @include('components.editsektor')
    @include('sweetalert::alert')
@endsection
