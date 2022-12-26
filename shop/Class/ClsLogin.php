<?php
	class login
	{	
	private	function connect()
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
//
	public	function loaddulieu($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			while($row=@mysqli_fetch_array($ketqua))
			{
				$SDT=$row["SDT"];
				$mk=$row["MatKhau"];
				echo $SDT;
				echo '<br>';
				echo $mk;
				
			}	
		}
		else
			{
			echo"‘Không có dữ liệu";
			}
		
	}

		public function mylogin($sdt,$matkhau)
		{
			$matkhau=md5($matkhau);
			$link=$this->connect();
			$sql="select SDT,MatKhau from taikhoankh where SDT='".mysqli_real_escape_string($link,$sdt)."' and MatKhau='$matkhau' limit 1"; 
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			@mysqli_close($link);
			if($i==1)
				{
					while($row=@mysqli_fetch_array($ketqua))
					{
						$sdt=$row['SDT'];	
						$matkhau=$row['MatKhau'];
						session_start();
						$_SESSION['sdt']=$sdt;
						$_SESSION['matkhau']=$matkhau;
					}
					return 1;
				}
				else
				{
					return 0;
				}
		}
		 function confirmlogin($sdt,$matkhau)
			 {
				$link=$this->connect();	 
				$sql="select SDT,MatKhau from taikhoankh where SDT='".mysqli_real_escape_string($link,$sdt)."' and MatKhau='$matkhau' limit 1"; 
				$ketqua=mysqli_query($link,$sql);
				$i=mysqli_num_rows($ketqua);
				if($i!=1)
				{
					header("location:login.php");
				}
			 }

	}
?>