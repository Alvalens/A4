
<div class="card cardr">
  <div class="container">
    <div class="judul mb-4 mt-3">
      <h3 class="text-center">Rapor 1</h3>
    </div>

         <div class="card cardr">
            <div class="container">
              <div class="judul mb-4 mt-3">
                <h3 class="text-center">Raport {{ $level }}</h3>
              </div>
              <div class="progress-bar mx-5 mb-5 mt-2">
                <h4>
                  progress
                </h4>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
                <h5>55%</h5>
              </div>
              <div class="materi">
                <h5 class="text-center">Materi</h5>
                <div
                  class="materies row row-cols-2 row-cols-md-3 justify-content-center align-items-center gy-5 p-md-5">
                    @forelse($userProgress as $material)
                      @if($material->level == $level)
                        <div class="mat rounded-circle text-center">
                          {{-- Set fill color based on progress --}}
                          @php
                            $fillColor = '';
                            if ($material->progress > 80) {
                              $fillColor = 'green';
                            } elseif ($material->progress > 40) {
                              $fillColor = 'orange';
                            } else {
                              $fillColor = 'red';
                            }
                          @endphp
                          {{-- SVG code with dynamic values --}}
                          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="{{ $fillColor }}" class="bi bi-circle-fill" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8" />
                            <text x="50%" y="58%" text-anchor="middle" fill="white" font-size="25%">{{ $material->progress }}%</text>
                          </svg>
                          <h5 class="text-center">{{ $material->nama_materi }}</h5>
                        </div>
                        @endif
                      @empty
                      <p>kosong</p>
                    @endforelse
                </div>
              </div>
              {{-- grey more button --}}
              <div class="more text-center mb-3">
                <button type="button" class="btn btn-outline-secondary btn-lg btn-block">More</button>
              </div>
