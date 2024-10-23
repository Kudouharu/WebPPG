@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="col">
                        <h4 class="card-title">Data Jamaah</h4>
                        <span>Penginputan Data Jamaah</span>
                    </div>
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                        data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah
                    </button>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">Input Data Jamaah</span>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/jamaah') }}" method="POST" id="addRowForm"
                                    class="addRowForm row g-3" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    placeholder="* isi Nama Lengkap" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="username">Nama Panggilan</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    placeholder="* isi Nama Panggilan" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="tgllahir">Tanggal Lahir</label>
                                                <input type="text" class="form-control" id="datepicker" name="tgllahir"
                                                    placeholder="* isi Tanggal Lahir" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="1">Laki-Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="ortu">Orang Tua</label>
                                                <select name="ortu" id="ortu" class="form-control">
                                                    <option value="" selected disabled>Pilih Orang Tua</option>
                                                    @foreach ($orangtua as $ortu)
                                                    <option value="{{ $ortu->id }}">{{ $ortu->nama_bapak }} - {{
                                                        $ortu->nama_ibu }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <select name="pekerjaan" id="pekerjaan" class="form-control">
                                                    <option value="" selected disabled>Pilih Pekerjaan</option>
                                                    @foreach ($pekerjaan as $pkj)
                                                    <option value="{{ $pkj->id }}">{{ $pkj->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <select name="kelas" id="kelas" class="form-control">
                                                    <option value="" selected disabled>Pilih Kelas</option>
                                                    @foreach ($kelas as $kls)
                                                    <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="" selected disabled>Pilih Status</option>
                                                    <option value="1">Belum Menikah</option>
                                                    <option value="2">Menikah</option>
                                                    <option value="3">Janda</option>
                                                    <option value="4">Duda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <div class="input-group-text d-flex gap-3 mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value="1"
                                                        name="mubalight" aria-label="Checkbox for following text input">
                                                    <span>Mubalight / Mubalighot</span>
                                                </div>
                                                <div class="input-group-text d-flex gap-3 mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value="1"
                                                        name="haji" aria-label="Checkbox for following text input">
                                                    <span>Haji</span>
                                                </div>
                                                <div class="input-group-text d-flex gap-3 mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value="1"
                                                        name="agniya" aria-label="Checkbox for following text input">
                                                    <span>Agniya</span>
                                                </div>
                                                <div class="input-group-text d-flex gap-3 mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value="1"
                                                        name="duafa" aria-label="Checkbox for following text input">
                                                    <span>Duafa</span>
                                                </div>
                                                <div class="input-group-text d-flex gap-3 mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value="1"
                                                        name="yatim" aria-label="Checkbox for following text input">
                                                    <span>Yatim</span>
                                                </div>
                                                <div class="input-group-text d-flex gap-3 mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value="1"
                                                        name="mahasiswa" aria-label="Checkbox for following text input">
                                                    <span>Mahasiswa</span>
                                                </div>
                                                <div class="input-group-text d-flex gap-3 mb-3">
                                                    <input class="form-check-input mt-0" type="checkbox" value="1"
                                                        name="sarjana" aria-label="Checkbox for following text input">
                                                    <span>Sarjana</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="foto">Foto</label>
                                                <input type="file" class="form-control form-control" name="foto"
                                                    id="foto" accept="image/jpeg, image/png" required />
                                            </div>
                                            <img id="preview" class="img-fluid ms-3 mt-1"
                                                style="display: none; max-width: 100px; max-height: 100px;"
                                                alt="Preview Foto">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" id="addRowButton" class="btn btn-primary">
                                    Add
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"
                                    onclick="closemodal()">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Kelompok</th>
                                <th>Pekerjaan</th>
                                <th>Status</th>
                                <th style="width: 10%">Action</th>
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
                                <td>{{ $data->pekerjaan }}</td>
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
                                <td>
                                    <div class="form-button-action">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $data->id }}" style="padding: 10px"
                                            title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title">
                                                            <span class="fw-mediumbold">Edit Data Jamaah</span>
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/jamaah/edit/'. $data->id) }}"
                                                            method="POST" id="editRowForm{{ $data->id }}"
                                                            class="row g-3" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="nama">Nama Lengkap</label>
                                                                        <input type="text" class="form-control"
                                                                            name="nama" placeholder="* isi Nama Lengkap"
                                                                            value="{{ $data->nama }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="username">Nama Panggilan</label>
                                                                        <input type="text" class="form-control"
                                                                            name="username"
                                                                            placeholder="* isi Nama Panggilan"
                                                                            value="{{ $data->username }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="tgllahir">Tanggal Lahir</label>
                                                                        <input type="text" class="form-control"
                                                                            id="datepicker1" name="tgllahir"
                                                                            placeholder="* isi Tanggal Lahir"
                                                                            value="{{ $data->tgllahir }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="gender">Jenis Kelamin</label>
                                                                        <select name="gender" id="gender"
                                                                            class="form-control">
                                                                            <option value="" selected disabled>Pilih
                                                                                Jenis Kelamin</option>
                                                                            <option value="1" @if($data->gender == 1)
                                                                                selected @endif>Laki-Laki</option>
                                                                            <option value="2" @if($data->gender == 2)
                                                                                selected @endif>Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="ortu">Orang Tua</label>
                                                                        <select name="ortu" id="ortu"
                                                                            class="form-control">
                                                                            <option value="" selected disabled>Pilih
                                                                                Orang Tua</option>
                                                                            @foreach ($orangtua as $ortu)
                                                                            <option value="{{ $ortu->id }}" @if($data->
                                                                                id_orangtua == $ortu->id) selected
                                                                                @endif>{{ $ortu->nama_bapak }} - {{
                                                                                $ortu->nama_ibu }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="pekerjaan">Pekerjaan</label>
                                                                        <select name="pekerjaan" id="pekerjaan"
                                                                            class="form-control">
                                                                            <option value="" selected disabled>Pilih
                                                                                Pekerjaan</option>
                                                                            @foreach ($pekerjaan as $pkj)
                                                                            <option value="{{ $pkj->id }}" @if($data->
                                                                                id_pekerjaan == $pkj->id) selected
                                                                                @endif>{{ $pkj->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="kelas">Kelas</label>
                                                                        <select name="kelas" id="kelas"
                                                                            class="form-control">
                                                                            <option value="" selected disabled>Pilih
                                                                                Kelas</option>
                                                                            @foreach ($kelas as $kls)
                                                                            <option value="{{ $kls->id }}" @if($data->
                                                                                id_kelas == $kls->id) selected @endif>{{
                                                                                $kls->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" id="status"
                                                                            class="form-control">
                                                                            <option value="" selected disabled>Pilih
                                                                                Status</option>
                                                                            <option value="1" @if($data->status == 1)
                                                                                selected @endif>Belum Menikah</option>
                                                                            <option value="2" @if($data->status == 2)
                                                                                selected @endif>Menikah</option>
                                                                            <option value="3" @if($data->status == 3)
                                                                                selected @endif>Janda</option>
                                                                            <option value="4" @if($data->status == 4)
                                                                                selected @endif>Duda</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="kategori">Kategori</label>
                                                                        <div class="input-group-text d-flex gap-3 mb-3">
                                                                            <input class="form-check-input mt-0"
                                                                                type="checkbox" value="1"
                                                                                name="mubalight"
                                                                                aria-label="Checkbox for following text input"
                                                                                @if($data->mubalight == 1) checked
                                                                            @endif>
                                                                            <span>Mubalight / Mubalighot</span>
                                                                        </div>
                                                                        <div class="input-group-text d-flex gap-3 mb-3">
                                                                            <input class="form-check-input mt-0"
                                                                                type="checkbox" value="1" name="haji"
                                                                                aria-label="Checkbox for following text input"
                                                                                @if($data->haji == 1) checked @endif>
                                                                            <span>Haji</span>
                                                                        </div>
                                                                        <div class="input-group-text d-flex gap-3 mb-3">
                                                                            <input class="form-check-input mt-0"
                                                                                type="checkbox" value="1" name="agniya"
                                                                                aria-label="Checkbox for following text input"
                                                                                @if($data->agniya == 1) checked @endif>
                                                                            <span>Agniya</span>
                                                                        </div>
                                                                        <div class="input-group-text d-flex gap-3 mb-3">
                                                                            <input class="form-check-input mt-0"
                                                                                type="checkbox" value="1" name="duafa"
                                                                                aria-label="Checkbox for following text input"
                                                                                @if($data->duafa == 1) checked @endif>
                                                                            <span>Duafa</span>
                                                                        </div>
                                                                        <div class="input-group-text d-flex gap-3 mb-3">
                                                                            <input class="form-check-input mt-0"
                                                                                type="checkbox" value="1" name="yatim"
                                                                                aria-label="Checkbox for following text input"
                                                                                @if($data->yatim == 1) checked @endif>
                                                                            <span>Yatim</span>
                                                                        </div>
                                                                        <div class="input-group-text d-flex gap-3 mb-3">
                                                                            <input class="form-check-input mt-0"
                                                                                type="checkbox" value="1"
                                                                                name="mahasiswa"
                                                                                aria-label="Checkbox for following text input"
                                                                                @if($data->mahasiswa == 1) checked
                                                                            @endif>
                                                                            <span>Mahasiswa</span>
                                                                        </div>
                                                                        <div class="input-group-text d-flex gap-3 mb-3">
                                                                            <input class="form-check-input mt-0"
                                                                                type="checkbox" value="1" name="sarjana"
                                                                                aria-label="Checkbox for following text input"
                                                                                @if($data->sarjana == 1) checked @endif>
                                                                            <span>Sarjana</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="foto">Foto</label>
                                                                        <input type="file"
                                                                            class="form-control form-control"
                                                                            name="foto" id="fotoedit"
                                                                            accept="image/jpeg, image/png" required />
                                                                    </div>
                                                                    <img src="{{ asset('assets/img/foto/' . $data->foto) }}"
                                                                        id="previewedit" class="img-fluid ms-3 mt-1"
                                                                        style="max-width: 100px; max-height: 100px;"
                                                                        alt="Preview Foto">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="editRow({{ $data->id }})">
                                                            Edit
                                                        </button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ url('/jamaah/delete/'. $data->id) }}" type="button" title="Hapus"
                                            class="btn btn-link btn-danger" data-original-title="Remove"
                                            data-confirm-delete="true" style="padding: 10px">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
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
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script>
    // fungsi untuk preview gambar
    $(document).ready(function() {
        $('#foto').change(function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            } else {
                $('#preview').hide();
            }
        });

        $('#fotoedit').change(function() {
        const file = this.files[0];
        if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
        $('#previewedit').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
        } else {
        $('#previewedit').hide();
        }
        });
    });

    // fungsi untuk edit berdasarkan id
    function editRow(id) {
        $("#editRowForm" + id).submit(); // Pastikan form ada
    }

    // fungsi untuk close modal
    function closemodal() {
        $(".modal").modal("hide");
    }
</script>
@endsection