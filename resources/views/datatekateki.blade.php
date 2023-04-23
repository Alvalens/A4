@extends('layout.dasbormaster')
@section('datatekateki','active')

@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="box-title">Data Teka-Teki
                            <a href="" class="badge badge-success" data-bs-toggle="modal" data-bs-target="#fileModal" style="float:right; font-size: 20px;" role="button">Tambah</a>
                        </h5>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="id" name="id">#</th>
                                            <th name="pertanyaan">Pertanyaan</th>
                                            <th name="kunci">Kunci Jawaban</th>
                                            <th name="timestamp">Waktu Pengubahan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @forelse ($questions as $question)
                                        <tr>
                                            <td>{{ $question->id }}</td>
                                            <td>{{ $question->pertanyaan }}</td>
                                            <td>{{ $question->kunci }}</td>
                                            <td>{{ $question->updated_at }}</td>
                                            <td><a href="{{ route('tekatekis.show', ['question' => $question->id]) }}" class="badge badge-primary" role="button">Lihat</a>
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
                <h5 class="modal-title" id="fileModalLabel">Tambah Teka-Teki</h5>
            </div>
            <form action="{{ route('tekatekis.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pertanyaan" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                    </div>
                    <div class="mb-3">
                        <label for="a" class="form-label">Jawaban A</label>
                        <input type="text" class="form-control" id="a" name="a" required>
                    </div>
                    <div class="mb-3">
                        <label for="b" class="form-label">Jawaban B</label>
                        <input type="text" class="form-control" id="b" name="b" required>
                    </div>
                    <div class="mb-3">
                        <label for="c" class="form-label">Jawaban C</label>
                        <input type="text" class="form-control" id="c" name="c" required>
                    </div>
                    <div class="mb-3">
                        <label for="kunci" class="form-label">Kunci Jawaban</label>
                        <select class="form-control" id="kunci" name="kunci" required>
                          <option value="">Pilih Kunci Jawaban</option>
                          <option value="a">a</option>
                          <option value="b">b</option>
                          <option value="c">c</option>
                        </select>
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