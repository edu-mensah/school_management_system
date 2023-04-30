let changeFeeForm = document.querySelector(".change-fee-form");
let changeCourseFeeBtn = document.querySelector(".change-course-fee");


// 
let moduleForm = document.querySelector(".module-form");
let addModuleBtn = document.querySelector(".add-module");
//

changeCourseFeeBtn.addEventListener("click", () => {
  changeFeeForm.classList.toggle("show-menu");
  if (moduleForm.classList.contains("show-menu")) {
    moduleForm.classList.toggle("show-menu");
  }
});


// 

addModuleBtn.addEventListener("click", () => {
  moduleForm.classList.toggle("show-menu");
  if (changeFeeForm.classList.contains("show-menu")) {
    changeFeeForm.classList.toggle("show-menu");
  }
});