@extends('layout.dasbormaster')
@section('akunpengguna', 'active')

@section('content')

  <div class="content">
    <div class="animated fadeIn">
      <div class="orders">
        <div class="row justify-content-center">
          <div class="col-xl-8">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            <div class="card">
              <div class="card-header">
                {{ $user->id }}
                <hr><strong>{{ $user->name }}</strong>
              </div>
              <div class="card-body card-block">
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label class=" form-control-label">Role</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <p class="form-control-static">{{ $user->role }}</p>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label class=" form-control-label">email</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <a href="{{ $user->email }}" class="form-control-static">{{ $user->email }}</a>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label class=" form-control-label">Password</label>
                  </div>
                  <div class="col-12 col-md-9">
                    <p class="form-control-static">...</p>
                  </div>
                </div>
                <div class="row form-group">
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
            <a href="{{ route('akun.index') }}" class="badge badge-light" style="float:right;" role="button">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal EDIT -->
  <div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fileModalLabel">Ubah Pengguna</h5>
        </div>
        <form action="{{ route('akun.update', ['id' => $user->id]) }}" method="POST">
          @method('PATCH')
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">name</label>
              <input type="text" class="form-control" id="name" name="name"
                value="{{ old('name') ?? $user->name }}">
            </div>
            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select class="form-control" id="role" name="role" required>
                <option value="">Pilih Role</option>
                <option value="admin" {{ (old('role') ?? $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ (old('role') ?? $user->role) == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="siswa" {{ (old('role') ?? $user->role) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                <option value="ortu" {{ (old('role') ?? $user->role) == 'ortu' ? 'selected' : '' }}>Orang tua</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">email</label>
              <input type="email" class="form-control" id="email" name="email"
                value="{{ old('email') ?? $user->email }}">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">password</label>
              <input type="password" class="form-control" id="password" name="password"
                value="{{ old('password') ?? $user->password }}">
            </div>
            <input type="hidden" name="action" value="store">
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
  <div class="modal fade" id="fileModalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="fileModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="fileModalDeleteLabel">Hapus Akun</h5>
          <hr>
          <p>Apa kamu yakin ingin menghapus akun ini?</p>
        </div>
        <div class="modal-footer">
          <form method="POST" action="{{ route('akun.destroy', $user->id) }}">
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
