let changeFeeForm = document.querySelector(".change-fee-form");
let changeCourseFeeBtn = document.querySelector(".change-course-fee");

//

changeCourseFeeBtn.addEventListener("click", () => {
  changeFeeForm.classList.toggle("show-menu");
});
