<x-app-layout>
    <div id="layoutSidenav">
        <x-sidebar></x-sidebar>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Penggajian</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                        <li class="breadcrumb-item">Penggajian</li>
                        <li class="breadcrumb-item active">Karyawan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputstok">
                                Input Gaji
                            </button>
                        </div>
                        <!-- Input Modal -->
                        <div class="modal fade" id="inputstok" tabindex="-1" role="dialog" aria-labelledby="inputstokLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="inputstokLabel">Input Gaji</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('gaji.store')}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <!-- Add your input form here -->
                                            <div class="form-group">
                                                <label class="small mb-1" for="name">Nama</label>
                                                <input name="name" class="form-control py-4" id="name" type="text" placeholder="Nama" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="bagian">Bagian</label>
                                                <select name="bagian" class="form-control py-2" id="bagian">
                                                    <option value="">Pilih Bagian</option>
                                                    <option value="kasir">Kasir</option>
                                                    <option value="operator">Operator</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="gaji">Gaji/hari</label>
                                                <input name="gajishow" class="form-control py-4" id="gajishow" type="text" placeholder="Gaji Perhari" readonly/>
                                                <input name="gaji" class="form-control py-4" id="gaji" type="number" placeholder="Gaji Perhari" hidden/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="hadir">Hadir/bulan</label>
                                                <input name="hadir" class="form-control py-4" id="hadir" type="number" placeholder="Hadir" />
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
                            Tabel Penggajian
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th style="width: 15%">Nama</th>
                                            <th style="width: 20%">Bagian</th>
                                            <th style="width: 10%">Gaji/hari</th>
                                            <th style="width: 10%">Hadir</th>
                                            <th style="width: 20%">Gaji Bersih</th>
                                            <th style="width: 10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($gajis as $gaji)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$gaji->name}}</td>
                                            <td>{{$gaji->bagian}}</td>
                                            <td>Rp. {{number_format($gaji->gaji, 0, ',', '.')}}</td>
                                            <td>{{$gaji->hadir}}</td>
                                            <td>Rp. {{number_format($gaji->total_gaji, 0, ',', '.')}}</td>
                                            <td>
                                                <form action="{{route('gaji.destroy', $gaji->id)}}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger" style="border: none; background: none; padding: 0; cursor: pointer;">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript to handle bagian selection -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bagianSelect = document.getElementById('bagian');
            const gajiInput = document.getElementById('gaji');
            const gajiShow = document.getElementById('gajishow');

            bagianSelect.addEventListener('change', function () {
                if (this.value === 'kasir') {
                    gajiShow.value = "Rp. 50.000";
                    gajiInput.value = 50000;
                } else if (this.value === 'operator') {
                    gajiShow.value = "Rp. 100.000";
                    gajiInput.value = 100000;
                } else {
                    gajiInput.value = '';
                }
            });
        });
    </script>
</x-app-layout>
