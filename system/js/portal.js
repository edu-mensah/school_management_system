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
