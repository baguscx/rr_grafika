<x-app-layout>
        <div id="layoutSidenav">
            <x-sidebar></x-sidebar>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Transaksi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputTransaksi">
                                    Input Transaksi
                                </button>
                            </div>
                            <!-- Input Modal -->
                            <div class="modal fade" id="inputTransaksi" tabindex="-1" role="dialog" aria-labelledby="inputTransaksiLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="inputTransaksiLabel">Input Transaksi</h5>
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
                                                <th style="width: 20%">Pemasukan</th>
                                                <th style="width: 20%">Pengeluaran</th>
                                                <th style="width: 20%">Stor</th>
                                                <th style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($transaksis as $transaksi)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{\Carbon\Carbon::parse($transaksi->created_at)->format('d/m/Y')}}</td>
                                                    <td>{{$transaksi->pemasukan}}</td>
                                                    <td>{{$transaksi->pengeluaran}}</td>
                                                    <td>{{$transaksi->pemasukan - $transaksi->pengeluaran}}</td>
                                                    <td><a class="color-primary" href="{{route('transaksi.edit', $transaksi->id)}}">Edit</a></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>Tidak ada Transaksi</td>
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
