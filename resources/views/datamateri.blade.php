@extends('layout.dasbormaster')
@section('datamateri','active')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="box-title">Data Materi
                            <a href="" class="badge badge-success" data-bs-toggle="modal" data-bs-target="#fileModal" style="float:right; font-size: 20px;" role="button">Tambah</a>
                        </h5>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="id" name="id">#</th>
                                            <th></th>
                                            <th name="judul">Judul Materi</th>
                                            <th name="level">Level</th>
                                            <th name="timestamp">Waktu Pengubahan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @forelse ($materies as $materi)
                                        <tr>
                                            <td>{{ $materi->id }}</td>
                                            <td><iframe width="175" height="98.437,5" src="{{ $materi->link }}" frameborder="0"
                                                allowfullscreen></iframe></td>
                                            <td>{{ $materi->judul }}</td>
                                            <td>{{ $materi->level }}</td>
                                            <td>{{ $materi->updated_at }}</td>
                                            <td><a href="{{ route('materials.show', ['materi' => $materi->id]) }}" class="badge badge-primary" role="button">Lihat</a>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Tidak ada data ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal TAMBAH -->
<div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">Tambah Materi</h5>
            </div>
            <form action="{{ route('materials.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <input type="text" class="form-control" id="level" name="level" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="url" class="form-control" id="link" name="link" required>
                    </div>
                    <input type="hidden" name="action" value="store">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection