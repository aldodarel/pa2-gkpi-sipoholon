<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Tata Ibadah')
@section('page_name', 'Data Tata Ibadah')

@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
@section('content')
    @include('components.createtata')
    @include('sweetalert::alert')
@endsection
