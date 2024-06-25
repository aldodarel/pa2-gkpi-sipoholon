<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')


@section('style', asset('css/style/pendeta.css'))
@section('title', 'Home')

@section('navbar_content')
    <div class="col-4 ms-auto">
        <input type="text" class="form-control" name="" id="">
    </div>
@endsection
@section('content')
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    <div class="col-12 mt-5 p-3">
        <div class="col-12">
            <section id="minimal-statistics service">
            <div class="row">
                <div class="row">
                    <div class="col-md">
                        <div class="header-body text-left mt-0 mb-4">
                            <div class="row justify-content">
                                <div class="row col-lg-12 col-md-4 border-bottom">
                                    <div class="col-9">
                                        <h2 class="text">Statistik Gereja</h2>
                                        <p class="tex">Statistik jemaat untuk mempermudah anda mengetahui informasi
                                            seputar jemaat.</p>
                                    </div>
                                    <div class="col-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($datakeluargas as $datumkeluarga)
                            <div class="col-xl-4 col-md-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="d-flex flex-row">
                                                <div>
                                                    <h4>{{ $datumkeluarga['name'] }}</h4>
                                                    <h5 class="mb-0">{{ $datumkeluarga['jumlah'] }}</h5>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="{{ $datumkeluarga['icon'] }}"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
            </div>
        </section>
        </div>
    </div>
@endsection
