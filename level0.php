<?php
session_start();


$answer = "4";

//include "level1.php";
?>
<head>
<link rel="stylesheet" type="text/css" href="levels.css">
<style>/*
input[type=radio],
input[type=checkbox] {
   display: none;
 }
.form0 input[type="radio"]:checked + label {
   background-color:#6DAC4FFF;
 }
label {
   display: block;
   appearance: button;
   -webkit-appearance: button;
   -moz-appearance: button;
   -ms-appearance: button;
   font-family: 'Roboto', sans-serif;
   font-weight: 400;
   background: #F65058FF;
   font-size: 1.4rem;
   color: white;
   border: 1px solid #AAAAAA;
   border-radius: 15px;
   padding: 8px;
   width: 60%;
   margin: 0 auto;
   text-align: center;
}
.form0 {
  padding: 0 16px;
  max-width: 750px;
  margin: 50px auto;
  font-size: 18px;
  font-weight: 600;
  line-height: 36px;
  border:1px solid black;
  background-color: white;
}
.form0 input[type="button"],
.form0 input[type="submit"]{
  
	-moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
	-webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
	box-shadow: inset 0px 1px 0px 0px #3985B1;
	background-color: #89ABE3FF;
	border: 1px solid white;
	display: inline-block;
	cursor: pointer;
	color: #FFFFFF;
	padding: 18px 18px;
	text-decoration: none;
	font: 12px Arial, Helvetica, sans-serif;
}
.form0 input[type="button"]:hover, 
.form0 input[type="submit"]:hover {
/*	background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);*/
	background-color: lightgreen;
}
.flex-container{
  display: flex;
  border: 2px solid black;
  justify-content: center;
 
}
.q1{
  margin: 10px;
width: 50%;
}
.q2{
  margin: 10px;
width: 50%;
}
.time{
  text-align: center;
  width: 100px;
      height: 100px;
      color: #89ABE3FF;
      padding: 10px;
      border-radius: 50%;
      border: 3px solid #89ABE3FF ;
      margin: auto;
}
#counter{
  margin: auto;
  text-align: center;
  font-family:  sans-serif;
   font-size: 300%;
}
.question0{
  color: #28334AFF;
  font-family: sans-serif;
  text-align: center;
  background-color:white;
}*/
</style>
</head>
<form class="form0"action="" method="post">
<h3 class="question0">How many gaseous planets are present in the solor system?</h3>
<h2 class="time"><br><span id="counter">30</span></h2>

<div class = "flex-container">   
<div class="q1">   
<input type="radio" name="ans" value="2" class="button" id="M" ></input>
<label for="M"> 2</label><br>
</div>
<div class="q2">
<input type="radio" name="ans" value="4" class="button" id="N"></input>
<label for="N"> 4</label><br>
</div>
</div>
<div class = "flex-container">   
  <div class="q1">  
<input type="radio" name="ans" value="6" class="button" id="O"></input>
<label for="O"> 6</label><br>
</div>
<div class="q2">
<input type="radio" name="ans" value="8" class="button" id="P"></input>
<label for="P">8</label><br>
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
///setTimeout(function(){document.myform.submit();},1000);
</script>
<?php
function delaycommand($callback, $delaytime){
    sleep($delaytime);
    $callback();
}
function delay(){
if(!isset($_POST['login'])){
    $s =  score_r($data);
    upd_leaderboard($s);
    header("Location:index.php");
}}

?>