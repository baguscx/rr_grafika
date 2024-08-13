<x-app-layout>
    <div id="layoutSidenav">
        <x-sidebar></x-sidebar>
        <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
            <h1 class="mt-4">Stok</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                <li class="breadcrumb-item active">Stok</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputstok">
                    Input Stok
                </button>
                </div>
                <!-- Input Modal -->
                <div class="modal fade" id="inputstok" tabindex="-1" role="dialog" aria-labelledby="inputstokLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputstokLabel">Input Stok</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('stok.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                        <!-- Add your input form here -->
                        <div class="form-group">
                            <label class="small mb-1" for="namaBarang">Nama Barang</label>
                            <input name="namaBarang" class="form-control py-4" id="namaBarang" type="text" placeholder="Nama Barang" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="jumlahBarang">Jumlah Barang</label>
                            <input name="jumlahBarang" class="form-control py-4" id="jumlahBarang" type="number" placeholder="Jumlah Barang" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="hargaBarang">Harga Barang</label>
                            <input name="hargaBarang" class="form-control py-4" id="hargaBarang" type="number" placeholder="Harga Barang" />
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Tabel stok
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 15%">Tanggal</th>
                        <th style="width: 20%">Nama Barang</th>
                        <th style="width: 10%">Jumlah Barang</th>
                        <th style="width: 15%">Harga Satuan</th>
                        <th style="width: 10%">Barang Keluar</th>
                        <th style="width: 10%">Barang Tersedia</th>
                        <th style="width: 15%">Total Harga Tersedia</th>
                        <th style="width: 10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stoks as $stok)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{\Carbon\Carbon::parse($stok->created_at)->format('d/m/Y')}}</td>
                            <td>{{$stok->nama_barang}}</td>
                            <td>{{$stok->jumlah_barang}}</td>
                            <td>Rp. {{number_format($stok->harga_barang, 0, ',', '.')}}</td>
                            <td>{{$stok->barang_keluar}}</td>
                            <td>{{$stok->barang_tersedia}}</td>
                            <td>Rp. {{number_format($stok->total_harga, 0, ',', '.')}}</td>
                            <td>
                                <a class="color-primary" href="{{route('stok.edit', $stok->id)}}">Edit</a>
                                <form action="{{route('stok.destroy', $stok->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>Tidak ada stok</td>
                        </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>
                </div>
                </div>
            </div>
            </div>
        </main>
        </div>
    </div>
</x-app-layout>
