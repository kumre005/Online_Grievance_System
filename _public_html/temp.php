<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website Coming Soon Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="container">
      <img src="image.jpg" alt="" class="image" />
      <header>Coming Soon Page</header>
      <p>
        Our website is under construction. We're working hard to improve our
        website and we'll be ready to launch in:
      </p>
      <div class="time-content">
        <div class="time days">
          <span class="number" id="days"></span>
          <span class="text">days</span>
        </div>
        <div class="time hours">
          <span class="number" id="hours"></span>
          <span class="text">hours</span>
        </div>
        <div class="time minutes">
          <span class="number" id="minutes"></span>
          <span class="text">minutes</span>
        </div>
        <div class="time seconds">
          <span class="number" id="seconds"></span>
          <span class="text">seconds</span>
        </div>
      </div>

    

      
      </div>
    </section>

    <!-- JavaScript -->
 
  



<!-- JavaScript -->
<script >
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

  if (secValue === 0) {
    clearInterval(timeFunction); // Stop the timer when it reaches 0
    window.location.href = 'index1.php';
    return; // Stop further execution
  }

  seconds.textContent = secValue < 10 ? `0${secValue}` : secValue;
  minutes.textContent = minValue < 10 ? `0${minValue}` : minValue;
  hours.textContent = hourValue < 10 ? `0${hourValue}` : hourValue;
  days.textContent = dayValue < 10 ? `0${dayValue}` : dayValue;
}, 1000); // 1000ms = 1s

</script>

</body>
</html>
