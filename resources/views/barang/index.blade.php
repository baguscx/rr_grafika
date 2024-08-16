<x-app-layout>
        <div id="layoutSidenav">
            <x-sidebar></x-sidebar>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                            <li class="breadcrumb-item active">Barang</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputbarang">
                                    Input Barang
                                </button>
                            </div>
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
                                                    <label class="small mb-1" for="kodebarang">Kode Barang</label>
                                                    <input name="kodebarang" class="form-control py-4" id="kodebarang" type="text" value="{{ 'GRFK' . '-' . rand() }}" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="namabarang">Nama Barang</label>
                                                    <input name="namabarang" class="form-control py-4" id="namabarang" type="text" placeholder="Input Nama Barang" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="hargabarang">Harga Barang</label>
                                                    <input name="hargabarang" class="form-control py-4" id="hargabarang" type="number" placeholder="Input Harga Barang" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="stokbarang">Stok Barang</label>
                                                    <input name="stokbarang" class="form-control py-4" id="stokbarang" type="number" placeholder="Input Stok Barang" />
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
                                Tabel barang
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
                                                <th style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($barangs as $barang)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$barang->kode_barang}}</td>
                                                    <td>{{$barang->nama_barang}}</td>
                                                    <td>{{$barang->stok_barang}}</td>
                                                    <td>Rp. {{ number_format($barang->harga_barang, 0, '.', ',') }}</td>
                                                    <td>Rp. {{number_format($barang->harga_barang*$barang->stok_barang, 0, '.', ',')}}</td>
                                                    <td><a class="color-primary" href="{{route('barang.edit', $barang->id)}}">Edit</a></td>
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
