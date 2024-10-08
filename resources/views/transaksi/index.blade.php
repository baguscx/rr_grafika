<x-app-layout>
        <div id="layoutSidenav">
            <x-sidebar></x-sidebar>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Pemasukan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                            <li class="breadcrumb-item active">Pemasukan</li>
                        </ol>
                        <div class="card mb-4">
                            <!-- Input Modal -->
                            <div class="modal fade" id="inputbarang" tabindex="-1" role="dialog" aria-labelledby="inputbarangLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="inputbarangLabel">Input barang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('barang.store')}}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <!-- Add your input form here -->
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPemasukan">Pemasukan</label>
                                                    <input name="pemasukan" class="form-control py-4" id="inputPemasukan" type="number" placeholder="Input Pemasukan" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPengeluaran">Pengeluaran</label>
                                                    <input name="pengeluaran" class="form-control py-4" id="inputPengeluaran" type="number" placeholder="Input Pengeluaran" />
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
                                Tabel Transaksi
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">No</th>
                                                <th style="width: 15%">Kode</th>
                                                <th style="width: 20%">Nama Barang</th>
                                                <th style="width: 20%">Stok</th>
                                                <th style="width: 20%">Harga Satuan</th>
                                                <th style="width: 20%">Total Harga</th>
                                                <th style="width: 20%">Stok Aman</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($barangs as $barang)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>
                                                        <a class="color-primary" href="{{route('transaksi.barang', $barang->id)}}" style="text-decoration: none;">{{$barang->kode_barang}}</a>
                                                    </td>
                                                    <td>
                                                        <a class="color-primary" href="{{route('transaksi.barang', $barang->id)}}" style="text-decoration: none;">{{$barang->nama_barang}}</a>
                                                    </td>
                                                    <td>{{$barang->stok_barang}}</td>
                                                    <td>Rp. {{ number_format($barang->harga_barang, 0, '.', ',') }}</td>
                                                    <td>Rp. {{number_format($barang->harga_barang*$barang->stok_barang, 0, '.', ',')}}</td>
                                                    <td>
                                                        @if($barang->stok_barang >= 5)
                                                            <i class="fas fa-check-circle" style="color: green;"></i>
                                                        @else
                                                            <i class="fas fa-exclamation-triangle" style="color: red;"></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>Tidak ada barang</td>
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
