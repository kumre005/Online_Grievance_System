const seconds = document.querySelector(".seconds .number"),
  minutes = document.querySelector(".minutes .number"),
  hours = document.querySelector(".hours .number"),
  days = document.querySelector(".days .number");

let secValue = 10,
  minValue = 0,
  hourValue = 0,
  dayValue = 0;

const timeFunction = setInterval(() => {
  secValue--;

  if (secValue == 0) {
   
     clearInterval(timer); // Stop the timer when it reaches 0
      window.location.href = 'index1.php';
  }

  seconds.textContent = secValue < 10 ? `0${secValue}` : secValue;
  minutes.textContent = minValue < 10 ? `0${minValue}` : minValue;
  hours.textContent = hourValue < 10 ? `0${hourValue}` : hourValue;
  days.textContent = dayValue < 10 ? `0${dayValue}` : dayValue;
}, 1000); //1000ms = 1s
