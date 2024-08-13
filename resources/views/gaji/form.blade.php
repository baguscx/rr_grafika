<x-app-layout>
    <div id="layoutSidenav">
        <x-sidebar></x-sidebar>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">{{$dataPage['title']}}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                        <li class="breadcrumb-item active">Stok</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Tabel stok
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('stok.update', $stok->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$stok->nama_barang}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_barang">Jumlah Barang</label>
                                        <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{$stok->jumlah_barang}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_barang">Harga Satuan</label>
                                        <input type="text" class="form-control" id="harga_barang" name="harga_barang" value="{{$stok->harga_barang}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="barang_keluar">Barang Keluar</label>
                                        <input type="text" class="form-control" id="barang_keluar" name="barang_keluar" value="{{$stok->barang_keluar}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
