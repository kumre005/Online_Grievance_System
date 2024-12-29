

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Emoji Stars Rating | CodingNepal</title>
    <link rel="stylesheet" href="assets/feedbackstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  
</head>

<body>
    <div class="col-sm-12 main">
    <div class="headline">
    <h1>"Share Your Thoughts: Help Us Improve with Your Feedback"</h1>
    </div>
  <div class="wrapper">
       <form action="process_feedback.php" method="post">
    <input type="radio" name="rate" value="1" id="star-1">
    <input type="radio" name="rate" value="2" id="star-2">
    <input type="radio" name="rate" value="3" id="star-3">
    <input type="radio" name="rate" value="4" id="star-4">
    <input type="radio" name="rate" value="5" id="star-5">
    <div class="content">
      <div class="outer">
        <div class="emojis">
          <li class="slideImg"><img src="emojis/emoji-1.png" alt=""></li>
          <li><img src="emojis/emoji-2.png" alt=""></li>
          <li><img src="emojis/emoji-3.png" alt=""></li>
          <li><img src="emojis/emoji-4.png" alt=""></li>
          <li><img src="emojis/emoji-5.png" alt=""></li>
        </div>
      </div>
      <div class="stars">
        <label for="star-1" class="star-1 fas fa-star"></label>
        <label for="star-2" class="star-2 fas fa-star"></label>
        <label for="star-3" class="star-3 fas fa-star"></label>
        <label for="star-4" class="star-4 fas fa-star"></label>
        <label for="star-5" class="star-5 fas fa-star"></label>
      </div>
    </div>
    <div class="footer">
      <span class="text"></span>
      <span class="numb"></span>
    </div>
    <div class="feedbackdetail" style="text-align:center;height:12em;">
       
    <label for="feedback">Your Feedback:</label><br>
   
    <textarea id="feedback" name="feedback" rows="4" cols="50" style="    border-radius: 15px;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px"></textarea><br><br>
       <input class="feedbacksubmit" type="submit" value="Submit Feedback">
     </div>
</form>
  </div>
  </div>
  
 
    

</body>
</html>

