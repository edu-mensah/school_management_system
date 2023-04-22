let changeStudentCourseForm = document.querySelector(
  ".change-student-course-form"
);
let changeStudentCourseBtn = document.querySelector(".change-student-course");

//

let changeStudentBatchForm = document.querySelector(
  ".change-student-batch-form"
);
let changeStudentBatchBtn = document.querySelector(".change-student-batch");

//

changeStudentCourseBtn.addEventListener("click", () => {
  changeStudentCourseForm.classList.toggle("show-menu");
  if (changeStudentBatchForm.classList.contains("show-menu")) {
    changeStudentBatchForm.classList.remove("show-menu");
  }
});

//

//

changeStudentBatchBtn.addEventListener("click", () => {
  changeStudentBatchForm.classList.toggle("show-menu");
  if (changeStudentCourseForm.classList.contains("show-menu")) {
    changeStudentCourseForm.classList.remove("show-menu");
  }
});
