
<?php
	error_reporting(E_ERROR | E_PARSE);
// session_start();
// if(isset($_SESSION['sdt']) && isset($_SESSION['matkhau']))
// {
	include("Class/ClsLogin.php");
	$q=new login();
//	$q->confirmlogin($_SESSION['sdt'],$_SESSION['matkhau']);
// }
// else
// {
//	header("location:login.php");
//	 
 //}
	include("Class/Clscontrol.php");
	$p= new control();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TRÍ TÍNH STORE</title>
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
						<li><a href="services.php">GIỚI THIỆU</a></li>
						
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
	
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/img_bg_6.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
								<div class="desc">
									<span class="price"></span>
									<h2>Simple</h2>
									<p>Được mệnh danh là một trong những thương hiệu mỹ phẩm lành tính hàng đầu tại Anh quốc. Simple không mở rộng nhiều chủng loại sản phẩm mà tập trung vào các sản phẩm dưỡng da theo hai bước cơ bản đó là: làm sạch và dưỡng ẩm.</p>
									<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Mua ngay</a></p>
								</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_7.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
								<div class="desc">
									<span class="price"></span>
									<h2>Estée Lauder</h2>
									<p>Nói đến đến Estée Lauder, nhiều người sẽ nhớ ngay đến một thương hiệu mỹ phẩm high-end danh giá, là “lão làng” trong lĩnh vực chăm sóc sắc đẹp.
									Sở hữu hàng chục nhãn hiệu nổi tiếng, hàng trăm store, showroom trên toàn thế giới và giá trị thương hiệu lên đến hàng tỷ đô, 
									Estee Lauder đã trở thành một đế chế thống trị ở thị trường làm đẹp mà khó có thương hiệu nào có thể vượt qua.</p>
									<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Mua ngay</a></p>
								</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_8.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price"></span>
									<h2>OHUI</h2>
									<p>Ohui là một trong các thương hiệu mỹ phẩm high-end nổi bật của Hàn Quốc do tập đoàn LG sáng lập khoảng những năm 1970.
								   Ohui vụt sáng tại Hàn Quốc giữa một trời mỹ phẩm bình dân với phương châm dùng bí quyết chăm sóc da cổ truyền Đông phương phối hợp với công nghệ hiện đại.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Mua ngay</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(images/img_bg_9.jpg);">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price"></span>
		   							<h2>Hanayuki</h2>
									<p>Hanayuki được biệt đến là thương hiệu mỹ phẩm thuần việt mang đến những giải pháp trị các vấn đề về da ở phụ nữ Châu Á.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Mua ngay</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-credit-card"></i>
						</span>
						<h3>THẺ TÍN DỤNG</h3>
						<p></p>
						<p><a href="#" class="btn btn-primary btn-outline">Xem thêm</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-wallet"></i>
						</span>
						<h3>TIẾT KIỆM TIỀN</h3>
						<p></p>
						<p><a href="#" class="btn btn-primary btn-outline">Xem thêm</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-paper-plane"></i>
						</span>
						<h3>MIỄN PHÍ GIAO HÀNG</h3>
						<p></p>
						<p><a href="#" class="btn btn-primary btn-outline">Xem thêm</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Nổi bật</span>
					<h2>SẢN PHẨM</h2>
					<p>I don't get older. I level up</p>
				</div>
			</div>
			<div class="row">
				
				<?php
						$page = 8;
						$current_page = 1;
						if(isset($_GET['page']))
						{
							$current_page = $_GET['page'];
						}
						$offset=($current_page-1)*$page;

								$math=$_REQUEST['id'];
								if($math>0)
									{
										$p->loadsanpham("select * from sanpham where MaTH='$math' order by Gia asc limit 10  OFFSET ".$offset); 
									}
								else if(isset($_POST['name']))
										{
											$sqli= "SELECT * FROM sanpham WHERE TenSP LIKE '%$s%'";
											$p->loadsanpham($sqli); 	 
										}
								else
									{
										$p->loadsanpham("select * from sanpham limit ".$page." OFFSET ".$offset);
									}
					$sql = "select * from sanpham ";
					$ds=$p->sotrang($sql);
					$total_page =ceil($ds/ $page);
				?>
				<div class="row" style="clear:both" align="center">
            	<ul class="pagination">
                <?php
				 	for($i=1;$i<=$total_page;$i++)
					{
						echo '<li style="display:inline-block;background-color:white;margin:5px 0px 0px 10px;font-size:15px;padding:0px 5px 0px 5px"><a href="?page='.$i.'" style="text-decoration:none">'.$i.'</a></li>';
					}
					
				?>
             
                    
                </ul>
            </div>
			</div>
			
		</div>
	</div>
	
	<div id="fh5co-testimonial" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Mua nhiều trong tháng</span>
					<h2>KHÁCH HÀNG</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/kh1.jpg" alt="user">
									</figure>
									<span>Jonny Nguyễn <a href="#" class="twitter">Facebook</a></span>
									<blockquote>
										<p>&ldquo;Trong tháng qua khách hàng Jonny Tính Nguyễn là khách hàng mua nhiều sản phẩm nhất trong tháng với số lượng hoá đơn lên đến 100.000.000 triệu đồng.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/kh2.jpg" alt="user">
									</figure>
									<span>David Trương <a href="#" class="twitter">Facebook</a></span>
									<blockquote>
										<p>&ldquo;David Trương cũng là một khách hàng thân thiết của cửa hàng với số lượng hoá đơn lên đến 50.000.000 triệu đồng.&rdquo;</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/kh3.jpg" alt="user">
									</figure>
									<span>Henry Nguyễn <a href="#" class="twitter">Facebook</a></span>
									<blockquote>
										<p>&ldquo;Là khách hàng thứ 3 mua nhiều sản phẩm trong tháng với hoá đơn lên đến 30.000.000 triệu đồng.&rdquo;</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
		<div class="container">
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-eye"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Creativity Fuel</span>

							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shopping-cart"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="450" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Happy Clients</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-shop"></i>
								</span>
								<span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">All Products</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Hours Spent</span>

							</div>
						</div>
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
					<h3>D&T HOMIE</h3>
					<p></p>
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
					<!--<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://blog.gessato.com/" target="_blank">Gessato</a> &amp; <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>-->
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

<!--
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
-->
	
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
	<!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "110577255231911");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
	</body>
</html>

