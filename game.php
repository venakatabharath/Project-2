<?php
session_start();
if(!isset($_SESSION['use']))   // Checking whether the session is already there or not if 
    // true then header redirect it to the home page directly 
{
header("Location:login.php"); 
}
?>
<?php
$name = $_SESSION['use'];
 include 'game_data.php';
$question_page = "level0.php";

$me = "";
$ans = array();
?>

<?php
/*if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
//echo $_POST['ans'];
$me = $_POST['ans'];

}*/

if(isset($_SESSION['use'])){
function writedata($data,$level,$name){
    $file = fopen("U_scorefiles/score_data".$name.".txt", "w");
    //echo "U_scorefiles/score_data".$name.".txt";
    if($level<=9){
        fputs($file,$data.";".$level."\r\n");
    }else{
        fclose($file);
        $s =  score_r($data);
        upd_leaderboard($s,$name);
        header("Location:index.php");

    }
    fclose($file);
    ///echo $_POST["user"];

}
function readdata($data,$name){
    
    $file = fopen("U_scorefiles/score_data".$name.".txt", "r");
    $good=false;
        while(!feof($file)){
            $line = fgets($file);
            $array = explode(";",$line);
            //echo $array[0];
            $level = (int)$array[1];
            $level = $level;
            //echo $level;
            fputs($file,$level.";"."\r\n");
            if($level <= 9){
                $s = score_r($name);
                if(trim(($array[0]) == $_POST['ans']) && $level > 0){
                    
                    score_w($s+1,$name);
                }else{ score_w($s+0,$name);}
                }
                else{
                    $s = score_r($name);
            
                    header("Location:index.php");
                }
            fclose($file);
            break;
       /* if(trim($array[0]) == $_POST['ans']){
                $good=true;
                echo 1;
                break;
            }*/
        }
      
    return $level;
}

function score_w($data,$name){
    $file = fopen('U_scorefiles/levelscore_data'.$name.'.txt', 'w');
    fputs($file,$data.";"."\r\n");
    fclose($file);
}
function score_r($name){
    $file = fopen('U_scorefiles/levelscore_data'.$name.'.txt', 'r');
    $line = fgets($file);
    $array = explode(";",$line);
    //fputs($file,$data.";"."\r\n");
    fclose($file);
    return (int)$array[0];
}
function upd_leaderboard($data,$name){
    $reading  = fopen('leaderboard_data.txt','r');
    $writing = fopen('leaderboard_data_tmp.txt', 'w'); /// session name need to be used
    while(!feof($reading)){
        $line = fgets($reading);
        $array = explode(";",$line);
        if($array[0] == $name){    //// update with session
            $array[1] = $data;
            $line = $array[0].";".$array[1]."\r\n";
            $replaced = true;
        }  
        fputs($writing,$line); 

    }
    fclose($reading);fclose($writing);
    if ($replaced){
        rename('leaderboard_data_tmp.txt', 'leaderboard_data.txt');
    }else{unlink('leaderboard_data_tmp.txt');}

   /* $file = fopen('leaderboard_data.txt', 'a');
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
        if($array[0] == $_SESSION['usr']){
            $array[1] = $data;
            break;
        }
    break;
    }*/
}

}

?>

<html>
<head>
<style>
.button:hover  {
  opacity: 1;
  right: 0;
}
body{
    background: -webkit-linear-gradient(70deg, #fff810  30%, rgba(0,0,0,0) 30%), -webkit-linear-gradient(30deg, #63e89e 60%, #ff7ee3 60%);
    background: -o-linear-gradient(70deg, #fff810  30%, rgba(0,0,0,0) 30%), -o-linear-gradient(30deg, #63e89e 60%, #ff7ee3 60%);
    background: -moz-linear-gradient(70deg, #fff810  30%, rgba(0,0,0,0) 30%), -moz-linear-gradient(30deg, #63e89e 60%, #ff7ee3 60%);
    background: linear-gradient(70deg, #fff810  30%, rgba(0,0,0,0) 30%), linear-gradient(30deg, #63e89e 60%, #ff7ee3 60%);
}
</style>   

</head>
<body>

<div class="question">
<?php 



if(isset($_POST['login'])){
   $level = readdata($ans,$_SESSION['use']); 
  // echo "\n".$level;
  
   $question_page = "level".$level.".php";
   
}
if(!isset($_SESSION['use'])){
    header("Location:login.php"); 
}
include $question_page;

//$level = readdata($ans); 
//echo "level".$level;
writedata($answer,(int)$level+1,$_SESSION['use']);
if($level == ""){
    score_w(0,$_SESSION['use']);
}

//echo $answer;






echo  $me;

?>




</div>
</body>
</html>
