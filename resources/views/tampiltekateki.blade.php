@extends('layout.dasbormaster')
@section('datatekateki','active')

@section('content')

    <div class="content">
        <div class="animated fadeIn">
            <div class="orders">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                {{$question->id}}<hr><strong>{{$question->pertanyaan}}</strong> 
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Jawaban A</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static">{{$question->a}}</p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Jawaban B</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static">{{$question->b}}</p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Jawaban C</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static">{{$question->c}}</p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Kunci Jawaban</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><strong>{{$question->kunci}}</strong></p>
                                    </div>
                                    <div class="card-footer">
                                        <button data-bs-toggle="modal" data-bs-target="#fileModal" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Ubah
                                        </button>
                                        <button data-bs-toggle="modal" data-bs-target="#fileModalDelete" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('datatekateki') }}" class="badge badge-light" style="float:right;" role="button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDIT -->
    <div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileModalLabel">Ubah Teka-Teki</h5>
                </div>
                <form action="{{ route('tekatekis.update') }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="pertanyaan" class="form-label">Pertanyaan</label>
                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="{{ old('pertanyaan') ?? $question->pertanyaan }}">
                        </div>
                        <div class="mb-3">
                            <label for="a" class="form-label">Jawaban A</label>
                            <input type="text" class="form-control" id="a" name="a" value="{{ old('a') ?? $question->a }}">
                        </div>
                        <div class="mb-3">
                            <label for="b" class="form-label">Jawaban B</label>
                            <input type="text" class="form-control" id="b" name="b" value="{{ old('b') ?? $question->b }}">
                        </div>
                        <div class="mb-3">
                            <label for="c" class="form-label">Jawaban C</label>
                            <input type="text" class="form-control" id="c" name="c" value="{{ old('c') ?? $question->c }}">
                        </div>
                        <div class="mb-3">
                            <label for="kunci" class="form-label">Kunci Jawaban</label>
                            <select type="radio" class="form-control" id="kunci" name="kunci">
                            <option value="">Pilih Kunci Jawaban</option>
                            <option value="a" {{ (old('kunci') ?? $question->kunci) == 'a' ? 'checked':'' }}>a</option>
                            <option value="b" {{ (old('kunci') ?? $question->kunci) == 'b' ? 'checked':'' }}>b</option>
                            <option value="c" {{ (old('kunci') ?? $question->kunci) == 'c' ? 'checked':'' }}>c</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal EDIT -->

    <!-- Modal DELETE -->
    <div class="modal fade" id="fileModalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fileModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileModalDeleteLabel">Hapus Soal</h5>
                    <hr>
                    <p>Apa kamu yakin ingin menghapus soal ini?</p>
                </div>
                <div class="modal-footer">
                <form method="POST" action="{{ route('tekatekis.destroy', $question->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal DELETE -->
@endsection