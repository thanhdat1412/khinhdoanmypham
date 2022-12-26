<?php

	class thaotac 
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
		function themxoasua($sql)
	{
		$link=$this->connect();
		if(mysqli_query($link, $sql))
		{
			return 1;
		}
		else
		{
			return 0;
		}		
	}


		public function laycot($sql)
		{
			$link=$this->connect();
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			@mysqli_close($link);
			$giatri='';
			if($i>0)
			{
				while($row=@mysqli_fetch_array($ketqua))
				{
					$id=$row[0];
					$giatri=$id;
				}
			}
			return $giatri;
		}
		public function danhsachtaikhoan($sql)
		{
			$link=$this->connect();
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			@mysqli_close($link);
			if($i>0)
			{
				echo '
				 <table width="1200" height="70" border="2" cellpadding="0">
	                 
	                    <tr>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">STT</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Số điện thoại</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Mật khẩu</td>
						   <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Thao tác</td>
                        </tr>';
				$dem=1;
				while($row=@mysqli_fetch_array($ketqua))
				{
					$SDT=$row['SDT'];
					$MatKhau=$row['MatKhau'];
					
					echo'<tr>
	                      <td><a href="?id='.$SDT.'">'.$dem.'</a></td>
						  <td><a href="?id='.$SDT.'">'.$SDT.'</a></td>
	                      <td><a href="?id='.$SDT.'">'.$MatKhau.'</a></td>
						  <td><a href="?id='.$SDT.'">
						  <button style="border:0; color:blue;margin-left:2px;"><i class="fas fa-check"></i></button>
						  <button style="border:0; color:red;margin-left:2px;"><i class="fas fa-times" name="xoataikhoan" value="xoataikhoan"></i></button>
						  </a></td>
                        </tr>';
                 $dem++;
				}
	                  
               echo '</table>';
			}
			else
				{
					echo 'Dữ liệu đang được cập nhật!';
				}
		}
	}
?>