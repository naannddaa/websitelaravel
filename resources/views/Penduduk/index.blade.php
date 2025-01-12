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
                            <th class="col-md-1">Nomer</th>
                            <th class="col-md-3">NIK</th>
                            <th class="col-md-4">Nama Lengkap</th>
                            <th class="col-md-2">Jenis Kelamin</th>
                            <th class="col-md-2">Tempat Lahir</th>
                            <th class="col-md-2">Agama</th>
                            <th class="col-md-2">Pendidikan</th>
                            <th class="col-md-2">Pekerjaan</th>
                            <th class="col-md-2">Golongan Darah</th>
                            <th class="col-md-2">Status Perkawinan</th>
                            <th class="col-md-2">Tanggal Perkawinan</th>
                            <th class="col-md-2">Status Keluarga</th>
                            <th class="col-md-2">Kewarganegaraan</th>
                            <th class="col-md-2">Nomer Paspor</th>
                            <th class="col-md-2">Nomer KITAP</th>
                            <th class="col-md-2">Nama Ayah</th>
                            <th class="col-md-2">Nama Ibu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>35234568900222</td>
                            <td>Nanda ayu astarika</td>
                            <td>Perempuan</td>
                            <td>Banyuwangi</td>
                            <td>Islam</td>
                            <td>D4 Informatika</td>
                            <td>Mahasiswa</td>
                            <td>A</td>
                            <td>Belum kawin</td>
                            <td>Cemara</td>
                            <td>WNI</td>
                            <td>110</td>
                            <td>220</td>
                            <td>Ayah</td>
                            <td>Ibu</td>
                            
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
  