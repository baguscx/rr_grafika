<x-app-layout>
        <div id="layoutSidenav">
            <x-sidebar></x-sidebar>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Laporan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
                        </ol>
                        <div class="card mb-4">
                            <!-- Input Modal -->
                            <div class="modal fade" id="inputtransaksi" tabindex="-1" role="dialog" aria-labelledby="inputtransaksiLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="inputtransaksiLabel">Input transaksi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('transaksi.store')}}" method="POST">
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
                                Tabel transaksi
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">No</th>
                                                <th style="width: 15%">Tanggal</th>
                                                <th style="width: 30%">Nama transaksi</th>
                                                <th style="width: 20%">Harga Satuan</th>
                                                <th style="width: 15%">Stok Berkurang</th>
                                                <th style="width: 10%">Jenis Transaksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($transaksis as $transaksi)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $transaksi->created_at->format('d/m/Y') }}</td>
                                                    <td>{{ $transaksi->nama_transaksi }}</td>
                                                    <td>Rp. {{number_format($transaksi->nominal_transaksi, 0, '.', ',')}} </td>
                                                    <td>{{$transaksi->total_transaksi}} </td>
                                                    <td>
                                                        @if($transaksi->jenis_transaksi == 'pemasukan')
                                                            <span class="badge badge-success">Pemasukan</span>
                                                        @else
                                                            <span class="badge badge-danger">Pengeluaran</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>Tidak ada transaksi</td>
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
