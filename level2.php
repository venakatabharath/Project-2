<?php
session_start();


$answer = "1";
//include "level1.php";
?>
<head>
<link rel="stylesheet" type="text/css" href="levels.css">

</head>
<form class="form0"action="" method="post">
<h2 class="question0">When was the Gunpoeder plot?</h2>
<h2 class="time"><br><span id="counter">30</span></h2>

<div class = "flex-container">   
<div class="q1">   
<input type="radio" name="ans" value="1" class="button" id="M" ></input>
<label for="M"> 1605</label><br>
</div>
<div class="q2">
<input type="radio" name="ans" value="2" class="button" id="N"></input>
<label for="N"> 1955</label><br>
</div>
</div>
<div class = "flex-container">   
  <div class="q1">  
<input type="radio" name="ans" value="3" class="button" id="O"></input>
<label for="O"> 1588</label><br>
</div>
<div class="q2">
<input type="radio" name="ans" value="4" class="button" id="P"></input>
<label for="P"> 1772</label><br>
</div>
</div>
<div class = "flex-container">   
  <div class=>  
<input type="submit" name="login" value="SUBMIT">
</div>
</div>
</form>

<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = 'index.php';
    }
if (parseInt(i.innerHTML)!=0) {
    i.innerHTML = parseInt(i.innerHTML)-1;
}
}
setInterval(function(){ countdown(); },1000);
</script>
<?php
//echo $m;
?>