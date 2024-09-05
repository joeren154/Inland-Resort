<?php 
    include_once 'connection.php';
    session_start();

    $sqlfeatured=$conn->prepare("SELECT * FROM tb_resort WHERE isFeatured = 1 ");
	$sqlfeatured->execute();

	if(isset($_SESSION['type_of_user'])){
		$TypeofUser = $_SESSION['type_of_user'];
	}else{
		$TypeofUser = " ";
	}
	
    if($TypeofUser  == "Guest"){
		$sqlguest=$conn->prepare("SELECT * FROM tb_guest WHERE guest_id =? ");
	    $sqlguest->execute([$_SESSION['user_reg']]);
	    $rowguest=$sqlguest->fetch(PDO::FETCH_ASSOC);

	}else if($TypeofUser == "Resort"){
		$sqlresort=$conn->prepare("SELECT * FROM tb_resort WHERE resortid =? ");
	    $sqlresort->execute([$_SESSION['user_reg']]);
	    $rowresort=$sqlresort->fetch(PDO::FETCH_ASSOC);

	}else if($TypeofUser == "Municipal"){
		$sqlmunicipal=$conn->prepare("SELECT * FROM tb_municipality WHERE id =? ");
	    $sqlmunicipal->execute([$_SESSION['user_reg']]);
	    $rowmunicipal=$sqlmunicipal->fetch(PDO::FETCH_ASSOC);

	}else if($TypeofUser == "Provincial"){
		$sqlprovince=$conn->prepare("SELECT * FROM tb_provincial WHERE provid =? ");
	    $sqlprovince->execute([$_SESSION['user_reg']]);
	    $rowprovince=$sqlprovince->fetch(PDO::FETCH_ASSOC);
	}

?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Inland Resort Management System</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">    
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-icons.css" rel="stylesheet">
	<!-- Site CSS -->
    <link rel="stylesheet" href="assets/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/animate.css">
  	<link rel="stylesheet" href="assets/css/baguetteBox.min.css">
  	<link rel="stylesheet" href="assets/css/classic.css">
  	<link rel="stylesheet" href="assets/css/classic.date.css">
  	<link rel="stylesheet" href="assets/css/classic.time.css">
  	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
  	<link rel="stylesheet" href="assets/css/morris.css">
  	<!-- <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
  	<link rel="stylesheet" href="assets/css/superslides.css">

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="#" style="color: aqua; font-size: 25px;">Inland Resort Management System</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-resort" aria-controls="navbars-rs-resort" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-resort">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item" id="home"><a class="nav-link" href="index.php" onclick="Resort_Home()">Home</a></li>
						<li class="nav-item"  id="menu"><a class="nav-link" onclick="Resort_Menu()">Menu</a></li>
						<li class="nav-item" id="about"><a class="nav-link" onclick="Resort_About()">About</a></li>
						<li class="nav-item dropdown" id="pages">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<?php if($TypeofUser  == "Guest") {?> 
									<a class="dropdown-item" id="resort_list">Resorts</a>
								<?php }else if($TypeofUser  == "Resort"){ ?>
									<a class="dropdown-item" onclick="My_Resort()">My Resort</a>
								<?php } ?>
								<!-- <a class="dropdown-item" onclick="Resort_Reservation()">Reservation</a> -->
								<a class="dropdown-item" onclick="Resort_Map()">Resorts Map</a>
								<a class="dropdown-item" onclick="All_Gallery()">Gallery</a>
							</div>
						</li>
						
						<li class="nav-item" id="services"><a class="nav-link" onclick="Resort_Services()">Services</a></li>
						<li class="nav-item" id="contact"><a class="nav-link" onclick="Resort_Contact()">Contact</a></li>

						<?php if($TypeofUser  == "Guest"){ ?> 
							<li class="nav-item dropdown" id="user">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown" style="text-decoration: none; font-size: 16px; color: #0fdf74;"><i class="bi bi-person-circle"></i> <?php echo $rowguest['Username'];?></a>
								<div class="dropdown-menu" aria-labelledby="dropdown-a">
									<a class="dropdown-item"><small class="text-info"> 
										<strong> <?php echo $rowguest['FirstName'] . " " . $rowguest['MiddleName'] . " " . $rowguest['LastName']; ?> - GUEST
										</strong></small></a>
									<a class="dropdown-item" onclick="MyCart()" name="cart"><i class="bi bi-calendar-date"></i> Bookings <span class="badge rounded-pill bg-success pt-1"></span></a> 
									<a class="dropdown-item" onclick="MyOrders()" name="orders"><i class="bi bi-pen"></i> My Bookings <span class="badge rounded-pill bg-success pt-1"></span></a> 
									<a class="dropdown-item" onclick="ManageProfile()"><i class="bi bi-person-square"> </i>Profile</a> 
									<a class="dropdown-item" onclick="ManageUserAccount()"><i class="bi bi-person"></i> Manage Account</a> 
									<a class="dropdown-item" href="user-logout/user-guest-logout.php?logoutid=<?php echo $rowguest['guest_id']; ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>  
								</div>
							</li>
						<?php }else if($TypeofUser == "Resort"){ ?> 
							<li class="nav-item dropdown" id="user">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown" style="text-decoration: none; font-size: 16px; color: #0fdf74;"><i class="bi bi-person-circle"></i> <?php echo $rowresort['username'];?></a>
								<div class="dropdown-menu" aria-labelledby="dropdown-a">
									<a class="dropdown-item">
										<small class="text-info"> 
											<strong> <?php echo $rowresort['resortname']; ?> - RESORT
											</strong> 
										</small></a>
									<a class="dropdown-item" onclick="Reservation_List()" name="reservations"><i class="bi bi-list"> </i>Reservations <span class="badge rounded-pill bg-success pt-1"></span></a>  
									<a class="dropdown-item" onclick="Resort_Rooms()"><i class="bi bi-house"> </i>Manage Accomodation and Fees</a>
									<a class="dropdown-item" onclick="Resort_Reports()" name="r_reports"><i class="bi bi-clipboard"> </i>Manage Reports <span class="badge rounded-pill bg-success pt-1"></span></a> 
									<a class="dropdown-item" onclick="ManageUserAccount()"><i class="bi bi-person"></i> Manage Resort Account</a>   
									<a class="dropdown-item" href="user-logout/user-resort-logout.php?logoutid=<?php echo $rowresort['resortid']; ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>  
								</div>
							</li>
						<?php }else if($TypeofUser == "Municipal"){ ?> 
							<li class="nav-item dropdown" id="user">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown" style="text-decoration: none; font-size: 16px; color: #0fdf74;"> <i class="bi bi-person-circle"></i> <?php echo $rowmunicipal['username']; ?></a>
								<div class="dropdown-menu" aria-labelledby="dropdown-a">
									<a class="dropdown-item"><small class="text-info"> <strong> Municipal Tourism Office - <?php echo $rowmunicipal['mun']; ?> </small></a>
									<a class="dropdown-item" onclick="Municipal_Reports()" name="municipal_reports"><i class="bi bi-clipboard"> </i>Manage All Reports <span class="badge rounded-pill bg-success pt-1"></span></a>
									<a class="dropdown-item" onclick="Municipal_Resorts()" name="municipal_resorts"><i class="bi bi-list"> </i>Manage All Resorts <span class="badge rounded-pill bg-success pt-1"></span></a>
									<a class="dropdown-item" onclick="ManageChart()"><i class="bi bi-bar-chart"></i> Report Monitoring</a>
									<a class="dropdown-item" onclick="ResortLocations()" name="chart_province"><i class="bi bi-pin-map-fill"> </i>Manage Resort Locations</a>  
									<a class="dropdown-item" onclick="ManageUserAccount()"><i class="bi bi-person"></i> Manage Account</a> 
									<a class="dropdown-item" href="user-logout/user-municipal-logout.php?logoutid=<?php echo $rowmunicipal['id']; ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>  
								</div>
							</li>
						<?php }else if($TypeofUser == "Provincial"){ ?> 
							<li class="nav-item dropdown" id="user">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown" style="text-decoration: none; font-size: 16px; color: #0fdf74;"><i class="bi bi-person-circle"></i>Provincial Tourism</a>
								<div class="dropdown-menu" aria-labelledby="dropdown-a">
									<a class="dropdown-item"><small class="text-info"> <strong> Provincial Tourism Office </strong></small></a>
									<a class="dropdown-item" onclick="ManageAllResort()" name="all_resort"><i class="bi bi-pen"> </i>Manage Resorts <span class="badge rounded-pill bg-success pt-1"></span></a>  
									<a class="dropdown-item" onclick="ManageDistrict()" name="all_municipality"><i class="bi bi-building"> </i>Manage Municipality <span class="badge rounded-pill bg-success pt-1"></span></a> 
									<a class="dropdown-item" onclick="Provincial_Chart()" name="chart_province"><i class="bi bi-bar-chart"> </i>Report Monitoring</a> 
									<a class="dropdown-item" onclick="ManageUserAccount()"><i class="bi bi-person"></i> Manage Provincial Account</a> 
									<a class="dropdown-item" href="user-logout/user-province-logout.php?logoutid=<?php echo $rowprovince['provid']; ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>  
								</div>
							</li>
						<?php }else{ ?>
							<li class="nav-item" id="login" style="padding-top: 5px; margin-left: 3px;">
									<a role="button" class="" aria-expanded="true" style="text-decoration: none; font-size: 16px; color: #0fdf74;" name="btn_login" onclick="User_Login()" id="btn_user_login">
					     		<i class="bi bi-person-circle"></i>Log In
									</a>
							</li>
						<?php } ?>
						
					</ul>	
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<div id="main-resort-view" style="overflow: auto;">
				<div id="slides" class="cover-slides">
				<ul class="slides-container">
					<li class="text-center">
						<img src="assets/images/slider-1.jpeg" alt="">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h1 class="m-b-20"><strong>Thirty Municipalities<br>Hundreds of Accommodations</strong></h1>
									<p class="m-b-40">Suit your comfort to all of it.</p>
									<?php if($TypeofUser  == "Guest") {?> 
										<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#" id="home_one_btn_reserve" user_type = "<?php echo $TypeofUser; ?>">Reservation</a></p>
									<?php }else if($TypeofUser  == "Resort"){ ?>
									 	<p><a class="btn btn-lg btn-circle btn-outline-new-white" onclick="My_Resort()">My Resort</a></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
					<li class="text-center">
						<img src="assets/images/slider-2.jpeg" alt="">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h1 class="m-b-20"><strong>Province of Iloilo<br> City of Love</strong></h1>
									<p class="m-b-40">Proudly showcase different outstanding resort in the Philippines</p>
									<p class="m-b-40">Suit your comfort to all of it.</p>
									<?php if($TypeofUser  == "Guest") {?> 
										<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#" id="home_two_btn_reserve" user_type = "<?php echo $TypeofUser; ?>">Reservation</a></p>
									<?php }else if($TypeofUser  == "Resort"){ ?>
									 	<p><a class="btn btn-lg btn-circle btn-outline-new-white" onclick="My_Resort()">My Resort</a></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
					<li class="text-center">
						<img src="assets/images/slider-3.jpeg" alt="">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h1 class="m-b-20"><strong>Five Districts</strong></h1>
									<p class="m-b-40">Each district possesses unique culture and traditions that bring pride to the Province.</p>
									<?php if($TypeofUser  == "Guest") {?> 
										<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#" id="home_three_btn_reserve" user_type = "<?php echo $TypeofUser; ?>">Reservation</a></p>
									<?php }else if($TypeofUser  == "Resort"){ ?>
									 	<p><a class="btn btn-lg btn-circle btn-outline-new-white" onclick="My_Resort()">My Resort</a></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</li>
				</ul>
				<div class="slides-navigation">
					<a href="#" class="next"><i class="bi bi-arrow-right-short fa-5x" aria-hidden="true"></i></a>
					<a href="#" class="prev"><i class="bi bi-arrow-left-short fa-5x" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- End slides -->
			
			<!-- Start About -->
			<div class="about-section-box" style="border-bottom: 3px dashed rgba(207, 166, 113);">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="assets/images/about-img.jpeg" alt="" class="img-fluid">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 text-center">
							<div class="inner-column">
								<h1><span>Inland Resort Management System</span> caters your Reservation</h1>
								<h4>Little Story</h4>
								<p>Inland Resort Management System offers you the most convenient and easiest way of managing your reservation. It allows tourist to book reservation ahead through browsing resorts or tourist spots in Iloilo. May it be in province area or in the City. It also includes Resort Map to locate your dream place to visit.</p>
								<p>The system was developed to offer travelers a computerized and advanced booking website where they can enjoy their vacation through any circumstances.</p>
									<?php if($TypeofUser  == "Guest") {?> 
										<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#" id="about_btn_reserve" user_type = "<?php echo $TypeofUser; ?>">Reservation</a></p>
									<?php }else if($TypeofUser  == "Resort"){ ?>
									 	<p><a class="btn btn-lg btn-circle btn-outline-new-white" onclick="My_Resort()">My Resort</a></p>
									<?php }else{?>
										<p><a class="btn btn-lg btn-circle btn-outline-new-white" onclick="Resort_Menu()">Special Deals</a></p>
									<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End About -->

			<!-- Start QT -->
			<div class="" style="background: #292c2b; padding: 15px; box-shadow: 5px 0px 5px 0px #292c2b border-bottom 3px dashed rgba(207, 166, 113);">
				<div class="container" align="center">
					<div class="row">
						<div class="col-md-12">
							<img src="assets/images/richard-burton.jpeg" style="width: 180px; height: 180px; float: left; box-shadow: 0 2px 5px 2px white; background-size: cover;">
							<p class="center" style="font-size: 30px; padding: 10px; font-family: 'Arial'; font-style: italic; color: white;">
								 "The gladdest moment in human life is departure into unknown lands."
							</p>
							<span style="font-size: 25px; font-weight: 500; color: white;"> - Richard Burton</span>
						</div>
					</div>
				</div>
			</div>
				
			<!-- Start QT --> 
			<!-- <div class="qt-box qt-background">
				<div class="container">
					<div class="row">
						<div class="col-md-8 ml-auto mr-auto text-left">
							<p class="lead ">
								" The gladdest moment in human life is departure into unknown lands. "
							</p>
							<span class="lead">Richard Burton</span>
						</div>
					</div>
				</div>
			</div> -->
			<!-- End QT --> 
			
			<!-- Start Menu -->
			<div class="menu-box" style="border-top: 3px dashed rgba(207, 166, 113);">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="heading-title text-center">
								<h2>Featured Resorts</h2>
								<p>Explore the wonders of the Iloilo Province!</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="special-menu text-center">
								<div class="button-group filter-button-group">
									<button class="active" data-filter="*">All</button>
									<button data-filter=".d1">District 1</button>
									<button data-filter=".d2">District 2</button>
									<button data-filter=".d3">District 3</button>
									<button data-filter=".d4">District 4</button>
									<button data-filter=".d5">District 5</button>
								</div>
							</div>
						</div>
					</div>

					<div class="row special-list">

					<?php
						foreach($sqlfeatured as $featured){
							$d = $featured['district'];

							if($d == "FIRST DISTRICT"){
								$d = "d1";
							}else if($d == "SECOND DISTRICT"){
								$d = "d2";
							}else if($d == "THIRD DISTRICT"){
								$d = "d3";
							}else if($d == "FOURTH DISTRICT"){
								$d = "d4";
							}else if($d == "FIFTH DISTRICT"){
								$d = "d5";
							} 

							$id = $featured['resortid'];

							$sqlimage=$conn->prepare("SELECT * FROM images WHERE resortid = ?");
							$sqlimage->execute([$id]);
							$row=$sqlimage->fetch(PDO::FETCH_ASSOC);

							$rowCount = $sqlimage->rowCount();

							if($rowCount == 0) {
								$image = "";
							}else{
								$image = basename($row['file_name']);
							}
					?>
							<div class="col-lg-4 col-md-6 special-grid <?php echo $d; ?>">
								<div class="gallery-single fix">
									<img src="uploads/<?php echo $image; ?>" class="img-fluid" alt="Image" style="width: 600px; height: 400px;">
									<div class="why-text" onclick="BrowseID(<?php echo $featured['resortid'];?>)" title="Click for Resort Additional Information">
										<h4><?php echo $featured['resortname'];?></h4>
										<p><?php echo $featured['resortaddress'];?></p>
										<h5><?php echo $featured['contact_no'];?></h5>
									</div>
									<div align="center" style="font-size: 20px;"><b><?php echo $featured['resortname'];?></b></div>
								</div>
							</div>
					<?php
						}
					?>
					</div>
				</div>
			</div>
			<!-- End Menu -->
	
	</div>
	<!--End Main View-->
	

	<!-- Start Contact info -->
		<div class="contact-imfo-box" style="border-bottom: 1px dashed rgba(207, 166, 113);">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<i class="bi bi-phone"></i>
						<div class="overflow-hidden">
							<h4>Phone</h4>
							<p class="lead">
								09076746329
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<i class="bi bi-envelope"></i>
						<div class="overflow-hidden">
							<h4>Email</h4>
							<p class="lead">
								ict.jayrsegura@gmail.com
								jasperallenangelo.lavente@gmail.com
								emmans4.el@gmail.com
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<i class="bi bi-pin-map-fill"></i>
						<div class="overflow-hidden">
							<h4>Location</h4>
							<p class="lead">
								Poblacion Ilawod Lambunao, Iloilo
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Contact info -->
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Inland Resort Management System is being developed in the fulfillment of Thesis Writing as per required by the Program for graduation. The scope and limitation of the system are strictly obeyed for the success of the study.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Mon-Tue : </span> 8:30AM - 10PM</p>
					<p><span class="text-color">Wed-Thu :</span> 9AM - 9:30PM</p>
					<p><span class="text-color">Fri-Sat :</span> 9:30AM - 11PM</p>
					<p><span class="text-color">Sun :</span> 8AM - 5:PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Poblacion Ilawod Lambunao, Iloilo 5042</p>
					<p class="lead"><a href="#">09076746329</a></p>
					<p><a href="#"> infotech@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="bi bi-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="bi bi-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="bi bi-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="bi bi-whatsapp" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="bi bi-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2022 <a href="#">Inland Resort Management System</a> Design By : 
					<a href="https://html.design/">BS INFO TECH</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="assets/js/jquery.superslides.min.js"></script>
	<script src="assets/js/images-loded.min.js"></script>
	<script src="assets/js/isotope.min.js"></script>
	<script src="assets/js/baguetteBox.min.js"></script>
	<script src="assets/js/form-validator.min.js"></script>
    <script src="assets/js/contact-form-script.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/header-on-click.js"></script>
    <script type="text/javascript" src="assets/js/header-on-click-two.js"></script>
    <script type="text/javascript" src="assets/js/header-on-click-three.js"></script>
    <script type="text/javascript" src="assets/js/header-on-click-four.js"></script>
    <script type="text/javascript" src="assets/js/header-on-click-five.js"></script>
    <script type="text/javascript" src="assets/js/header-on-click-six.js"></script>
    <script type="text/javascript" src="assets/js/header-on-click-seven.js"></script>
    <script type="text/javascript" src="assets/js/header-on-click-eight.js"></script>
    <script type="text/javascript" src="assets/js/Chart.min.js"></script>
    <script type="text/javascript" src="assets/js/morris.js"></script>
    <script type="text/javascript" src="assets/js/raphael.min.js"></script>

    
    <?php   
      include "toasts.php"; 
      include "modals.php"; 
    ?>


</body>
</html>


<script type="text/javascript">
	 $(document).ready(function(){
	    $("#home").addClass("active");
	    show_profile_badges();
     })

	   function show_profile_badges(){
	        $.post("components/components-action/get-profile-badges.php", {

	        }, function(data){
	            var res = JSON.parse(data);
	            $("#user").find("a[name='orders']").find("span").html(res.prOrders);
	            $("#user").find("a[name='cart']").find("span").html(res.prCart);
	            $("#user").find("a[name='reservations']").find("span").html(res.prReservation);
	            $("#user").find("a[name='r_reports']").find("span").html(res.prRReports)
	            $("#user").find("a[name='municipal_resorts']").find("span").html(res.prResorts);
	            $("#user").find("a[name='municipal_reports']").find("span").html(res.prReports);
	            $("#user").find("a[name='all_resort']").find("span").html(res.prCountResort);
	            $("#user").find("a[name='all_municipality']").find("span").html(res.prCountMunicipality);
	        })
	     }
 
	 setInterval(function(){
       show_profile_badges();
    }, 3000)


     $("#resort_list").on("click", function(e){
     	$("#main-resort-view").load("components/list-of-resorts.php");

		$("#contact").removeClass("active");
	    $("#home").removeClass("active");
	    $("#menu").removeClass("active");
	    $("#about").removeClass("active");
	    $("#blog").removeClass("active");
	    $("#pages").addClass("active");

     })


     $("#about_btn_reserve").on("click", function(e){
     	var user_log = $(this).attr("user_type");

			$("#contact").removeClass("active");
			$("#home").removeClass("active");
			$("#menu").removeClass("active");
			$("#about").removeClass("active");
			$("#blog").removeClass("active");
			$("#pages").addClass("active");

     	if(user_log == " "){
     		//modal_alert("Log in to View Resorts and Book Reservation", "warning", 3000);
     	}else if(user_log == "Guest"){
     		$("#main-resort-view").load("components/list-of-resorts.php");
     	}else if(user_log == "Resort"){
     		$("#main-resort-view").load("components/my_resort.php");
     	}else{

     	}
     })


     $("#home_one_btn_reserve").on("click", function(e){
     	var user_log = $(this).attr("user_type");

			$("#contact").removeClass("active");
			$("#home").removeClass("active");
			$("#menu").removeClass("active");
			$("#about").removeClass("active");
			$("#blog").removeClass("active");
			$("#pages").addClass("active");

     	if(user_log == " "){
     		//modal_alert("Log in to View Resorts and Book Reservation", "warning", 3000);
     	}else if(user_log == "Guest"){
     		$("#main-resort-view").load("components/list-of-resorts.php");
     	}else if(user_log == "Resort"){
     		$("#main-resort-view").load("components/my_resort.php");
     	}else{

     	}
     })

     $("#home_two_btn_reserve").on("click", function(e){
     	var user_log = $(this).attr("user_type");

			$("#contact").removeClass("active");
			$("#home").removeClass("active");
			$("#menu").removeClass("active");
			$("#about").removeClass("active");
			$("#blog").removeClass("active");
			$("#pages").addClass("active");

     	if(user_log == " "){
     		//modal_alert("Log in to View Resorts and Book Reservation", "warning", 3000);
     	}else if(user_log == "Guest"){
     		$("#main-resort-view").load("components/list-of-resorts.php");
     	}else if(user_log == "Resort"){
     		$("#main-resort-view").load("components/my_resort.php");
     	}else{

     	}
     })

     $("#home_three_btn_reserve").on("click", function(e){
     	var user_log = $(this).attr("user_type");

			$("#contact").removeClass("active");
			$("#home").removeClass("active");
			$("#menu").removeClass("active");
			$("#about").removeClass("active");
			$("#blog").removeClass("active");
			$("#pages").addClass("active");

     	if(user_log == " "){
     		//modal_alert("Log in to View Resorts and Book Reservation", "warning", 3000);
     	}else if(user_log == "Guest"){
     		$("#main-resort-view").load("components/list-of-resorts.php");
     	}else if(user_log == "Resort"){
     		$("#main-resort-view").load("components/my_resort.php");
     	}else{

     	}
     })

    function BrowseID(resortid){
		$.post("components/browse-resort-on-click.php",{
			resortid	: resortid
		}, function(data){
			$("#main-resort-view").html(data);
		})
	}


	function ManageProfile(){
		$("#main-resort-view").load("components/manage-user-profile.php");

		$("#about").removeClass("active");
		$("#blog").removeClass("active");
		$("#pages").removeClass("active");
		$("#contact").removeClass("active");
	    $("#home").removeClass("active");
	    $("#menu").removeClass("active");
	    $("#user").addClass("active");
	}

	function ManageChart(){
		$("#main-resort-view").load("components/manage-report-chart.php");

		$("#about").removeClass("active");
		$("#blog").removeClass("active");
		$("#pages").removeClass("active");
		$("#contact").removeClass("active");
	    $("#home").removeClass("active");
	    $("#menu").removeClass("active");
	    $("#user").addClass("active");
	}

	
</script>