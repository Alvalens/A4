@extends('layout.master')
@section('title', 'Selamat Mengerjakan')

@section('css')
    <link rel="stylesheet" href="{{ url('assets/css/trivia.css') }}">
    <style>
      @media (max-width: 768px) {
        #quiz {
          width: 99%;
        }
        .questions {
          font-size: 1.5rem;
        }
      }
    </style>
@endsection
@section('body-style')
    background-image: url('assets/img/bg.jpg');
@endsection

@section('content')
    <section class="d-flex flex-column vh-100 justify-content-center align-items-center">
        <div class="container justify-content-center align-items-center">
            <div id="quiz">
                <hr>
                @foreach ($questions as $index => $question)
                    <div id="question{{ $index }}" @if($index > 0) style="display:none;" @endif>
                        <p class="questions">{{ $question->pertanyaan }}</p>
                        <div class="answers">
                            <label><input type="radio" name="{{ $question->id }}" value="a">{{ $question->a }}</label><br>
                            <label><input type="radio" name="{{ $question->id }}" value="b">{{ $question->b }}</label><br>
                            <label><input type="radio" name="{{ $question->id }}" value="c">{{ $question->c }}</label><br>
                        </div>
                        <button class="button-33" role="button" onclick="submitAnswer({{ $index }})">Kirim</button>
                    </div>
                @endforeach

                <!-- Score Modal -->
                <div class="modal" id="score-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-notify modal-info" role="document">
                        <div class="modal-content text-center">
                            <div class="modal-header d-flex justify-content-center">
                                <p class="heading">SELAMAT</p>
                            </div>
                            <div class="modal-body">
                                <i class="fas fa-bell fa-4x animated rotateIn mb-4"></i>
                                <p>Kamu Mendapat Skor:</p>
                                <span id="score" style="font-size: 40px"></span>
                            </div>
                            <div class="modal-footer flex-center">
                                <button class="btn btn-outline-secondary waves-effect" onclick="playAgain()">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Score Modal -->

            </div>
        </div>
    </section>

    <!-- SCRIPT -->
    <script>
        // Array of answers for each question
        var answers = @json($questions);

        // Variables for tracking the current question and score
        var currentQuestion = 0;
        var score = 0;

        function submitAnswer(index) {
            var userAnswer = document.querySelector(`input[name="${answers[currentQuestion].id}"]:checked`);
            if (userAnswer.value === answers[currentQuestion].kunci) {
                score++;
            }

            currentQuestion++;
            if (currentQuestion < answers.length) {
                document.getElementById(`question${currentQuestion - 1}`).style.display = 'none';
                document.getElementById(`question${currentQuestion}`).style.display = 'block';
            } else {
                showScoreModal();
            }
        }

        function showScoreModal() {
            var modal = document.getElementById("score-modal");
            var scoreDisplay = document.getElementById("score");
            scoreDisplay.innerText = score;
            modal.style.display = "block";
        }

        function playAgain() {
            location.reload();
        }

    </script>
    <!-- SCRIPT -->

@endsection