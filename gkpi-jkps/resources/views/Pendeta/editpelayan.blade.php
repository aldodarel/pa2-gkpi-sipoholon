<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Edit Pelayan')
@section('page_name', 'Edit Pelayan')
@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
    @include('components.editdatapelayan')
    @include('sweetalert::alert')
@endsection
