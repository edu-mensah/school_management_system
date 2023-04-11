const changeCourseForm = document.querySelector(".change-course-form");
const changeInstructorCourseBtn = document.querySelector(
  ".change-instructor-course"
);

//

changeInstructorCourseBtn.addEventListener("click", () => {
  changeCourseForm.classList.toggle("show-menu");
});
