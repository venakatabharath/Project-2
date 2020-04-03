<?php session_start();?>
<?php
$message = "";

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
  {
    header("Location:index.php"); 
  }
$nameErr = $passErr = $emailErr = "";
$name = $pass = $email = "";
if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
  if (empty($_POST["user"])) 
    {
        $nameErr = "Name is required";
    } 
  if (empty($_POST["pass"]))
  {
      $passErr = "Password is required";
    }
  if($passErr == "" && $nameErr == "")
  {
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      if(isset($_POST["user"]) && isset($_POST["pass"]))
      {
        $file = fopen('users_data.txt', 'r');
        $good=false;
      while(!feof($file))
      {
          $line = fgets($file);
          $array = explode(";",$line);
      if(trim($array[0]) == $_POST['user'] && trim($array[1]) == $_POST['pass'])
        {
              $good=true;
              break;}
      }
      if($good)
      {
          $_SESSION['use'] = $user;
          // echo '<script type="text/javascript"> window.open("home.php","_self");</script>';  
          header("Location:index.php");
        }
      else
      {
          $message =  "invalid UserName or Password";
          echo "Invalid UserName or Password";
        } 
      fclose($file);
      }
  }
}
?>



<html>
<head>
<title> Login Page   </title>
<style>
.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body><div class="form-style-5">
<h1 class="h1"> Login Here </h1>
<img src="images/login.png" alt="Registration">
<br><br>
<form action=" " method="post">
    <label class='label'>Username</label>
    <span class="error">* <?php echo $nameErr;?></span>
    <input type="text" name="user" > 
    
    <label class='label'>Password</label>
    <span class="error">* <?php echo $passErr;?></span>
    <input type="password" name="pass">
    

   <input type="submit" name="login" value="LOGIN">
  

<a href = 'register.php'>Register/Signup</a>
<p><?php if($message!="") { echo $message; } ?></p>
</form>
