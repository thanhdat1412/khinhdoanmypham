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
	
	function loginFromSocialCallBack($socialUser)
	{
		
		$result = mysqli_query($con,"select MaKH, TenKH, Email from khachhang where Email = ".$socialUser['email']."");
		if($result->num_rows==0)
		{
			$result = mysqli_query($con, "insert into khachhang(TenKH, Email) values(".$socialUser['name'].")");
			if(!$result)
			{
				echo mysqli_error($con);
				exit;
			}
				$result = mysqli_query($con, "select MaKH, TenKH, Email from khachhang where Email = ".$socialUser['Email']."");
		}
		if($result->num_rows>0)
		{
			$user = mysqli_fetch_assoc($result);
			if(session_status()==PHP_SESSION_NONE)
			{
				session_start();
			}
				$_SESSION['current_user'] = $user;
				header("localtion:../login.php");
		}
	}
?>