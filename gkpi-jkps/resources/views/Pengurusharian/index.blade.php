<?php
$navbars = StaticVariable::$navbarPengurusHarian;
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
    <style>
        .card-clickable {
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card-clickable:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
        <div class="col-12">
            <section id="minimal-statistics service">
                <div class="row">
                    <div class="col-md">
                        <div class="header-body text-left mt-0 mb-4">
                            <div class="row justify-content">
                                <div class="row col-lg-12 col-md-4 border-bottom">
                                    <div class="col-9">
                                        <h2 class="text">Statistik Gereja</h2>
                                        <p class="tex">Statistik jemaat untuk mempermudah anda mengetahui informasi seputar jemaat.</p>
                                    </div>
                                    <div class="col-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($datakeluargas as $datumkeluarga)
                        <div class="col-xl-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow card-clickable" data-url="{{ route('pengurusharian.detailstatistik', ['name' => urlencode($datumkeluarga['name'])]) }}">
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
        <div class="col-12 shadow-sm rounded mt-2 bg-white p-3">
            <div id="chartDesa"></div>
        </div>
@endsection
@section('grafik')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartDesa', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<b>Data Statistik Jumlah Keluarga Setiap Sektor</b>'
        },
        xAxis: {
            categories: {!! json_encode($categories) !!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<b>Jumlah Keluarga</b>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: '<b>Sektor Keluarga</b>',
            data: {!! json_encode($dataSeries) !!}
        }]
    });

    document.addEventListener('DOMContentLoaded', function () {
        var cards = document.querySelectorAll('.card-clickable');
        cards.forEach(function (card) {
            card.addEventListener('click', function () {
                var url = card.getAttribute('data-url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    });
</script>
@endsection
