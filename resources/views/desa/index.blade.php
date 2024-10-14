@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="col">
                        <h4 class="card-title">Data Desa</h4>
                        <span>Penginputan Data Desa</span>
                    </div>
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                        data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">Input Data Desa</span>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/desa') }}" method="POST" id="addRowForm"
                                    class="addRowForm row g-3" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama Desa</label>
                                                <input type="text" class="form-control form-control" id="nama"
                                                    name="nama" placeholder="* isi Nama Desa" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat Desa</label>
                                                <input type="text" class="form-control form-control" id="alamat"
                                                    name="alamat" placeholder="* isi Alamat Masjid Desa" />
                                            </div>
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
                                <th>Nama Desa</th>
                                <th>Alamat</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($desa as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->alamat }}</td>
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
                                                            <span class="fw-mediumbold">Input Data Desa</span>
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/desa/edit/'. $data->id) }}" method="POST"
                                                            id="editRowForm{{ $data->id }}" class="row g-3"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="nama">Nama Desa</label>
                                                                        <input type="text"
                                                                            class="form-control form-control" id="nama"
                                                                            name="nama" placeholder="* isi Nama Desa"
                                                                            value="{{ $data->nama }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat Desa</label>
                                                                        <input type="text"
                                                                            class="form-control form-control"
                                                                            id="alamat" name="alamat"
                                                                            placeholder="* isi Alamat Masjid Desa"
                                                                            value="{{ $data->alamat }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-primary" onclick="editRow({{ $data->id }})">
                                                            Edit
                                                        </button>
                                                        <button type="button" class="btn btn-danger cancelRowButton"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ url('/desa/delete/'. $data->id) }}" type="button" title="Hapus" class="btn btn-link btn-danger"
                                            data-original-title="Remove" data-confirm-delete="true"
                                            style="padding: 10px">
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