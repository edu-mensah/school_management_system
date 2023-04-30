let increaseQuantityForm = document.querySelector(".increase-quantity-form");
let increaseQuantityBtn = document.querySelector(".increase-quantity-btn");

//

increaseQuantityBtn.addEventListener("click", () => {
  increaseQuantityForm.classList.toggle("show-menu");
});
