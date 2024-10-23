@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="col">
                        <h4 class="card-title">Data Siswa</h4>
                        <span>Penampilan Data Siswa</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Kelompok</th>
                                <th>Kelas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jamaah as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="width: 100px"><img src="{{ asset('assets/img/foto/' . $data->foto) }}" alt=""
                                        width="100"></td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tgllahir)->age }} tahun</td>
                                <td>{{ $data->kelompok }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>
                                    @if ($data->status == 1)
                                    {{ 'Belum Menikah' }}
                                    @elseif ($data->status == 2)
                                    {{ 'Menikah' }}
                                    @elseif ($data->status == 3)
                                    {{ 'Janda' }}
                                    @elseif ($data->status == 4)
                                    {{ 'Duda' }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection