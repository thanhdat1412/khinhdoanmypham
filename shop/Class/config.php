<?php
	function connect()
	{				
		$con=mysqli_connect("localhost","mypham","123456789tinh","websitemypham");
  		if(!$con)
   		{
	   		die("Khong ket noi duoc den CSDL");
			exit();
		}
		else
		{			
			mysqli_set_charset($con,"utf8");
			return $con;
		}
	}
?>