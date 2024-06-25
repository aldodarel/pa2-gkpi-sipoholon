@extends('layouts.navbar')

@section('navbar')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center"
                style="
          background-image: url('assets/img/1200px-GKPI_Jemaat_Khusus_Pasar_Sipoholon.jpg');
        ">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Struktur Organisasi</h2>
                            <p>
                                Berikut adalah struktur organisasi di Gereja Jemaat Khusus Pasar Sipoholon yang dapat dilihat oleh publik. Strukur ini dirancang untuk memastikan bahwa gereja beroperasi dengan efisien dan teratur, serta untuk mendukung pertumbuhan rohani dan pelayanan jemaat.    
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ route('home.index') }}">Home</a></li>
                        <li>Struktur Organisasi</li>
                    </ol>
                </div>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Pricing Section ======= -->
        <section>
            <div class="container" data-aos="fade-up">
                <div class="section-header content">
                    <h2>Susunan Pengurus Harian / Majelis GKPI Jemaat Khusus Pasar Sipoholon</h2>
                </div>
                <table class="table table-bordered table-hover">
                    <tbody>
                        {{-- @foreach ($pelayan as $pelayan)
                            <tr>
                                <td>{{ $pelayan['nik'] }}</td>
                                <td>{{ $pelayan->jemaat->name }}</td>
                            <tr>
                        @endforeach --}}
                        <th colspan="2" class="table-active">
                            I. Pengurus Harian Jemaat
                        </th>
                        </tr>
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Pendeta')
                                <tr>
                                    <td style="font-weight: 600">Pendeta / Pemimpin Jemaat</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Sekretaris')
                                <tr>
                                    <td  style="font-weight: 600">Sekretaris Jemaat</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Bendahara')
                                <tr>
                                    <td  style="font-weight: 600">Bendahara Jemaat</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <th colspan="2" class="table-active">II. Ketua Seksi</th>
                        </tr>
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Seksi Pelayanan Rohani')
                                <tr>
                                    <td  style="font-weight: 600">Seksi Pelayanan Rohani</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Seksi Pekabaran Injil')
                                <tr>
                                    <td  style="font-weight: 600">Seksi Pekabaran Injil</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Seksi Diakoni Sosial')
                                <tr>
                                    <td  style="font-weight: 600">Seksi Diakoni Sosial</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Seksi Musik/Nyanyian/Koor')
                                <tr>
                                    <td  style="font-weight: 600">Seksi Musik/Nyanyian/Koor</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Seksi Sekolah Minggu')
                                <tr>
                                    <td style="font-weight: 600">Seksi Sekolah Minggu</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                        @if ($item['peran'] == 'Seksi Remaja')
                            <tr>
                                <td style="font-weight: 600">Seksi Remaja</td>
                                <td>{{ $item->jemaat->name }}</td>
                            </tr>
                        @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Seksi Pemuda/i (PP)')
                                <tr>
                                    <td  style="font-weight: 600">Seksi Pemuda/i (PP)</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                        @if ($item['peran'] == 'Seksi Perempuan')
                            <tr>
                                <td  style="font-weight: 600">Seksi Perempuan</td>
                                <td>{{ $item->jemaat->name }}</td>
                            </tr>
                        @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                        @if ($item['peran'] == 'Seksi Pria')
                            <tr>
                                <td  style="font-weight: 600">Seksi Pria</td>
                                <td>{{ $item->jemaat->name }}</td>
                            </tr>
                        @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                        @if ($item['peran'] == 'Seksi Lansia')
                            <tr>
                                <td  style="font-weight: 600">Seksi Lansia</td>
                                <td>{{ $item->jemaat->name }}</td>
                            </tr>
                        @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                        @if ($item['peran'] == 'Seksi Kesehatan')
                            <tr>
                                <td  style="font-weight: 600">Seksi Kesehatan</td>
                                <td>{{ $item->jemaat->name }}</td>
                            </tr>
                        @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                        @if ($item['peran'] == 'Seksi Pendidikan')
                            <tr>
                                <td  style="font-weight: 600">Seksi Pendidikan</td>
                                <td>{{ $item->jemaat->name }}</td>
                            </tr>
                        @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                        @if ($item['peran'] == 'Seksi Sarana dan Prasarana')
                            <tr>
                                <td  style="font-weight: 600">Seksi Sarana dan Prasarana</td>
                                <td>{{ $item->jemaat->name }}</td>
                            </tr>
                        @endif
                        @endforeach
                        @foreach ($pelayan as $item)
                        @if ($item['peran'] == 'Seksi Usaha/Pengembangan Sumber Daya')
                            <tr>
                                <td  style="font-weight: 600">Seksi Usaha/Pengembangan Sumber Daya</td>
                                <td>{{ $item->jemaat->name }}</td>
                            </tr>
                        @endif
                        @endforeach
                        <tr>
                            <th colspan="2" class="table-active">III. Penasehat Jemaat</th>
                        </tr>
                        @php
                            $countPenasihat = 0;
                        @endphp
                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Penasehat Jemaat')
                                <tr>
                                    <td style="font-weight: 600">Penasehat Jemaat {{ toRoman($countPenasihat + 1) }}</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                                @php
                                    $countPenasihat++;
                                @endphp
                            @endif
                        @endforeach
                        <tr>
                            <th colspan="2" class="table-active">
                                IV. Pengawas Harta Benda/Keuangan
                            </th>
                        </tr>
                        @php
                            $countPengawas = 0;
                        @endphp

                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Pengawas Harta Benda')
                                <tr>
                                    <td style="font-weight: 600">Pengawas Harta Benda {{ toRoman($countPengawas + 1) }}</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                                @php
                                    $countPengawas++;
                                @endphp
                            @endif
                        @endforeach
                        <tr>
                            <th colspan="2" class="table-active">
                                V. Penatua yang Aktif
                            </th>
                        </tr>
                        @php
                            $countPenatua = 0;
                        @endphp

                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Penatua Aktif')
                                <tr>
                                    <td style="font-weight: 600">Penatua Aktif {{ toRoman($countPenatua + 1) }}</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                                @php
                                    $countPenatua++;
                                @endphp
                            @endif
                        @endforeach
                        <tr>
                            <th colspan="2" class="table-active">
                                V. Calon Penatua yang Aktif
                            </th>
                        </tr>
                        @php
                            $countCalonPenatua = 0;
                        @endphp

                        @foreach ($pelayan as $item)
                            @if ($item['peran'] == 'Calon Penatua Aktif')
                                <tr>
                                    <td style="font-weight: 600">Calon Penatua Aktif {{ toRoman($countCalonPenatua + 1) }}</td>
                                    <td>{{ $item->jemaat->name }}</td>
                                </tr>
                                @php
                                    $countCalonPenatua++;
                                @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <!-- End Pricing Section -->
    </main>
    <!-- End #main -->
@endsection
