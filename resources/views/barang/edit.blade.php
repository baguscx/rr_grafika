<x-app-layout>
        <div id="layoutSidenav">
            <x-sidebar></x-sidebar>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{route('barang.update', $barang->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
 <div class="form-group">
                                                    <label class="small mb-1" for="kodebarang">Kode Barang</label>
                                                    <input name="kodebarang" class="form-control py-4" id="kodebarang" type="text" value="{{ $barang->kode_barang }}" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="namabarang">Nama Barang</label>
                                                    <input name="namabarang" class="form-control py-4" id="namabarang" type="text" value="{{ $barang->nama_barang }}" placeholder="Input Nama Barang" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="hargabarang">Harga Barang</label>
                                                    <input name="hargabarang" class="form-control py-4" id="hargabarang" type="number" value="{{ $barang->harga_barang }}" placeholder="Input Harga Barang" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="stokbarang">Stok Barang</label>
                                                    <input name="stokbarang" class="form-control py-4" id="stokbarang" type="number" value="{{ $barang->stok_barang }}" placeholder="Input Stok Barang" />
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
