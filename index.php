<!DOCTYPE html>
<html>
<head>
<title>IIT Student Assist || Home</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="styles.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
    <!-- jQuery lib from google server ===================== -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<?php


include("auth.php"); //include auth.php file on all secure pages ?>
<!--  javaScript -->
<script>
<!--  // building select nav for mobile width only -->
$(function(){
	// building select menu
	$('<select />').appendTo('nav');

	// building an option for select menu
	$('<option />', {
		'selected': 'selected',
		'value' : '',
		'text': 'Choise Page...'
	}).appendTo('nav select');

	$('nav ul li a').each(function(){
		var target = $(this);

		$('<option />', {
			'value' : target.attr('href'),
			'text': target.text()
		}).appendTo('nav select');

	});

	// on clicking on link
	$('nav select').on('change',function(){
		window.location = $(this).find('option:selected').val();
	});
});

// show and hide sub menu
$(function(){
	$('nav ul li').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(150);
		},
		function () {
			//hide its submenu
			$('ul', this).slideUp(150);
		}
	);
});
//end
</script>
<!-- end -->
</head>
<body>

<div class="container">

	<header>
		<div id="fdw">
				<!--nav-->
					<nav>
						<ul>
							<li class="current"><a href="index.php">ACADEMICS<span class="arrow"></span></a>
								<ul style="display: none;" class="sub_menu">
									<li class="arrow_top"></li>
									<li><a class="subCurrent" href="coursegpa.php">Current Grades</a></li>
									<li><a href="calc.php">GPA Calculator</a></li>
									<li><a href="coursescheduler.php">Class Schedule</a></li>
									<li><a href="courselist.php">Courses List</a></li>
									<li><a href="https://web.iit.edu/registrar/academic-calendar">Academic Calender</a></li>
								</ul>
							</li>
								<li class="current"><a href="index.php">SOCIAL<span class="arrow"></span></a>
									<ul style="display: none;" class="sub_menu">
										<li class="arrow_top"></li>
										<li><a class="subCurrent" href="https://web.iit.edu/campus-life/events">Events</a></li>
										<li><a href="http://www.illinoistechathletics.com/landing/index">Atheletics</a></li>
										<li><a href="https://hawklink.iit.edu/Organizations">Social Groups</a></li>
										<li><a href="https://iit.edu/news/iittoday/?cat=3">University News</a></li>
									</ul>
								</li>
								<li class="current"><a href="index.php">Food $ Dining<span class="arrow"></span></a>
									<ul style="display: none;" class="sub_menu">
										<li class="arrow_top"></li>
										<li><a class="subCurrent" href="https://iit.sodexomyway.com">On Campus Dining</a></li>
										<li><a href="https://web.iit.edu/housing/nearby-restaurants">Nearby Restaurants</a></li>
									</ul>
								</li>
							<li class="current"><a href="index.php">Miscellaneous<span class="arrow"></span></a>
								<ul style="display: none;" class="sub_menu">
									<li class="arrow_top"></li>
									<li><a class="subCurrent" href="https://web.iit.edu/sites/web/files/departments/about-iit/pdfs/campus-map.pdf">University map</a></li>
									<li><a href="https://web.iit.edu/contact-us">Important contact Info</a></li>
									<li><a href="https://weather.com/weather/today/l/USIL0225:1:US">Weather Updates</a></li>
									<li><a href="https://web.iit.edu/sites/web/files/departments/acaps/pdfs/Illinois-Tech-Shuttle-Bus-Schedule.pdf">Shuttle Bus</a></li>
								</ul>
							</li>
							 <li><a href="logout.php">Logout</a></li>
						</ul>
					</nav>
		</div><!-- end fdw -->
	</header><!-- end header -->
    <h1 align="center" style="font-size:30px;">Welcome <?php echo $_SESSION['username']; ?>! </h1>
</div>
</body>
</html>
