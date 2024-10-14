@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="col">
                        <h4 class="card-title">Data Daerah</h4>
                        <span>Menejemen Data Daerah</span>
                    </div>
                </div>
            </div>
            <div class="card-body h-100">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group d-flex justify-content-center align-items-center gap-3">
                            @foreach ($daerah as $data)
                            <label for="daerah">Nama Daerah : </label>
                            <input type="text" id="daerah" class="form-control w-25" value="{{ $data->nama }}" readonly>
                        </div>
                        <div class="form-group d-flex justify-content-center align-items-center gap-3">
                            <label for="alamat">Alamat Daerah : </label>
                            <input type="text" id="alamat" class="form-control w-25" value="{{ $data->alamat }}"
                                readonly>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-12">
                        {{-- berisi informasi data --}}
                        <div class="rounded-3 p-3" style="background-color: #59cc72">
                            <h5 class="text-white">Informasi</h5>
                            <ol class="text-white">
                                <li>Induk Database PPG ini bermuara ke Data satu Daerah</li>
                                <li>Jika anda melakukan update/perubahan, maka segera konfirmasi ke <strong><u>Pihak Pengurus PPG
                                    Daerah</u></strong> karena header semua pelaporan akan berubah keseluruhan.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection