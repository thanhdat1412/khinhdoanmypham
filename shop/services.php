<?php
	include("Class/Clscontrol.php");
	$p= new control();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash;</title>
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
							<a href="about.php">DỊCH VỤ</a>
							
						</li>
						<li><a href="#">GIỚI THIỆU</a></li>
						
						<li><a href="contact.php">LIÊN HỆ</a></li>
					</ul>
				</div>
				<?php
					
						session_start();
						require("facebook_source.php");
						if(!empty($_SESSION['current_user'])){
						$currentUser= $_SESSION['current_user'];
					?>
				<a href="thongtincanhan.php"><?php echo $currentUser['fullname'];?></a>
						<a href="logout.php">Đăng xuất</a>
						<a href="cartweb.php" class="cart"><i class="icon-shopping-cart" style="color:orange"></i></a>
					<?php }else if(!empty($_SESSION['sdt']) && !empty($_SESSION['matkhau'])){ ?>
				
						<a href="thongtincanhan.php"><?php	echo $_SESSION['sdt']; ?></a>
						<a href="logout.php">Đăng xuất</a>
						<a href="cartweb.php" class="cart"><i class="icon-shopping-cart" style="color:orange"></i></a>
				
					<?php	} 
						else{ ?>
						<a href="login.php" style="color: rgba(0, 0, 0, 0.5);">ĐĂNG NHẬP </a>/<a href="signup.php"  style="color: rgba(0, 0, 0, 0.5);">ĐĂNG KÝ</a>
							<a href="cartweb.php" class="cart"><i class="icon-shopping-cart" style="color:orange"></i></a>

				<?php } ?>	
			</div>
			
			<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
					<ul>
						<form id="search" action="" method="post" >
							<li class="search">
								<div class="input-group" >
									<input type="text" placeholder="Tìm kiếm" name="name">
									<span class="input-group-btn">
										<button  class="btn btn-primary" type="submit" name="search"><i class="icon-search"></i></button> 
									</span>
								</div>
							</li>
						</form>
					</div>
				</ul>
			 <div style="width:50%;height:25px;color:#000">
				<?php
					if(isset($_POST['search']))
					{
						$s=$_POST['name'];	
						if($s == "")
						{
							echo 'Vui lòng nhập tên sản phẩm';	
						}
						else
						{
							$sqli= "SELECT * FROM sanpham WHERE TenSP LIKE '%$s%'";
							$count = $p->sotrang($sqli); 
							if($count <=0)
							{
								echo 'không tìm thấy tên sản phẩm với từ khoá: <b>'.$s.'</b>';
							}
							else
							{
								//echo 'Tìm thấy '.$count.' tên sản phẩm với từ khoá: <b>'.$s.'</b> ';

							}
						}
					}

				?>
        </div>
		</div>
	</nav>
	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Giới thiệu</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
						<img src="images/sp1.png" width="100px"/>
						</span>
						<h3>OHIU</h3>
					<p>O Hui là một trong những thương hiệu mỹ phẩm hàng đầu tại Hàn Quốc và đã có mặt tại nhiều quốc gia trên thế giới. Xuất hiện tại thị trường Việt Nam từ khá sớm, Ohui dần được ưa chuộng bởi nhiều đối tượng khách hàng. Cùng Leflair tìm hiểu đôi nét về thương hiệu mỹ phẩm cao cấp Ohui cũng như địa chỉ mua sản phẩm Ohui chính hãng qua bài viết dưới đây.</p>
						<p><a href="https://ohui.vn/san-pham/kem-duong-tre-hoa-lan-da-tu-bot-kim-cuong-ohui-the-first-diadein-solitaire-cream/" class="btn btn-primary btn-outline">Learn More</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<img src="images/sp8.jpg" width="100px"/>
						</span>
						<h3>Simple</h3>
						<p>Xu hướng thử thách trên mạng xã hội hiện nay là một “miếng bánh ngon” mà nhiều nhãn hàng đang cạnh tranh từng bước để chiếm lấy. Điều này được chứng minh qua một loạt các chiến dịch gần đây tại Việt Nam, điển hình như trong Bảng xếp hạng BSI Tháng 12/2021, có đến 8/10 chiến dịch triển khai thử thách trên mạng xã hội.
Nắm bắt được xu hướng này, ZEE xác định tiềm năng.</p>
						<p><a href="https://advertisingvietnam.com/simple-lan-dau-ra-mat-tai-viet-nam-thu-thach-thu-vi-ket-hop-voi-chien-luoc-kols-bai-ban-tu-zee-agency-l19230" class="btn btn-primary btn-outline">Learn More</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<img src="images/sp12.png" width="100px"/>
						</span>
						<h3>Hanayuki</h3>
						<p>Hanayuki là thương hiệu còn khá mới mẻ với nhiều chị em. Đây là sản phẩm của brand "Made in Việt Nam" nên được đánh giá là phù hợp với làn da của phụ nữ châu Á hơn cả. Hãng cũng có đa dạng nhiều sản phẩm để bạn lựa chọn. An thấy thời gian gần đây hãng nhận được khá nhiều sự quan tâm của mọi người</p>
						<p><a href="https://chanhtuoi.com/review-my-pham-hanayuki-p2323.html" class="btn btn-primary btn-outline">Learn More</a></p>
					</div>
				</div>
			</div>
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

