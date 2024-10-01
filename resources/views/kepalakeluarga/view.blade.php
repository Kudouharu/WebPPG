@extends('layout.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <div class="col">
                <h4 class="card-title">Data Kepala Keluarga</h4>
                <span><i>Input Kepala Keluarga Jamaah</i></span>
              </div>
              <button
                class="btn btn-primary btn-round ms-auto"
                data-bs-toggle="modal"
                data-bs-target="#addRowModal"
              >
                <i class="fa fa-plus"></i>
                Tambah
              </button>
            </div>
          </div>
          <div class="card-body">
            <!-- Modal -->
            <div
              class="modal fade"
              id="addRowModal"
              tabindex="-1"
              role="dialog"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold"> Data Kepala Keluarga</span>
                      <span class="fw-light">(KK)</span>
                    </h5>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="row">
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label for="largeInput">Nama Bapak</label>
                            <input
                              type="text"
                              class="form-control form-control"
                              id="defaultInput"
                              placeholder="* isi Nama Bapak"
                            />
                          </div>
                        </div>
                        <div class="col-sm-4 d-flex gap-3">
                          <div class="form-group">
                            <label for="largeInput">Hum</label>
                            <div class="input-group-text">
                              <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <label for="largeInput">Nama Ibu</label>
                            <input
                              type="text"
                              class="form-control form-control"
                              id="defaultInput"
                              placeholder="* isi Nama Ibu"
                            />
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="largeInput">Alamat</label>
                            <input
                              type="text"
                              class="form-control form-control"
                              id="defaultInput"
                              placeholder="* isi Alamat Lengkap"
                            />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="largeInput">No Telp</label>
                            <input
                              type="text"
                              class="form-control form-control"
                              id="defaultInput"
                              placeholder="* isi No Telp"
                            />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="defaultSelect">Kelompok</label>
                            <select
                              class="form-select form-control"
                              id="defaultSelect"
                            >
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer border-0">
                    <button
                      type="button"
                      id="addRowButton"
                      class="btn btn-primary"
                    >
                      Add
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      data-dismiss="modal"
                    >
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="table-responsive">
              <table
                id="add-row"
                class="display table table-striped table-hover"
              >
                <thead>
                  <tr>
                    <th>Nama Bapak</th>
                    <th>Hum</th>
                    <th>Nama Ibu</th>
                    <th>Hum</th>
                    <th>No Telp</th>
                    <th>Kelompok</th>
                    <th>Tidak Aktif</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ERY DWI SOFYANTO</td>
                    <td class="text-center"><i class="far fa-square"></i></td>
                    <td>FARAMITA ANGGRAINI AYUNINGTYAS</td>
                    <td class="text-center"><i class="far fa-square"></i></td>
                    <td>-</td>
                    <td>Gumukrejo</td>
                    <td class="text-center"><i class="far fa-square"></i></td>
                    <td>
                      <div class="form-button-action">
                        <button
                          type="button"
                          data-bs-toggle="tooltip"
                          title="Edit"
                          class="btn btn-link btn-primary"
                          data-original-title="Edit Task"
                          style="padding: 10px"
                        >
                          <i class="fa fa-edit"></i>
                        </button>
                        <button
                          type="button"
                          data-bs-toggle="tooltip"
                          title="Hapus"
                          class="btn btn-link btn-danger"
                          data-original-title="Remove"
                          style="padding: 10px"
                        >
                          <i class="fa fa-trash"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
