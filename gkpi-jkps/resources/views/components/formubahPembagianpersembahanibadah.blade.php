<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.dataPembagianPersembahanIbadah') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.dataPembagianPersembahanIbadah') }} @endif"
                    class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> <!-- Ikon dari Font Awesome -->
                    <span>Kembali</span>
</a>
<br></br>
<?php
$header_title = 'Form Kas Gereja';
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    <form class="mt-3" action="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.updatePembagianpersembahanibadah',['id_user' => StaticVariable::$user->nik, 'id'=>  $keuangan->id]) }} @elseif($navbars == StaticVariable::$navbarPendeta) {{ route('pendeta.updatePembagianpersembahanibadah',['id_user' => StaticVariable::$user->nik, 'id'=>  $keuangan->id]) }} @endif" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-6 mt-3">
                <label for="nama_kas">Nama Kas</label>
                <input type="text" class="form-control" name="nama_kas" id="nama_kas" value="{{ $keuangan->nama_kas }}" required>
            </div>
        </div>
        <div class="col-12 mt-5">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
