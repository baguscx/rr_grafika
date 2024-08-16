<x-app-layout>
        <div id="layoutSidenav">
            <x-sidebar></x-sidebar>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Pengeluaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                            <li class="breadcrumb-item active">Pengeluaran</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form action="{{route('transaksi.store.pengeluaran')}}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <label class="small mb-1" for="penggunaan">Penggunaan</label>
                                            <input name="penggunaan" class="form-control py-4" id="penggunaan" type="text" autofocus/>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="nominal">Harga Satuan</label>
                                            <input name="nominal" class="form-control py-4" id="nominal" type="number"/>
                                            <input name="jenistransaksi" class="form-control py-4" id="jenistransaksi" type="text" value="pengeluaran" hidden/>
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
