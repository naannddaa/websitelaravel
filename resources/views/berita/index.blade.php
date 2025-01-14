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
                    <a href='{{ url('berita/create') }}' class="btn btn-primary">+ Tambah Data </a> </div>


          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-01">No</th>
                            <th class="col-md-2">Judul</th>
                            <th class="col-md-14">Gambar</th>
                            <th class="col-md-6">Deskripsi</th>
                            <th class="col-md-1">Tanggal</th>
                            <th class="col-md-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $databerita->firstItem() ?>
                        @foreach ($databerita as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->image }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                <a href='' class="btn btn-warning btn-sm">Edit</a>
                                <a href='' class="btn btn-danger btn-sm">Del</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>  
                {{ $databerita->links() }}
                
          </div>
          <!-- AKHIR DATA -->
                      
        @endsection