<?php
include("clsupfile.php");

	class control extends myupfile
	{	
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
//
	public	function loadthuonghieu($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			while($row=@mysqli_fetch_array($ketqua))
			{
				$math=$row["MaTH"];
				$tenthuonghieu=$row["TenThuongHieu"];
				$xuatxu=$row["XuatXu"];
				echo '<a href="index.php?id='.$math.'">'.$tenthuonghieu.'</a>';
				echo '<br>';
					
			}	
		}
		else
			{
			echo"‘Không có dữ liệu";
			}
		
	}

		public	function loadsanpham($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			while($row=@mysqli_fetch_array($ketqua))
			{
				$masp=$row["MaSP"];
				$tensp=$row["TenSP"];
				$gia=$row["Gia"];
				$tenthuonghieu=$row["TenThuongHieu"];
				$xuatxu=$row["XuatXu"];
				$img=$row["Anh"];
				
				echo '<div class="col-md-3 text-center animate-box">
					<div class="product">
						<form action="cartweb.php?idcart='.$masp.'" method="post">
						<div class="product-grid" style="background-image:url(images/'.$img.');">
						
							<div class="inner">
								<p>
									
									<button type="submit" name="muangay" style="border:0;padding:2px 12px 2.1px 10px;" class="icon"><i class="icon-shopping-cart"></i></button>
									<a href="chitietsanpham.php?id='.$masp.'" class="icon"><i class="icon-eye"></i></a>
										<input type="hidden" name="TenSP" value="'.$tensp.'"/>
										<input type="hidden" name="idsanpham" value="'.$masp.'"/>
										<input type="hidden" name="Anh" value="'.$img.'"/>
										<input type="hidden" name="Gia" value="'.number_format($gia).'"/>
								</p>
							</div>
						
						</div>
						</form>
						<div class="desc">
							<h3><a href="chitietsanpham.php?id='.$masp.'">'.$tensp.'</a>
							</h3>
							
							<span class="price">'.number_format($gia).'₫</span>
						</div>
						
					</div>
				</div>';
				
			}	
		}
		else
			{
			echo"‘Không có dữ liệu";
			}
		
	}
		public	function loadchitietsanpham($sql)
		{
			$link=$this->connect();
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			@mysqli_close($link);
			if($i>0)
			{
				while($row=@mysqli_fetch_array($ketqua))
				{
					$masp=$row["MaSP"];
					$tensp=$row["TenSP"];
					$gia=$row["Gia"];
					$tenthuonghieu=$row["TenThuongHieu"];
					$xuatxu=$row["XuatXu"];
					$img=$row["Anh"];
					$thanhphan=$row["ThanhPhan"];
					$hdsd=$row["HuongDanSuDung"];
					echo '
						<div id="fh5co-product">
							<div class="container">
								<div class="row">
									<div class="col-md-10 col-md-offset-1 animate-box">
										<div class="owl-carousel owl-carousel-fullwidth product-carousel">
											<div class="item">
												<div class="active text-center">
													<figure>
														<img src="images/'.$img.'" alt="user">
													</figure>
												</div>
											</div>
											<div class="item">
												<div class="active text-center">
													<figure>
														<img src="images/'.$img.'" alt="user">
													</figure>
												</div>
											</div>

										</div>
										<div class="row animate-box">
											<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
												<h2>'.$tensp.'</h2>
												<p>
												<form id="add-to-cart" action="cartweb.php?action=add" method="POST">
													<input type="text" value="1" name="quantity['.$masp.']"size="2"/>
													
													<input type="submit" class="btn btn-primary btn-outline btn-lg" value="Thêm vào giỏ hàng" />
												</form>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="fh5co-tabs animate-box">
											<ul class="fh5co-tab-nav">
												<li>
												&nbsp;
												</li>
												<li class="active">
												<h3 style="align:center">
												<a href="#" data-tab="1" style="padding:10px;background-color: #f2f2f2;"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs" >CHI TIẾT SẢN PHẨM</span></a>
												</h3>
												</li>
												
											</ul>

											<!-- Tabs -->
											<div class="fh5co-tab-content-wrap">

												<div class="fh5co-tab-content tab-content active" data-tab-content="1">
													<div class="col-md-10 col-md-offset-1">
														<span class="price">SRP: '.number_format($gia).'</span>
														<h2>'.$tensp.'</h2>
														<p>Thành phần: '.$thanhphan.'</p>

														<p>Hướng dẫn sử dụng: '.$hdsd.'.</p>

														<div class="row">
															<div class="col-md-6">
																<h2 class="uppercase">Xuất xứ</h2>
																<p>'.$xuatxu.'</p>
															</div>
															<div class="col-md-6">
																<h2 class="uppercase">Thương hiệu</h2>
																<p>'.$tenthuonghieu.'</p>
															</div>
														</div>

													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					';
				}
			}
			else
			{
				echo"‘Không có dữ liệu";
			}
		}
		public function loadcombo_thuonghieu($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			echo '<select name="thuonghieu" id="thuonghieu">';
			echo '<option  style="font-family: Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman";">Mời chọn thương hiệu</option>';
			while($row=@mysqli_fetch_array($ketqua))
			{
				$math=$row['MaTH'];
				$TenTH=$row['TenThuongHieu'];
					echo '<option value="'.$math.'" selected="selected" style="font-family: fantasy;">'.$TenTH.'</option>';

			}
			echo '</select>';
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
		 public function sotrang($sql)
		 {
			$link=$this->connect();
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			@mysqli_close($link);
			return $i;
		 }
		public function danhsachsanpham($sql)
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
	                      <td align="left" class="alert-default-secondary" width="10" style="font-weight: 900;border: 1px solid">STT</td>
	                      <td align="left" class="alert-default-secondary" width="20" style="font-weight: 900;border: 1px solid">Mã Sản phẩm</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Tên sản phẩm</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Giá sản phẩm</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Tên thương hiệu</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Xuất xứ</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Nơi sản xuất</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Loại da</td>
	                      <td align="left" class="alert-default-secondary" width="50"style="font-weight: 900;border: 1px solid">Đặc tính</td>
	                      <td align="left" class="alert-default-secondary" width="50"style="font-weight: 900;border: 1px solid">Vấn dề về da</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Thành phần</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Hướng dẫn sử dụng</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Ảnh</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Số lượng</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Mã nhân viên</td>
                        </tr>';
				$dem=1;
				while($row=@mysqli_fetch_array($ketqua))
				{
					$masp=$row['MaSP'];
					$tensp=$row['TenSP'];
					$gia=$row['Gia'];
					$tenth=$row['TenThuongHieu'];
					$xuatxu=$row['XuatXu'];
					$noisx=$row['NoiSanXuat'];
					$loaida=$row['LoaiDa'];
					$dactinh=$row['DacTinh'];
					$vandevd=$row['VanDeVeDa'];
					$thanhphan=$row['ThanhPhan'];
					$huongdansd=$row['HuongDanSuDung'];
					$anh=$row['Anh'];
					$soluong=$row['SoLuong'];
					$manv=$row['MaNV'];
					echo'<tr>
	                      <td><a href="?id='.$masp.'">'.$dem.'</a></td>
						  <td><a href="?id='.$masp.'">'.$masp.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$tensp.'</a></td>
	                      <td><a href="?id='.$masp.'">'.number_format($gia).'</a></td>
	                      <td><a href="?id='.$masp.'">'.$tenth.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$xuatxu.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$noisx.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$loaida.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$dactinh.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$vandevd.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$thanhphan.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$huongdansd.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$anh.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$soluong.'</a></td>
	                      <td><a href="?id='.$masp.'">'.$manv.'</a></td>
						 
	                      
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
		public	function loadttcanhan($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			while($row=@mysqli_fetch_array($ketqua))
			{
				$tenKH=$row["TenKH"];
				$gioitinh=$row["GioiTinh"];
				$ngaysinh=$row["NgaySinh"];
				$sdt=$row["SDT"];
				$email=$row["Email"];
				$diachi=$row["DiaChi"];
				
				echo '<div id="fh5co-contact">
						<div class="container">
							<div class="row">
								<div class="col-md-5 col-md-push-1 animate-box">

									<div class="fh5co-contact-info">
										<h3>THÔNG TIN LIÊN HỆ</h3>
										<ul>
											<li class="address">116 Nguyễn Văn Lượng, <br> Gò Vấp, Thành phố Hồ Chí Minh</li>
											<li class="phone"><a href="tel://0926366827">+ 0926366827</a></li>
											<li class="email"><a href="mailto:guyentritinh6827@gmail.com">nguyentritinh6827@gmail.com</a></li>
											<li class="url"><a href="http://gettemplates.co">getmyworld.co</a></li>
										</ul>
									</div>

								</div>
								<div class="col-md-6 animate-box">
									<h3>THÔNG TIN KHÁCH HÀNG</h3>
									<form action="#">
										<div class="row form-group">
											<div class="col-md-12">
												<!-- <label for="fname">Họ tên</label> -->
												<input type="text" id="fname" class="form-control" readonly placeholder="'.$tenKH.'">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-md-12">
												<!-- <label for="email">Email</label> -->
												<input type="text" id="email" class="form-control" readonly placeholder="'.$email.'">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-md-12">
												<!-- <label for="subject">Subject</label> -->
												<input type="text" id="subject" class="form-control" readonly placeholder="'.$sdt.'">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-md-12">
												<!-- <label for="subject">Giới Tính</label> -->
												<input type="text" id="subject" class="form-control" readonly placeholder="'.$gioitinh.'">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-12">
												<!-- <label for="subject">Ngáy Sinh</label> -->
												<input type="text" id="subject" class="form-control" readonly placeholder="'.$ngaysinh.'">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-12">
												<!-- <label for="subject">Địa Chỉ</label> -->
												<input type="text" id="subject" class="form-control" readonly placeholder="'.$diachi.'">
											</div>
										</div>

									</form>		
								</div>
							</div>

						</div>
					</div>';
				
			}	
		}
		else
			{
			echo"‘Không có dữ liệu";
			}
		
	}
		public function danhsachdonhang($sql)
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
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Order_ID</td>
	                      <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Mã sản phẩm</td>
						  <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Số lượng</td>
						  <td align="left" class="alert-default-secondary" style="font-weight: 900;border: 1px solid">Giá</td>
                        </tr>';
				$dem=1;
				while($row=@mysqli_fetch_array($ketqua))
				{
					$order=$row['Order_ID'];
					$MaSP=$row['MaSP'];
					$sl=$row['SoLuong'];
					$Gia=$row['Gia'];
					echo'<tr>
	                      <td><a href="?id='.$order.'">'.$dem.'</a></td>
						  <td><a href="?id='.$order.'">'.$order.'</a></td>
	                      <td><a href="?id='.$order.'">'.$MaSP.'</a></td>
						  <td><a href="?id='.$order.'">'.$sl.'</a></td>
						  <td><a href="?id='.$order.'">'.$Gia.'</a></td>
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