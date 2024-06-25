<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) {{ route('pengurusharian.jadwal') }} 
            @elseif ($navbars == StaticVariable::$navbarPendeta) 
                {{ route('pendeta.jadwal') }} @elseif ($navbars == StaticVariable::$navbarPenatua) 
                {{ route('penatua.jadwal') }} @endif"
                    class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> <!-- Ikon dari Font Awesome -->
                    <span>Kembali</span>
</a>
<br></br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var selectedOptions = {};

        $("select").each(function() {
            var selectId = $(this).attr('id');
            var selectedValue = $(this).val();
            if (selectedValue) {
                selectedOptions[selectId] = selectedValue;
                $("select").not(this).find("option[value='" + selectedValue + "']").prop('disabled', true).hide();
            }
        });

        $("select").change(function() {
            var selectId = $(this).attr('id');
            var selectedValue = $(this).val();

            if (selectedOptions[selectId]) {
                var previousValue = selectedOptions[selectId];
                $("select").not(this).find("option[value='" + previousValue + "']").prop('disabled', false).show();
            }

            selectedOptions[selectId] = selectedValue;
            $("select").not(this).find("option[value='" + selectedValue + "']").prop('disabled', true).hide();
        });
    });
</script>

<div class="row">
    <div class="col-md">
        <div class="header-body text-left mt-2 mb-4">
            <div class="row justify-content">
                <div class="row col-lg-12 col-md-4 border-bottom">
                    <div class="col">
                        <h2 class="">Ubah Jadwal Pelayanan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 p-3 bg-white shadow rounded">
    <form class="mt-3" action="{{ route('pendeta.updatepelayanan', ['id' => $id_jadwal_ibadah]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @foreach ($status_pelayanan as $status)
                <div class="form-group col-12 col-md-6 mt-3">
                    <label class="form-control-label" for="{{ ucfirst($status) }}">{{ ucfirst($status) }}</label>
                    <select name="id_pelayan[]" id="{{ ucfirst($status) }}" class="form-control">
                        <option value="">Pilih Nama Pelayan</option>
                        @foreach ($results[$status] as $result)
                            <option value="{{ $result['id'] }}" selected>{{ $result->jemaat->name }}</option>
                        @endforeach
                        @foreach ($pelayan_gereja as $item)
                            @php
                                $selectedInResults = false;
                                foreach ($results[$status] as $result) {
                                    if ($result->jemaat->nik == $item['id']) {
                                        $selectedInResults = true;
                                        break;
                                    }
                                }
                            @endphp
                            @if (!$selectedInResults)
                                <option value="{{ $item['id'] }}">{{ $item->jemaat->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error(ucfirst($status))
                        <span class="invalid-feedback font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status_pelayanan[]" value="{{ ucfirst($status) }}">
            @endforeach
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</div>
    