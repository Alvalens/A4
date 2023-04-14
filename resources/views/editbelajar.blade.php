
@section('content')
  <div class="card">
      <form method="POST" action="{{ route('materials.update', $materi->id) }}">
        @csrf
        @method('PUT')
        <div class="card-header">
          <h5 class="modal-judul" id="editModalLabel">Edit materi</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label for="judul" class="form-label">judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $materi->judul) }}" required>
            @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">deskripsi</label>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $materi->deskripsi) }}</textarea>
            @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link', $materi->link) }}" required>
            @error('link')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary">Cancle</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
</div>

@endsection