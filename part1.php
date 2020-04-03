<!DOCTYPE html>
<html>
<body>
	<?php
	function isBitten()
	{
		$c=rand(1,100);
		echo $c;
		echo"<br>";
		echo"<br>";
		if($c%2==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	$r=isBitten();
	if($r==true)
	{	
		echo"Charlie ate my lunch!";
	}
	else
	{	
		echo"Charlie did not eat my lunch!";
	} 
	?>
</body>
</html>