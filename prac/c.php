<?php
session_start();

// Assuming that you have a variable $email containing the email
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzyy</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="questions.css">
   
</head>

<body>
    <!-- <div class="b"> <a href="/Service.html" class="h">Back To Home</a> </div> -->

    <div class="main-div">
        <h2 id="timer"></h2>
        <div class="inner-div">
            <h2 class="question">Qestions comes here</h2>
            <ul>
                <li> <input type="radio" name="answer" id="ans1" class="answer"> <label for="ans1" id="option1">Answer
                        Option</label> </li>
                <li> <input type="radio" name="answer" id="ans2" class="answer"> <label for="ans1" id="option2">Answer
                        Option</label> </li>
                <li> <input type="radio" name="answer" id="ans3" class="answer"> <label for="ans1" id="option3">Answer
                        Option</label> </li>
                <li> <input type="radio" name="answer" id="ans4" class="answer"> <label for="ans1" id="option4">Answer
                        Option</label> </li>
            </ul> 
            
            <div class="btns">
                <button id="previous" class="btn">Previous</button>
                <button id="submit">Submit</button>
                <button id="next" class="btn">Next</button>
            </div>

            <div id="showscore" class="scoreArea"></div>
        </div>
    <div id="questionSquares" class="question-squares"></div>

    </div>
    <script src="c.js"></script>
    <script>
        const question = document.querySelector(".question");
const option1 = document.querySelector("#option1");
const option2 = document.querySelector("#option2");
const option3 = document.querySelector("#option3");
const option4 = document.querySelector("#option4");
const submit = document.querySelector("#submit");
const answers = document.querySelectorAll(".answer");
const showscore = document.querySelector("#showscore");
const timerDisplay = document.querySelector("#timer");
const back = document.querySelector(".b");
const prevButton = document.querySelector("#previous");
const nextButton = document.querySelector("#next");
const questionSquaresContainer = document.getElementById('questionSquares');
const questionSquares = [];


let questionCount = 0;
let score = 0;
let timer; // Variable to store the timer ID
let timeRemaining = 5 * 60;
let submittedAnswers = Array(quizDB.length).fill(false);


  // Create squares for each question
  for (let i = 0; i < quizDB.length; i++) {
    const square = document.createElement('div');
    square.classList.add('question-square');
    square.innerText = i + 1; // Display question number
    questionSquares.push(square);
    questionSquaresContainer.appendChild(square);
  }

  const updateQuestionSquares = () => {
    questionSquares.forEach((square, index) => {
      if (submittedAnswers[index] !== false) {
        // Answer submitted
        square.style.backgroundColor =  'green';
      } else {
        // Not submitted
        square.style.backgroundColor = 'red';
      }

      // If current question, make it purple
      if (index === questionCount) {
        square.style.backgroundColor = 'purple';
      }
    });
  };


const loadQuestion = () => {
  const questionList = quizDB[questionCount];
  question.innerText = questionList.question;
  option1.innerText = questionList.a;
  option2.innerText = questionList.b;
  option3.innerText = questionList.c;
  option4.innerText = questionList.d;

   answers.forEach((curAnsElem) => {
    curAnsElem.checked = false;
    updateQuestionSquares();
  });
  // Load submitted answer if available
  const submittedAnswer = submittedAnswers[questionCount];
  if (submittedAnswer !== false) {
    answers[submittedAnswer].checked = true;
    lockSubmittedAnswer();
    submit.style.display="none";
  } else {
    unlockAnswers();
    submit.style.display="block";
  }
};

const lockSubmittedAnswer = () => {
  answers.forEach((curAnsElem) => {
    curAnsElem.disabled = true;
  });
};

const unlockAnswers = () => {
  answers.forEach((curAnsElem) => {
    curAnsElem.disabled = false;
  });
};

const startTimer = () => {
  timer = setInterval(() => {
    if (timeRemaining > 0) {
      timeRemaining--;
      updateTimerDisplay();
    } else {
      submitQuiz(); // Submit the quiz when the timer ends
    }
  }, 1000);
};

const updateTimerDisplay = () => {
  const minutes = Math.floor(timeRemaining / 60);
  const seconds = timeRemaining % 60;
  timerDisplay.innerText = `Time Remaining: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
};

const getCheckedAnswer = () => {
  let answer;
  answers.forEach((curAnsElem, index) => {
    if (curAnsElem.checked) {
      answer = index;
    }
  });
  return answer;
};

const deselectAll = () => {
  answers.forEach((curAnsElem) => (curAnsElem.checked = false));
};

const submitQuiz = () => {
  clearInterval(timer); // Stop the timer when submitting the quiz

  // Calculate total score based on 2 marks for each correct answer
  const totalScore = score * 2;

  showscore.innerHTML = `<h3>You have attended ${questionCount} / 20 Questions...</h3><br></br> <h2>Time's up! You Scored ${totalScore}/${quizDB.length * 2}👍</h2><button class="btn" onclick="location.reload()">Play Again</button>`;
  showscore.classList.remove("scoreArea");
  submit.remove("submit");
  questionSquaresContainer.remove("questionSquaresContainer")
  // prevButton.remove("prevButton");
  // nextButton.remove("nextButton");
  lockSubmittedAnswer(); // Lock answers after submission
  updateQuestionSquares();
  // Send a POST request to the submit_score.php file with the user ID and score as the request body
  fetch('submit_score.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `id=${getUserIdFromSession()}&score=${totalScore}`,
  })
    .then((res) => res.text())
    .then((data) => console.log(data))
    .catch((err) => console.error(err));
};

const getUserIdFromSession = () => {
  // Fetch the user ID from the session variable or cookie
  const userId = '<?php echo $_SESSION["id"]; ?>';
  return userId;
};


submit.addEventListener("click", () => {
  const checkedAnswer = getCheckedAnswer();

  if (checkedAnswer !== undefined) {
    submittedAnswers[questionCount] = checkedAnswer;
    lockSubmittedAnswer();
  }
  console.log(quizDB[questionCount].ans);
  console.log(checkedAnswer);

  if (checkedAnswer == quizDB[questionCount].ans-1) {
    score++;
  }

  questionCount++;
  unlockAnswers();
  updateQuestionSquares();

  if (questionCount < quizDB.length) {
    loadQuestion();
  } else {
    submitQuiz();
  }
});

prevButton.addEventListener("click", () => {
  if (questionCount > 0) {
    questionCount--;
    loadQuestion();
    updateQuestionSquares();
  }
});

nextButton.addEventListener("click", () => {
  if (questionCount < quizDB.length - 1) {
    questionCount++;
    loadQuestion();
    updateQuestionSquares();
  }
});

loadQuestion();
startTimer();

const backBtn = document.querySelector(".h");

backBtn.addEventListener('click',()=>{
  alert("Are you sure? You want close the quiz?")
})
    </script>
</body>

</html>

