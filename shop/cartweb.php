
<?php
session_start();
	 include("Class/Clscontrol.php");
	$p=new control();
if(isset($_GET['cart']))
{
	$_SESSION['cart']=array();
}
$test = false;
$error = false;
$success = false;
if(isset($_GET['action']))
{
	function update_cart($add = false)
	{
		foreach ($_POST['quantity'] as $id =>$quantity)
			{
				if($quantity==0){
					unset($_SESSION['cart'][$id]);
				}
				else{
					if($add){
						$_SESSION['cart'][$id] += $quantity;
					}
					else{
						$_SESSION['cart'][$id] = $quantity;
					}
				}
				
			}
	}
	switch($_GET['action'])
	{
		case "add":
			
			update_cart(true);
			header("location:cartweb.php");
			break;
		case "delete":
			if(isset($_GET['id']))
			{
				unset($_SESSION['cart'][$_GET['id']]);
			}
			header("location:cartweb.php");
			break;
		case "submit": 
			if(isset($_POST['update_click'])){
				update_cart();
				header("location:cartweb.php");
			}else if(isset($_POST['order_click'])){
				
				if(empty($_POST['hoten']))
				{
					$error = "Bạn chưa nhập họ tên người nhận";
				} elseif(empty($_POST['diachi'])){
					$error = "Bạn chưa nhập địa chỉ người nhận";
				} elseif(empty($_POST['dienthoai'])){
					$error = "Bạn chưa nhập số điện thoại người nhận";
				} elseif(empty($_POST['email'])){
					$error = "Bạn chưa nhập email người nhận";
				}
				elseif(empty($_POST['quantity'])){
					$error = "Giỏ hàng rỗng";
				}
				if($error == false && !empty($_POST['quantity'])){
					$con = $p->connect();
					// var_dump(array_keys($_POST['quantity']));exit;
					$product = mysqli_query($con,"SELECT * FROM `sanpham` WHERE `MaSP` IN (".implode(",", array_keys($_POST['quantity'])).")");
					$total = 0;
					$orderProduct = array();
					 while($row=mysqli_fetch_array($product)){
						 $orderProduct[] = $row;
						 $total += $row['Gia'] * $_POST['quantity'][$row['MaSP']];
						
					 }
						$insertOrder =  mysqli_query($con,"INSERT INTO `order` (`ID`, `TenKH`, `SDT`, `DiaChi`,`Email`,`Total`) VALUES (Null, '".$_POST['hoten']."', '".$_POST['dienthoai']."', '".$_POST['diachi']."','".$_POST['email']."' ,'".$total."');");
						$orderID = $con->insert_id;
						$insertString = "";
						foreach($orderProduct as $key => $product)
						{
							$insertString .= "(Null, '".$orderID."', '".$product['MaSP']."','".$_POST['quantity'][$product['MaSP']]."' ,'".$product['Gia']."')";
							if($key != count($orderProduct) -1){
								$insertString .=",";
							}
						}
						$insertOrder = mysqli_query($con,"INSERT INTO `order_detail` (`ID`, `Order_ID`, `MaSP`, `SoLuong`,`Gia`) VALUES ".$insertString.";");
						$success = "Đặt hàng thành công";
					 	unset($_SESSION['cart']);
				}
			}
			
			
			break;
//		case "xacnhan":
//			if(isset($_GET['partnerCode']))
//			{	
//				$partnerCode = $_GET['partnerCode'];
//				$orderId = $_GET['orderId'];
//				$amount = $_GET['amount'];
//				$orderInfo = $_GET['orderInfo'];
//				$orderType = $_GET['orderType'];
//				$transId = $_GET['transId'];
//				$resultCode = $_GET['resultCode'];
//				$payType = $_GET['payType'];
//				if(isset($_POST['access_click']))
//				{
//					$con = $p->connect();
//					$insert_momo =  mysqli_query($con,"INSERT INTO `momo` (`id_momo`, `partner_code`, `order_id`, `amount`,`order_info`,`order_type`,`trans_id`,`pay_type`) VALUE(Null, '".$partnerCode."', '".$orderId.",'".$amount."' ,'".$orderInfo."','".$orderType."','".$transId."','".$payType."');");
//					
//				}
//			echo "thành công";
//			}
//			break;
			
	}
	
}
if(!empty($_SESSION['cart']))
{
		$con = $p->connect();
		$product = mysqli_query($con,"SELECT * FROM `sanpham` WHERE `MaSP` IN (".implode(",", array_keys($_SESSION['cart'])).")");
	
		//var_dump(array_keys($_SESSION['cart']));exit;
}
//if(isset($_GET['partnerCode']))
//	{	
		
//		$partnerCode = $_GET['partnerCode'];
//		$orderId = $_GET['orderId'];
//		$amount = $_GET['amount'];
//		$orderInfo = $_GET['orderInfo'];
//		$orderType = $_GET['orderType'];
//		$transId = $_GET['transId'];
//		$payType = $_GET['payType'];
		//$con = $p->connect();
//		$insert_momo =  mysqli_query($con,"INSERT INTO `momo` (`id_momo`, `partner_code`, `order_id`, `amount`,`order_info`,`order_type`,`trans_id`,`pay_type`) VALUE(Null, '".$partnerCode."', '".$orderId.",'".$amount."' ,'".$orderInfo."','".$orderType."','".$transId."','".$payType."');");
//	var_dump($insert_momo);exit;
//		$p->themxoasua("INSERT INTO `momo` (`id_momo`, `partner_code`, `order_id`, `amount`,`order_info`,`order_type`,`trans_id`,`pay_type`) VALUE(Null, '".$partnerCode."', '".$orderId.",'".$amount."' ,'".$orderInfo."','".$orderType."','".$transId."','".$payType."')");
		
	//}

	
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SHOP MỸ PHẨM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->
	

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
		
<script type="text/javascript" src="js/solid.min.js"></script>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/fontawesome.min.js"></script>
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="index.php" style="font-family: fantasy;font-weight:900">D&T HOMIE</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						<li class="has-dropdown">
							<a href="index.php">SẢN PHẨM </a>
							<ul class="dropdown">
								<li>
								 <?php
								 $p->loadthuonghieu("select * from thuonghieu order by TenThuongHieu asc")
								 ?>
								</li>
							</ul>
						</li>
						<li class="has-dropdown">
							<a href="services.php">DỊCH VỤ</a>
						</li>
						<li><a href="about.php">GIỚI THIỆU</a></li>
						
						<li><a href="contact.php">LIÊN HỆ</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
					<ul>
						<li class="search">
							<div class="input-group">
						      <input type="text" placeholder="Search..">
						      <span class="input-group-btn">
						        <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
						      </span>
						    </div>
						</li>
						
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	
		<div class="container-fluid" style="margin-bottom:10px;width: 100%;background-color:">
				<div class="col-md-12">
					<?php
						error_reporting(E_ERROR | E_PARSE);
						$partnerCode = $_GET['partnerCode'];
						$orderId = $_GET['orderId'];
						$amount = $_GET['amount'];
						$orderInfo = $_GET['orderInfo'];
						$orderType = $_GET['orderType'];
						$transId = $_GET['transId'];
						$payType = $_GET['payType']; 
						if(isset($_GET['partnerCode']) && isset($_GET['orderId']) && isset($_GET['amount']) && isset($_GET['orderInfo']) && isset($_GET['orderType']) && isset($_GET['transId']) && isset($_GET['payType']))
						{ 
					?>
					<form action="" method="post">
						<div class="col-md-12">
                        <h1 style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;margin-top:10px;font-weight: 900">XÁC NHẬN THÔNG TIN THANH TOÁN</h1>
                      <table cellpadding="2" cellspacing="0" class="thongtinnhanhang">
                        <tr>
                            <td width="20%">PartnerCode</td>
                            <td><input type="text" name="PartnerCode" id="PartnerCode" value="<?php echo $partnerCode?>" readonly></td>
                        </tr>
                        <tr>
                            <td>OrderId</td>
                            <td><input type="text" name="OrderId"  id="OrderId" value="<?php echo $orderId?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td><input type="text" name="Amount" id="Amount" value="<?php echo $amount?>" readonly></td>
                        </tr>
                        <tr>
                            <td>OrderInfo</td>
                            <td><input type="email" name="OrderInfo" id="OrderInfo" value="<?php echo $orderInfo?>" readonly></td>
                        </tr>
						<tr>
                            <td>OrderType</td>
                            <td><input type="email" name="OrderType" id="OrderType" value="<?php echo $orderType?>" readonly></td>
                        </tr>
						  <tr>
                            <td>TransId</td>
                            <td><input type="email" name="TransId" id="TransId" value="<?php echo $transId?>" readonly></td>
                        </tr>
						  <tr>
                            <td>PayType</td>
                            <td><input type="email" name="PayType" id="PayType" value="<?php echo $payType?>" readonly></td>
                        </tr>
                    </table>
						<div style="float: right;border-radius:10xp;">
							<input type="submit" name="access" value="Xác nhận" class="btn btn-success" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"/>
						</div>
							
                  </div>	
						<div>
							<?php
								switch($_POST['access']){
									case "Xác nhận":
										{
										$partner = $_REQUEST['PartnerCode'];
										$orderd = $_REQUEST['OrderId'];
										$amoun = $_REQUEST['Amount'];
										$orderIn = $_REQUEST['OrderInfo'];
										$orderTy = $_REQUEST['OrderType'];
										$transI = $_REQUEST['TransId'];
										$resultCd = $_REQUEST['ResultCode'];
										$payTpe = $_REQUEST['PayType'];
										if($p->themxoasua("INSERT INTO momo(id_momo, partner_code, order_id, amount,order_info, order_type, trans_id, pay_type) VALUE(Null, '$partner', '$orderd','$amoun' ,'$orderIn','$orderTy','$transI','$payTpe')")==1)
										{
											
											echo "Xác nhận thành công";
											header("location:index.php");
											
										}
										else
										{
											echo "Xác nhận không thành công";
										}

										break;
										}
								}
							?>
						</div>
				  </form>

					<?php }elseif(!isset($_GET['partnerCode']) && !isset($_GET['orderId']) && !isset($_GET['amount']) && !isset($_GET['orderInfo']) && !isset($_GET['orderType']) && !isset($_GET['transId']) && !isset($_GET['payType']))
						{ 
							
						if(!empty($error)){ ?>
						<div id="notify-msg">
							<?php echo $error; ?>.<a href="javascript:history.back()">Quay lại</a
						</div>
					<?php } elseif(!empty($success)){ ?>
						<div id="notify-msg">
							<?php echo $success; ?>.<a href="index.php">Tiếp tục mua hàng</a>
							</br>
							<div style="margin-bottom: 10px;">
								<form action="congthanhtoanmomo.php" method="post">
									<input type="hidden" name="total_thanhtoan" value="<?php echo $total;?>"/>
									<input type="submit" name="redircet" id="redircet"value="THANH TOÁN MOMO QRCODE" style="background-color: deeppink;border:1px;border-radius:5px;color: black;" />

								</form>
							</div>
							<div>
								<form action="thanhtoanmomo_ATM.php" method="post">
									<input type="hidden" name="total_thanhtoan" value="<?php echo $total;?>"/>
									<input type="submit" name="redircet" id="redircet"value="THANH TOÁN MOMO ATM" style="background-color: deeppink;border:1px;border-radius:5px;color: black;" />

								</form>
							</div>
						</div>		 
					<?php } 
									
								else{ ?>
					<form action="cartweb.php?action=submit" method="post">
						<div class="col-md-12">
                        <h1 style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;margin-top:10px;font-weight: 900">THÔNG TIN NHẬN HÀNG</h1>
                      <table cellpadding="2" cellspacing="0" class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><input type="text" name="hoten"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="diachi"></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="dienthoai"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email"></td>
                        </tr>
                    </table>
						<div style="float: right;border-radius:10xp;">
							<input type="submit" name="order_click" value="Đặt hàng" class="btn btn-success" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'"/>
						</div>
							
                  </div>
						<h1 style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;margin-top:10px;font-weight:900;margin-left:10px;">GIỎ HÀNG</h1>
                    <table width="100%;" border="1" cellpadding="2" cellspacing="0">
						
                      <tr class='column' style="background-color:#c8c8c8;">
                        <td width="7%">THỨ TỰ</td>
                        <td width="20%">SẢN PHẨM</td>
                        <td width="20%">TÊN SẢN PHẨM</td>
                        <td width="16%">GIÁ</td>
						  <td width="16%">SỐ LƯỢNG</td>
                        <td width="16%">THÀNH TIỀN</td>
						  <td width="25%">CHỈNH SỬA ĐƠN HÀNG</td>
                      </tr>
                      <?php
						if(!empty($product)){
							$total = 0;
							$num=1;
						 while($row=mysqli_fetch_array($product)){
						?>
                       
                      <tr style="background-color:#D3FDE7">
                        <td><?php echo $num++; ?></td>
						<td><img src="images/<?php echo $row['Anh'] ?>"  width="100px;" /></td>
                        <td><?php echo $row['TenSP'] ?></td>
					    <td><?php echo number_format($row['Gia'], 0,",",".").'đ';?></td>
                        <td><input type="text" value="<?php echo $_SESSION['cart'][$row['MaSP']] ?>" name="quantity[<?php echo $row['MaSP'] ?>]" size="2"/>
						  <input type="submit" name="update_click" value="Update" class="btn btn-warning" />
						</td>
		                <td><?php echo number_format($row['Gia'] * $_SESSION['cart'][$row['MaSP']], 0,",",".").'đ';?></td>
						<td>
							 <a href="cartweb.php?action=delete&id=<?php echo $row['MaSP']?>" style="color: red">Delete</a>
						</td>
                      </tr>
						<?php 
							$total +=$row['Gia'] * $_SESSION['cart'][$row['MaSP']];
							$num++;
						 }
							?>
						 <tr  style="background-color:#c8c8c8 ">
							 <td colspan="5">TỔNG ĐƠN HÀNG</td>
							  <td colspan=''><span style="color:#D90509" ><?php echo number_format($total, 0,",",".").'đ';?></span></td>
							  <td> <p style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;margin-top:10px;"></p></td>
                    	  </tr>
						<?php
						}
						
						?>
							
                     
                    </table>
					  </form>
					<?php } ?>
				<?php } ?>
                </div>
				
		</div>
		
	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Newsletter</h2>
					<p>Just stay tune for our latest Product. Now you can subscribe</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>Shop.</h3>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">About</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Shop</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://blog.gessato.com/" target="_blank">Gessato</a> &amp; <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

