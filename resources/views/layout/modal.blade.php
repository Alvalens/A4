<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{ route('materials.update', $materi->id) }}">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-judul" id="editModalLabel">Edit materi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="judul" class="form-label">judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $materi->judul }}" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $materi->deskripsi }}</textarea>
          </div>
          <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ $materi->link }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
