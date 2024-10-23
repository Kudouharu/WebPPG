@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="col">
                        <h4 class="card-title">Data Pekerjaan</h4>
                        <span>Input Data Pekerjaan</span>
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
                                    <span class="fw-mediumbold"> Input Data Pekerjaan</span>
                                </h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/pekerjaan') }}" method="POST" id="addRowForm" class="row g-3"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nama">Nama Pekerjaan</label>
                                                <input type="text" name="nama" class="form-control form-control"
                                                    placeholder="* isi Nama Pekerjaan" required />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" id="addRowButton" class="btn btn-primary">
                                    Add
                                </button>
                                <button type="button" class="btn btn-danger" onclick="closemodal()">
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
                                <th>Pekerjaan</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pekerjaans as $pekerjaan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pekerjaan->nama }}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $pekerjaan->id }}" title="Edit"
                                            class="btn btn-link btn-primary" data-original-title="Edit Task"
                                            style="padding: 10px">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{ $pekerjaan->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title">
                                                            <span class="fw-mediumbold"> Edit Data Pekerjaan</span>
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/pekerjaan/edit/'. $pekerjaan->id) }}" method="POST"
                                                            id="editRowForm{{ $pekerjaan->id }}" class="row g-3"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label for="nama">Nama Pekerjaan</label>
                                                                        <input type="text" name="nama"
                                                                            class="form-control form-control"
                                                                            placeholder="* isi Nama Bapak"
                                                                            value="{{ $pekerjaan->nama }}" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" onclick="editRow({{ $pekerjaan->id }})"
                                                            class="btn btn-primary">
                                                            Add
                                                        </button>
                                                        <button type="button" data-id="{{ $pekerjaan->id }}"
                                                            class="btn btn-danger" data-dismiss="modal"
                                                            onclick="closeEdit({{ $pekerjaan->id }})">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ url('/pekerjaan/delete/'. $pekerjaan->id) }}" type="button" title="Hapus"
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
    $(document).ready(function() {
    // Inisialisasi nilai checkbox pada load
    humBapak();
    humIbu();
    
    $('.humBapak').change(function() {
      humBapak();
    });

    $('.humIbu').change(function() {
      humIbu();
    });
  });

  function humBapak(){
    const value = $('.humBapak').is(':checked') ? 1 : 0;
    $('.humBapakVal').val(value); // Set nilai ke input
  }

  function humIbu(){
    const value = $('.humIbu').is(':checked') ? 1 : 0;
    $('.humIbuVal').val(value); // Set nilai ke input
  }

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