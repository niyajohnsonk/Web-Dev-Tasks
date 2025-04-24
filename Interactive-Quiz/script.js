$(document).ready(function () {
    const quizData = [
      {
        question: "What is 2 + 2?",
        options: ["3", "4", "5", "6"],
        answer: "4"
      },
      {
        question: "Which planet is known as the Red Planet?",
        options: ["Earth", "Venus", "Mars", "Jupiter"],
        answer: "Mars"
      },
      {
        question: "Which is the largest ocean?",
        options: ["Atlantic", "Indian", "Pacific", "Arctic"],
        answer: "Pacific"
      }
    ];
  
    let currentQuestion = 0;
    let score = 0;
    let timer;
    let timeLeft = 10;
  
    function showQuestion() {
      const q = quizData[currentQuestion];
      $("#question").text(q.question);
      $("#options").html(""); // Clear old options
  
      q.options.forEach(option => {
        const btn = $("<div class='option'></div>").text(option);
        btn.click(() => selectAnswer(option));
        $("#options").append(btn);
      });
  
      timeLeft = 10;
      updateTimerDisplay();
      $("#progressBar").css("width", "100%");
      clearInterval(timer);
      timer = setInterval(countdown, 1000);
    }
  
    function countdown() {
      timeLeft--;
      updateTimerDisplay();
      $("#progressBar").css("width", `${(timeLeft / 10) * 100}%`);
  
      if (timeLeft <= 0) {
        clearInterval(timer);
        goToNext();
      }
    }
  
    function updateTimerDisplay() {
      $("#timer").text("Time left: " + timeLeft + "s");
    }
  
    function selectAnswer(selected) {
      clearInterval(timer);
      if (selected === quizData[currentQuestion].answer) {
        score++;
      }
      goToNext();
    }
  
    function goToNext() {
      $("#quiz-container").delay(300).fadeOut(200, function () {
        currentQuestion++;
        if (currentQuestion < quizData.length) {
          showQuestion();
          $(this).fadeIn(200);
        } else {
          showResult();
        }
      });
    }
  
    function showResult() {
      $("#score").text(`${score} out of ${quizData.length}`);
      $("#result").fadeIn();
    }
  
    showQuestion(); // Start the quiz
  });
  