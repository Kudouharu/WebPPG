@extends('layout.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="col">
            <h4 class="card-title">Data Orang tua</h4>
            <span>Input Orang tua Jamaah</span>
          </div>
          <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
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
                  <span class="fw-mediumbold"> Data Orang tua</span>
                  <span class="fw-light">(KK)</span>
                </h5>
              </div>
              <div class="modal-body">
                <form action="{{ url('/ortu') }}" method="POST" id="addRowForm" class="row g-3"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="namabapak">Nama Bapak</label>
                        <input type="text" name="namabapak" id="namabapak" class="form-control form-control"
                          placeholder="* isi Nama Bapak" required />
                      </div>
                    </div>
                    <div class="col-sm-4 d-flex gap-3">
                      <div class="form-group">
                        <label for="humBapak">Hum</label>
                        <div class="input-group-text">
                          <input type="hidden" name="humBapak" id="humBapakVal" value="0">
                          <input class="form-check-input mt-0" id="humBapak" type="checkbox" value="0"
                            aria-label="Checkbox for following text input">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="namaibu">Nama Ibu</label>
                        <input type="text" class="form-control form-control" name="namaibu" id="namaibu"
                          placeholder="* isi Nama Ibu" required />
                      </div>
                    </div>
                    <div class="col-sm-4 d-flex gap-3">
                      <div class="form-group">
                        <label for="humIbu">Hum</label>
                        <div class="input-group-text">
                          <input type="hidden" name="humIbu" id="humIbuVal" value="0">
                          <input class="form-check-input mt-0" id="humIbu" type="checkbox" value="0"
                            aria-label="Checkbox for following text input">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control form-control" name="alamat" id="alamat"
                          placeholder="* isi Alamat Lengkap" required />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nohp">No Telp</label>
                        <input type="text" class="form-control form-control" name="nohp" id="nohp"
                          placeholder="* isi No Telp" required />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="kelompok">Kelompok</label>
                        <select class="form-select form-control" name="kelompok" id="kelompok" required>
                          <option value="" selected disabled>Pilih Kelompok</option>
                          @foreach ($kelompoks as $kelompok)
                          <option value="{{ $kelompok->id }}">{{ $kelompok->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer border-0">
                <button type="button" id="addRowButton" class="btn btn-primary">
                  Add
                </button>
                <button type="button" id="cancelRowButton" class="btn btn-danger" data-dismiss="modal">
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
                <th>Nama Bapak</th>
                <th>Hum</th>
                <th>Nama Ibu</th>
                <th>Hum</th>
                <th>No Telp</th>
                <th>Kelompok</th>
                <th style="width: 10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orangtua as $ortu)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ortu->nama_bapak }}</td>
                <td class="text-center">
                  @if($ortu->hum_bapak == 1)
                  <i class="far fa-check-square"></i>
                  @else
                  <i class="far fa-square"></i>
                  @endif
                </td>
                <td>{{ $ortu->nama_ibu }}</td>
               <td class="text-center">
                @if($ortu->hum_ibu == 1)
                <i class="far fa-check-square"></i>
                @else
                <i class="far fa-square"></i>
                @endif
              </td>
                <td>{{ $ortu->nohp }}</td>
                <td>{{ $ortu->nama_kelompok }}</td>
                <td>
                  <div class="form-button-action">
                    <button type="button" data-bs-toggle="tooltip" title="Edit" class="btn btn-link btn-primary"
                      data-original-title="Edit Task" style="padding: 10px">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" data-bs-toggle="tooltip" title="Hapus" class="btn btn-link btn-danger"
                      data-original-title="Remove" style="padding: 10px">
                      <i class="fa fa-trash"></i>
                    </button>
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
    
    $('#humBapak').change(function() {
      humBapak();
    });

    $('#humIbu').change(function() {
      humIbu();
    });
  });

  function humBapak(){
    const value = $('#humBapak').is(':checked') ? 1 : 0;
    $('#humBapakVal').val(value); // Set nilai ke input
  }

  function humIbu(){
    const value = $('#humIbu').is(':checked') ? 1 : 0;
    $('#humIbuVal').val(value); // Set nilai ke input
  }
</script>
@endsection