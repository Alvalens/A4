         @php
          //  select user all user progress based on level
          //progress now
          $progressTotal = $userProgress->where('level', $level)->count();
          $totalPrecent = $userProgress->where('level', $level)->sum('progress');
          if (!$progressTotal) {
            $progressTotal = 1;
          }
          $progress = round($totalPrecent / $progressTotal);
          // if progress is more than 80 then green, more than 40 then orange, else red
          $barColor = '';
          if ($progress > 80) {
            $barColor = 'green';
          } elseif ($progress > 40) {
            $barColor = 'orange';
          } else {
            $barColor = 'red';
          }

         @endphp
         <div class="card cardr">
            <div class="container">
              <div class="judul mb-4 mt-3">
                <h3 class="text-center"><strong> MATERI {{ $level }}</strong></h3>
              </div>
              <div class="progress-bar mx-5 mb-5 mt-2">
                <h4 class="mb-2">
                  Progress: <strong> {{ $progress }} % </strong>
                </h4>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;  background-color: {{ $barColor }};" aria-valuenow="{{ $progress }}" aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>
              </div>
              <div class="materi">
                <hr>
                <h5 class="text-center"><strong>HASIL</strong></h5>
                <div
                  class="materies row row-cols-2 row-cols-md-3 justify-content-center align-items-center gy-5 p-md-5" style="max-height: 500px; overflow-y: auto;">
                    @forelse($userProgress as $material)
                      @if($material->level == $level)
                        <div class="mat rounded-circle text-center">
                          {{-- Set fill color based on progress --}}
                          @php
                            $fillColor = '';
                            if ($material->progress > 80) {
                              $fillColor = '#617A55';
                            } elseif ($material->progress > 40) {
                              $fillColor = '#F7E1AE';
                            } else {
                              $fillColor = '#FFF8D6';
                            }
                          @endphp
                          {{-- SVG code with dynamic values --}}
                          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="{{ $fillColor }}" class="bi bi-circle-fill" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8" />
                            <text x="50%" y="58%" text-anchor="middle" fill="white" font-size="25%">{{ $material->progress }}%</text>
                          </svg>
                          <h5 class="text-center mt-2 mb-4">{{ $material->nama_materi }}</h5>
                        </div>
                        @endif
                      @empty
                      <p>kosong</p>
                    @endforelse
                </div>
              </div>
            </div>
          </div>