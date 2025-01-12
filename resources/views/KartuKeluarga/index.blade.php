@extends('layout.template')
        <!-- START DATA -->
@section('konten')

        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3" style="text-align:right;">
                    <a href='' class="btn btn-primary">+ Tambah Data </a> </div>


          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Nomer Kartu Keluarga</th>
                            <th class="col-md-4">Nama Lengkap</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">RT</th>
                            <th class="col-md-2">RW</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>35234568900222</td>
                            <td>Nanda ayu astarika</td>
                            <td>Purworejo</td>
                            <td>02</td>
                            <td>01</td>
                            <td>
                                <a href='' class="btn btn-warning btn-sm">Edit</a>
                                <a href='' class="btn btn-danger btn-sm">Del</a>
                            </td>
                        </tr>
                    </tbody>
                </table>     
          </div>
          <!-- AKHIR DATA -->
                      
        @endsection
  