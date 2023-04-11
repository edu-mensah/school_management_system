const changeStudentCourseForm = document.querySelector(
  ".change-student-course-form"
);
const changeStudentCourseBtn = document.querySelector(".change-student-course");

//

const changeStudentBatchForm = document.querySelector(
  ".change-student-batch-form"
);
const changeStudentBatchBtn = document.querySelector(".change-student-batch");

//

changeStudentCourseBtn.addEventListener("click", () => {
  changeStudentCourseForm.classList.toggle("show-menu");
  if (changeStudentBatchForm.classList.contains("show-menu")) {
    changeStudentBatchForm.classList.remove("show-menu");
  }
});

//

//

//

changeStudentBatchBtn.addEventListener("click", () => {
  changeStudentBatchForm.classList.toggle("show-menu");
  if (changeStudentCourseForm.classList.contains("show-menu")) {
    changeStudentCourseForm.classList.remove("show-menu");
  }
});
