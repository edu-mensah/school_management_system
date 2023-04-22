/*


Dashboard Date and time 


*/
const dashboardTime = document.querySelector(".date-text");

const dateTime = new Date();
const dayofTheWeek = dateTime.getDay();
const dayOfTheMonth = dateTime.getDate();
const monthOfTheYear = dateTime.getMonth();
const numberOfTheYear = dateTime.getFullYear();

const daysOfTheWeek = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
];

const monthsOfTheYear = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "Novemebr",
  "December",
];

dashboardTime.textContent = `${daysOfTheWeek[dayofTheWeek]}, ${dayOfTheMonth} ${monthsOfTheYear[monthOfTheYear]} ${numberOfTheYear}`;

//

// toggle

//



// 
// let sBox = document.querySelector('.s-message-box');
// let eBox = document.querySelector('.e-message-box');

// if (sBox.textContent =! '') {
//   sBox.classList.add('box-pop')
// }


// if ((eBox.textContent =! "")) {
//   eBox.classList.add("box-pop");
// }