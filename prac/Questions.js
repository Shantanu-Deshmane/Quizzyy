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
      square.style.backgroundColor = 'green';

    } else if (index === questionCount) {
      // If current question, make it purple
      square.style.backgroundColor = 'purple';

    } else {
      // Not submitted
      square.style.backgroundColor = 'red';
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
    submit.style.display = "none";
  } else {
    unlockAnswers();
    submit.style.display = "block";
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
  // Stop the timer when submitting the quiz
  clearInterval(timer); 

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
};

submit.addEventListener("click", () => {
  const checkedAnswer = getCheckedAnswer();

  if (checkedAnswer !== undefined) {
    submittedAnswers[questionCount] = checkedAnswer;
    lockSubmittedAnswer();
  }
  console.log(quizDB[questionCount].ans);
  console.log(checkedAnswer);

  if (checkedAnswer == quizDB[questionCount].ans - 1) {
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

