let changeCourseForm = document.querySelector(".change-course-form");
let changeInstructorCourseBtn = document.querySelector(
  ".change-instructor-course"
);

//

changeInstructorCourseBtn.addEventListener("click", () => {
  changeCourseForm.classList.toggle("show-menu");
});
