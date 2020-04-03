<?php

session_start();
$message = '';

    $hash='';
if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
    // true then header redirect it to the home page directly 
{
header("Location:index.html"); 
}
else
{
//include 'http://codd.cs.gsu.edu/~vmalapati1/Project-2-phpgame/login.html';
//header("Location:http://codd.cs.gsu.edu/~vmalapati1/Project-2-phpgame/index.html");
echo "error";
header("Location:index.html");
}
/*if (isset($_POST['submit']) ) {
    $db = mysqli_connect('localhost', 'root', 'root', 'php');
   $sql = 'SELECT * FROM users';
    $result=mysqli_query($db,$sql);
    foreach($result as $row)         
    
              $hash = $row['password'];
        $isAdmin = $row['isAdmin'];
    
        if (password_verify($_POST['password'], $hash)) {
           
            $message = 'Login successful';

           // $_SESSION['user'] = $row['name'];
           // $_SESSION['isAdmin'] = $isAdmin;

        } else {
            $message = 'login failed';
     
        }
    
    mysqli_close($db);
}*/
if(isset($_POST['submit']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];

    if(isset($_POST["user"]) && isset($_POST["pass"])){
    $file = fopen('data.txt', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
    if(trim($array[0]) == $_POST['user'] && trim($array[1]) == $_POST['pass']){
            $good=true;
            break;
        }
    }

    if($good){
    $_SESSION['use'] = $user;
       // echo '<script type="text/javascript"> window.open("home.php","_self");</script>';  
       header("Location:index.html");
    }else{
        $message =  "invalid UserName or Password";
        echo "Invalid UserName or Password";
    }
    fclose($file);
    }
    else{
        include 'login.php';
    }

}



?>

       <!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
echo "<p>$hash</p>";


echo "<p>$message</p>";
?>
<form method="post" action="">
    User name <input type="text" name="name"><br>
    Password <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Login">
</form>

</body>
</html>