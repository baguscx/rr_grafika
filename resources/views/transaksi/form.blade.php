<x-app-layout>
        <div id="layoutSidenav">
            <x-sidebar></x-sidebar>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">{{$dataPage['title']}}</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{route('transaksi.update', $transaksi->id)}}" method="POST">
                                    @csrf
                                    @method($dataPage['method'])
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPemasukan">Pemasukan</label>
                                        <input name="pemasukan" class="form-control py-4" id="inputPemasukan" type="number" placeholder="Input Pemasukan" value="{{$transaksi->pemasukan}}" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPengeluaran">Pengeluaran</label>
                                        <input name="pengeluaran" class="form-control py-4" id="inputPengeluaran" type="number" placeholder="Input Pengeluaran" value="{{$transaksi->pengeluaran}}" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{$dataPage['button']}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
</x-app-layout>
