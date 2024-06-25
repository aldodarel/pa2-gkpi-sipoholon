<?php
$navbars = StaticVariable::$navbarPenatua;
?>
@extends('layouts.home5')

@section('title', 'Profile')
@section('page_name', 'Profile')
@section('content')
    @include('components.profile')
@endsection
