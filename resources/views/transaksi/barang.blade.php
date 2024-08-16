<x-app-layout>
        <div id="layoutSidenav">
            <x-sidebar></x-sidebar>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tambah Pemasukan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                            <li class="breadcrumb-item active">Pemasukan / Tambah</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form action="{{route('transaksi.store')}}" method="POST">
                                    @csrf
                                    <input name="idbarang" class="form-control py-4" id="idbarang" type="text" value="{{$barang->id}}" hidden/>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kodebarang">Kode Barang</label>
                                            <input name="kodebarang" class="form-control py-4" id="kodebarang" type="text" value="{{$barang->kode_barang}}" readonly/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="namabarang">Nama Barang</label>
                                            <input name="namabarang" class="form-control py-4" id="namabarang" type="text" value="{{$barang->nama_barang}}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="stokbarang">Stok Saat Ini</label>
                                            <input name="stokbarang" class="form-control py-4" id="stokbarang" type="text" value="{{$barang->stok_barang}}" readonly/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="hargasatuan">Harga Satuan</label>
                                            <input name="hargasatuan" class="form-control py-4" id="hargasatuan" type="text" value="Rp. {{ number_format($barang->harga_barang, 0, '.', ',') }}" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="stoktransaksi">Stok Transaksi</label>
                                            <input name="stoktransaksi" class="form-control py-4" id="stoktransaksi" type="number" oninput="calculateTotal()" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="totaltransaksi">TOTAL</label>
                                            <input name="totaltransaksishow" class="form-control py-4" id="totaltransaksishow" type="text" readonly/>
                                            <input name="totaltransaksi" class="form-control py-4" id="totaltransaksi" type="text" hidden/>
                                            <input name="jenistransaksi" class="form-control py-4" id="jenistransaksi" type="text" value="pemasukan" hidden/>
                                        </div>
                                        <script>
                                            function calculateTotal() {
                                                var stokTransaksi = document.getElementById('stoktransaksi').value;
                                                var hargaSatuan = {{$barang->harga_barang}};
                                                var totalTransaksi = stokTransaksi * hargaSatuan;
                                                document.getElementById('totaltransaksishow').value = "Rp. " + totalTransaksi.toLocaleString('id-ID');
                                                document.getElementById('totaltransaksi').value = totalTransaksi;
                                            }
                                        </script>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
</x-app-layout>
