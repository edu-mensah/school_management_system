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
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
  "Sunday",
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

dashboardTime.textContent = `${
  daysOfTheWeek[dayofTheWeek - 1]
}, ${dayOfTheMonth} ${monthsOfTheYear[monthOfTheYear]} ${numberOfTheYear}`;

//

// toggle

//
