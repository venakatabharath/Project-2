<?php
$message = "";
$regsuccess = "";
$nameErr = $passErr = $emailErr = "";
$name = $pass = $email = "";

// $baseurl = 'http://codd.cs.gsu.edu/~vmalapati1/Project-2-phpgame/';
if(isset($_POST["user"]) && isset($_POST["pass"]))
{
  if (empty($_POST["user"])) 
  {
    $nameErr = "Name is required";
  } else
   {
    $name = test_input($_POST["user"]);
    if (!preg_match('/^[a-zA-Z0-9]*$/',$name)) 
    {
      $nameErr = "Only letters,Numbers and white space allowed";
    }
  }

  if (empty($_POST["pass"]))
    {
       $passErr = "password is required";
    }
  else
  {
    $pass = test_input($_POST["pass"]);
    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@',$pass);
    $number    = preg_match('@[0-9]@', $pass);

  if(!$uppercase || !$lowercase || !$number) 
  {
  // tell the user something went wrong
      $passErr = "Password should contain lowercase,uppercase,interger";
  }
  else
      {
        $passErr = "";
      }
    }

  if($passErr == "" && $nameErr == "")
  {
    // check if user exist.
      $file=fopen("users_data.txt","r");
      $finduser = false;
      while(!feof($file))
      {
          $line = fgets($file);
          $array = explode(";",$line);
          if(trim($array[0]) == $_POST['user'])
          {
              $finduser=true;
              break;
          }
      }
      fclose($file);

      // register user or pop up message
      if( $finduser )
      {
          echo $_POST["user"];
          echo ' existed!\r\n';
          $message = "user already exits try another name";
          //include 'register.php';
      }
      else
      {
          $file = fopen("users_data.txt", "a");

          fputs($file,$_POST["user"].";".$_POST["pass"]."\r\n");
          fclose($file);
          echo $_POST["user"];
          $regsuccess = "registered sucessfullly";
          //echo " registered successfully!";r
          
          $file  = fopen("leaderboard_data.txt","a");
          fputs($file,$_POST["user"].";"."0"."\r\n");
          fclose($file);     
      }
   } 
}


function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Reg Page   </title>
<style>
.error {color: #FF0000;}


</style>
<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body><div class="form-style-5">
<h1 class="h1"> Register Here!!!!</h1>
<img src="images/register_logo.jpeg" alt="Registration">
<br><br>
<form action="" method="post">
    
  
    <label class='label'>  UserName</label>
    <span class="error">* <?php echo $nameErr;?></span>
     <input type="text" name="user" > 
    <label class='label'>PassWord  </label>
    <span class="error">* <?php echo $passErr;?></span>
   <input type="password" name="pass">
    
  
   <input type="submit" name="reg" value="REG"></td>
    
  
<?php if($message!="") { echo $message; } 
echo "<br>";
if($regsuccess!=""){ echo "<a href = 'login.php'>login</a>";echo "click to login";
}?>
</form>
</div>


</body>
</html>