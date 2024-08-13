<x-app-layout>
    <div id="layoutSidenav">
        <x-sidebar></x-sidebar>
        <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
            <h1 class="mt-4">Penggajian</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">RR GRAFIKA</a></li>
                <li class="breadcrumb-item ">Penggajian</li>
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
                            <input class="form-control py-4" id="bagian" type="number" value="karyawan" placeholder="Karyawan" disabled/>
                            <input name="bagian" type="hidden" value="Karyawan"/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="gaji">Gaji/hari</label>
                            <input name="gaji" class="form-control py-4" id="gaji" type="number" placeholder="Gaji Perhari" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="hadir">Hadir/bulan</label>
                            <input name="hadir" class="form-control py-4" id="hadir" type="number" placeholder="Hadir" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="tidak_hadir">Tidak Hadir/bulan</label>
                            <input name="tidak_hadir" class="form-control py-4" id="tidak_hadir" type="number" placeholder="Tidak Hadir" />
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 15%">Nama</th>
                        <th style="width: 20%">Bagian</th>
                        <th style="width: 10%">Gaji/hari</th>
                        <th style="width: 10%">Hadir</th>
                        <th style="width: 10%">Tidak Hadir</th>
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
                            <td>{{$gaji->tidak_hadir}}</td>
                            <td>Rp. {{number_format($gaji->total_gaji, 0, ',', '.')}}</td>
                            <td>
                                <a class="color-primary" href="{{route('gaji.edit', $gaji->id)}}">Edit</a>
                                <form action="{{route('gaji.destroy', $gaji->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger">Delete</button>
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
            </div>
        </main>
        </div>
    </div>
</x-app-layout>
