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

<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'se'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = 'SELECT *
		FROM courselist';

$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>


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
<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}

		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th,
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
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
	<form action="./courseoutput.php" method="post">
	<div>
		<h3 align="center">Choose Class Times</h3>

		<div id="Monday" style="width:480px; margin:0 auto;">
			<h4>Monday </h4>
			<label><input type="checkbox" name="M1" value="Monday Early Morning"> Early Morning</label>
			<label><input type="checkbox" name="M2" value="Monday Morning"> Morning</label>
			<label><input type="checkbox" name="M3" value="Monday Afternoon"> Afternoon</label>
			<label><input type="checkbox" name="M4" value="Monday Evening"> Evening</label>
			<label><input type="checkbox" name="M5" value="Monday Late Evening"> Late Evening</label>
		</div>

		<div id="Tuesday" style="width:480px; margin:0 auto;">
			<h4>Tuesday </h4>
			<label><input type="checkbox" name="T1" value="Tuesday Early Morning"> Early Morning</label>
			<label><input type="checkbox" name="T2" value="Tuesday Morning"> Morning</label>
			<label><input type="checkbox" name="T3" value="Tuesday Afternoon"> Afternoon</label>
			<label><input type="checkbox" name="T4" value="Tuesday Evening"> Evening</label>
			<label><input type="checkbox" name="T5" value="Tuesday Late Evening"> Late Evening</label>
		</div>

		<div id="Wednesday" style="width:480px; margin:0 auto;">
			<h4>Wednesday </h4>
			<label><input type="checkbox" name="W1" value="Wednesday Early Morning"> Early Morning</label>
			<label><input type="checkbox" name="W2" value="Wednesday Morning"> Morning</label>
			<label><input type="checkbox" name="W3" value="Wednesday Afternoon"> Afternoon</label>
			<label><input type="checkbox" name="W4" value="Wednesday Evening"> Evening</label>
			<label><input type="checkbox" name="W5" value="Wednesday Late Evening"> Late Evening</label>
		</div>

		<div id="Thursday" style="width:480px; margin:0 auto;">
			<h4>Thursday </h4>
			<label><input type="checkbox" name="H1" value="Thursday Early Morning"> Early Morning</label>
			<label><input type="checkbox" name="H2" value="Thursday Morning"> Morning</label>
			<label><input type="checkbox" name="H3" value="Thursday Afternoon"> Afternoon</label>
			<label><input type="checkbox" name="H4" value="Thursday Evening"> Evening</label>
			<label><input type="checkbox" name="H5" value="Thursday Late Evening"> Late Evening</label>
		</div>

		<div id="Friday" style="width:480px; margin:0 auto;">
			<h4>Friday </h4>
			<label><input type="checkbox" name="F1" value="Friday Early Morning"> Early Morning</label>
			<label><input type="checkbox" name="F2" value="Friday Morning"> Morning</label>
			<label><input type="checkbox" name="F3" value="Friday Afternoon"> Afternoon</label>
			<label><input type="checkbox" name="F4" value="Friday Evening"> Evening</label>
			<label><input type="checkbox" name="F5" value="Friday Late Evening"> Late Evening</label>
		</div>
	</div>

	<div>
		<div id="Req" style="width:200px; margin:0 auto;">
			<h4>Enter Required Courses </h4>
			<label>Class 1<input type="text" name="C1"></label>
			<br />
			<br />
			<label>Class 2<input type="text" name="C2"></label>
			<br />
			<br />
			<label>Class 3<input type="text" name="C3"></label>
		</div>
	</br>
	<div id="Sub" style="width:100px; margin:0 auto;">
		<input type="submit" value="Submit">
	</div>
	</form>
</body>
</html>
