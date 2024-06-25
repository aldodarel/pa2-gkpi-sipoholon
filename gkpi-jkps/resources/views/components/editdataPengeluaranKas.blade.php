<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@if ($navbars == StaticVariable::$navbarPengurusHarian)
                    <a href="{{$pengeluaran->first()->jenis_keuangan == 'Pemasukan' ? route('pengurusharian.pemasukankas') : route('pengurusharian.pengeluarankas') }}"
                        class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                @elseif ($navbars == StaticVariable::$navbarPendeta)
                    <a href="{{ $pengeluaran->first()->jenis_keuangan == 'Pemasukan' ? route('pendeta.pemasukankas') : route('pendeta.pengeluarankas') }}"
                        class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                @endif
                <br></br>
<?php
$header_title = 'Form Ubah Data Keuangan';
?>
<div class="col-12 p-3 bg-white shadow rounded">
    @include('components.headerform')
    {{-- TODO: Controller not ready yet --}}
    @foreach ($pengeluaran as $datakeuangan)
        <form class="mt-3"
            action=""
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12 col-md-6 mt-3">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <!-- Tambahkan opsi dari nama kas -->
                        @foreach ($kas as $item)
                            @php
                                $kasKeuangan = $datakeuangan->kasKeuangan->first(); // Ambil kasKeuangan pertama
                                $isSelected = $kasKeuangan && $kasKeuangan->id_kas == $item->id; // Periksa apakah id_kas cocok dengan item->id
                            @endphp
                            <option 
                                value="{{ $item->id }}" 
                                class="kas-option" 
                                @if($isSelected) 
                                    selected 
                                @endif
                            >
                                {{ $item->nama_kas }}
                            </option>
                        @endforeach
                    </select>
                </div>                
                
                        <div class="form-group col-12 col-md-6 mt-3" id="keteranganTextInput">
                            <label for="keterangan" id="label_keterangan">Keterangan</label>
                            <input type="text" name="keterangan" id="textKeterangan" class="form-control" value="{{ $datakeuangan->keterangan }}" required>
                        </div>
                <div class="form-group col-12 col-md-6 mt-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                    value="{{ $datakeuangan->tanggal }}" max="{{ date('Y-m-d') }}" required>
                </div>
                <div class="form-group col-12 col-md-6 mt-3">
                    <label for="nominal">Nominal(Rp)</label>
                    <input type="number" name="nominal" id="nominal" class="form-control"
                        value="{{ $datakeuangan->nominal }}" required>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-5">
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>
        </form>
    @endforeach
</div>
<script>
    // Memastikan input tidak bernilai minus atau nol
    document.getElementById("nominal").addEventListener("input", function() {
        var nominalInput = document.getElementById("nominal");
        if (nominalInput.value <= 0) {
            nominalInput.value = ""; // Mengosongkan nilai input jika kurang dari atau sama dengan nol
        }
    });
</script>
