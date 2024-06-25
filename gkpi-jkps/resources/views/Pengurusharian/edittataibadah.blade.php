<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tata Ibadah')
@section('page_name', 'Tata Ibadah')

@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>s
@endsection
@section('content')
    @include('components.edittataibadah')
    @include('sweetalert::alert')
@endsection
