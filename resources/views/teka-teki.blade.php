@extends('layout.master')
@section('title', 'Selamat Mengerjakan')
@section('css', 'trivia')

<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<section class=" d-flex flex-column vh-100 justify-content-center align-items-center"
  style="background: url('assets/img/bg.jpg')">
  <div class="container h-100 d-flex flex-column vh-100 justify-content-center align-items-center">
    <div id="quiz">
      <h1>Teka-teki</h1>
      <p class="questions">
      </p>
      <div class="answers">
      </div>
      <div class="checkAnswers">
        <h3>benar?</h3>
        <div class="checker">
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  window.onload = function() {

    var questionArea = document.getElementsByClassName('questions')[0],
      answerArea = document.getElementsByClassName('answers')[0],
      checker = document.getElementsByClassName('checker')[0],
      current = 0,

      // An object that holds all the questions + possible answers.
      // In the array --> last digit gives the right answer position
      allQuestions = {
        'Apa Warna Langit?': ['Biru', 'Hitam', 'Merah', 0],

        'Benda apa yang berbentuk lingkaran?': ['Dadu', 'Bola', 'Sendok', 1],

        'Berapakah 1+1? ': ['2', '1', '3', 0]
      };

    function loadQuestion(curr) {
      // This function loads all the question into the questionArea
      // It grabs the current question based on the 'current'-variable

      var question = Object.keys(allQuestions)[curr];

      questionArea.innerHTML = '';
      questionArea.innerHTML = question;
    }

    function loadAnswers(curr) {
      // This function loads all the possible answers of the given question
      // It grabs the needed answer-array with the help of the current-variable
      // Every answer is added with an 'onclick'-function

      var answers = allQuestions[Object.keys(allQuestions)[curr]];

      answerArea.innerHTML = '';

      for (var i = 0; i < answers.length - 1; i += 1) {
        var createDiv = document.createElement('div'),
          text = document.createTextNode(answers[i]);

        createDiv.appendChild(text);
        createDiv.addEventListener("click", checkAnswer(i, answers));


        answerArea.appendChild(createDiv);
      }
    }

    function checkAnswer(i, arr) {
      // This is the function that will run, when clicked on one of the answers
      // Check if givenAnswer is sams as the correct one
      // After this, check if it's the last question:
      // If it is: empty the answerArea and let them know it's done.

      return function() {
        var givenAnswer = i,
          correctAnswer = arr[arr.length - 1];

        if (givenAnswer === correctAnswer) {
          addChecker(true);
        } else {
          addChecker(false);
        }

        if (current < Object.keys(allQuestions).length - 1) {
          current += 1;

          loadQuestion(current);
          loadAnswers(current);
        } else {
          questionArea.innerHTML = 'Selesai';
          answerArea.innerHTML = '';
        }

      };
    }

    function addChecker(bool) {
      // This function adds a div element to the page
      // Used to see if it was correct or false

      var createDiv = document.createElement('div'),
        txt = document.createTextNode(current + 1);

      createDiv.appendChild(txt);

      if (bool) {

        createDiv.className += 'correct';
        checker.appendChild(createDiv);
      } else {
        createDiv.className += 'false';
        checker.appendChild(createDiv);
      }
    }


    // Start the quiz right away
    loadQuestion(current);
    loadAnswers(current);

  };
</script>
