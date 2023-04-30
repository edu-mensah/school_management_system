let changeClassTimeForm = document.querySelector(".change-class-time-form");
let changeClassTimeBtn = document.querySelector(".change-batch-class-time-btn");
//

let changeBatchInstructorForm = document.querySelector(
  ".change-batch-instructor-form"
);
let changeBatchInstructorBtn = document.querySelector(
  ".change-batch-instructor-btn"
);

// ,
let changeBatchStartDateForm = document.querySelector(
  ".change-start-date-form"
);
let changeBatchStartDateBtn = document.querySelector(
  ".change-batch-start-date-btn"
);

//
let changeBatchCompletionDateForm = document.querySelector(
  ".change-completion-date-form"
);
let changeBatchCompletionDateBtn = document.querySelector(
  ".change-batch-completion-date-btn"
);

//

let changeBatchCompletionStatusForm = document.querySelector(
  ".change-completion-status-form"
);
let changeBatchCompletionStatusBtn = document.querySelector(
  ".change-batch-completion-status-btn"
);

// change-completion-status-form

changeClassTimeBtn.addEventListener("click", () => {
  changeClassTimeForm.classList.toggle("show-menu");
  if (changeBatchInstructorForm.classList.contains("show-menu")) {
    changeBatchInstructorForm.classList.toggle("show-menu");
  }
  if (changeBatchStartDateForm.classList.contains("show-menu")) {
    changeBatchStartDateForm.toggle("show-menu");
  }
  if (changeBatchCompletionDateForm.classList.contains("show-menu")) {
    changeBatchCompletionDateForm.toggle("show-menu");
  }
  if (changeBatchCompletionStatusForm.classList.contains("show-menu")) {
    changeBatchCompletionStatusForm.toggle("show-menu");
  }
});

//

//

changeBatchInstructorBtn.addEventListener("click", () => {
  changeBatchInstructorForm.classList.toggle("show-menu");
  if (changeClassTimeForm.classList.contains("show-menu")) {
    changeClassTimeForm.classList.toggle("show-menu");
  }
  if (changeBatchStartDateForm.classList.contains("show-menu")) {
    changeBatchStartDateForm.toggle("show-menu");
  }
  if (changeBatchCompletionDateForm.classList.contains("show-menu")) {
    changeBatchCompletionDateForm.toggle("show-menu");
  }
  if (changeBatchCompletionStatusForm.classList.contains("show-menu")) {
    changeBatchCompletionStatusForm.toggle("show-menu");
  }
});

//

changeBatchStartDateBtn.addEventListener("click", () => {
  changeBatchStartDateForm.classList.toggle("show-menu");
  if (changeClassTimeForm.classList.contains("show-menu")) {
    changeClassTimeForm.classList.toggle("show-menu");
  }
  if (changeBatchInstructorForm.classList.contains("show-menu")) {
    changeBatchInstructorForm.toggle("show-menu");
  }
  if (changeBatchCompletionDateForm.classList.contains("show-menu")) {
    changeBatchCompletionDateForm.toggle("show-menu");
  }
  if (changeBatchCompletionStatusForm.classList.contains("show-menu")) {
    changeBatchCompletionStatusForm.toggle("show-menu");
  }
});

//

changeBatchCompletionDateBtn.addEventListener("click", () => {
  changeBatchCompletionDateForm.classList.toggle("show-menu");
  if (changeClassTimeForm.classList.contains("show-menu")) {
    changeClassTimeForm.classList.toggle("show-menu");
  }
  if (changeBatchInstructorForm.classList.contains("show-menu")) {
    changeBatchInstructorForm.toggle("show-menu");
  }
  if (changeBatchStartDateForm.classList.contains("show-menu")) {
    changeBatchStartDateForm.toggle("show-menu");
  }
  if (changeBatchCompletionStatusForm.classList.contains("show-menu")) {
    changeBatchCompletionStatusForm.toggle("show-menu");
  }
});

//
changeBatchCompletionStatusBtn.addEventListener("click", () => {
  changeBatchCompletionStatusForm.classList.toggle("show-menu");
  if (changeClassTimeForm.classList.contains("show-menu")) {
    changeClassTimeForm.classList.toggle("show-menu");
  }
  if (changeBatchInstructorForm.classList.contains("show-menu")) {
    changeBatchInstructorForm.toggle("show-menu");
  }
  if (changeBatchStartDateForm.classList.contains("show-menu")) {
    changeBatchStartDateForm.toggle("show-menu");
  }
  if (changeBatchCompletionDateForm.classList.contains("show-menu")) {
    changeBatchCompletionDateForm.toggle("show-menu");
  }
});
