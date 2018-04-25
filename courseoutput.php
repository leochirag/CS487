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
function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'se'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$m1 = isset($_POST["M1"]);
$m2 = isset($_POST["M2"]);
$m3 = isset($_POST["M3"]);
$m4 = isset($_POST["M4"]);
$m5 = isset($_POST["M5"]);
$t1 = isset($_POST["T1"]);
$t2 = isset($_POST["T2"]);
$t3 = isset($_POST["T3"]);
$t4 = isset($_POST["T4"]);
$t5 = isset($_POST["T5"]);
$w1 = isset($_POST["W1"]);
$w2 = isset($_POST["W2"]);
$w3 = isset($_POST["W3"]);
$w4 = isset($_POST["W4"]);
$w5 = isset($_POST["W5"]);
$h1 = isset($_POST["H1"]);
$h2 = isset($_POST["H2"]);
$h3 = isset($_POST["H3"]);
$h4 = isset($_POST["H4"]);
$h5 = isset($_POST["H5"]);
$f1 = isset($_POST["F1"]);
$f2 = isset($_POST["F2"]);
$f3 = isset($_POST["F3"]);
$f4 = isset($_POST["F4"]);
$f5 = isset($_POST["F5"]);
$class1 = $_POST["C1"];
$class2 = $_POST["C2"];
$class3 = $_POST["C3"];

$wherequery=array();
for($i = 0; $i<25; $i++){
	$wherequery[$i]="";
}
if($m1){
	$wherequery[0] = "Day LIKE 'Monday' and Time=1; ";
}
if($m2){
	$wherequery[1] = "Day LIKE 'Monday' and Time=2 OR Time=3; ";
}
if($m3){
	$wherequery[2] = "Day LIKE 'Monday' and Time=4; ";
}
if($m4){
	$wherequery[3] = "Day LIKE 'Monday' and Time=5 OR Time=6; ";
}
if($m5){
	$wherequery[4] = "Day LIKE 'Monday' and Time=7; ";
}
if($t1){
	$wherequery[5] = "Day LIKE 'Tuesday' and Time=1; ";
}
if($t2){
	$wherequery[6] = "Day LIKE 'Tuesday' and Time=2 OR Time=3; ";
}
if($t3){
	$wherequery[7] = "Day LIKE 'Tuesday' and Time=4; ";
}
if($t4){
	$wherequery[8] = "Day LIKE 'Tuesday' and Time=5 OR Time=6; ";
}
if($t5){
	$wherequery[9] = "Day LIKE 'Tuesday' and Time=7; ";
}
if($w1){
	$wherequery[10] = "Day LIKE 'Wednesday' and Time=1; ";
}
if($w2){
	$wherequery[11] = "Day LIKE 'Wednesday' and Time=2 OR Time=3; ";
}
if($w3){
	$wherequery[12] = "Day LIKE 'Wednesday' and Time=4; ";
}
if($w4){
	$wherequery[13] = "Day LIKE 'Wednesday' and Time=5 OR Time=6; ";
}
if($w5){
	$wherequery[14] = "Day LIKE 'Wednesday' and Time=7; ";
}
if($h1){
	$wherequery[15] = "Day LIKE 'Thursday' and Time=1; ";
}
if($h2){
	$wherequery[16] = "Day LIKE 'Thursday' and Time=2 OR Time=3; ";
}
if($h3){
	$wherequery[17] = "Day LIKE 'Thursday' and Time=4; ";
}
if($h4){
	$wherequery[18] = "Day LIKE 'Thursday' and Time=5 OR Time=6; ";
}
if($h5){
	$wherequery[19] = "Day LIKE 'Thursday' and Time=7; ";
}
if($f1){
	$wherequery[20] = "Day LIKE 'Friday' and Time=1; ";
}
if($f2){
	$wherequery[21] = "Day LIKE 'Friday' and Time=2 OR Time=3; ";
}
if($f3){
	$wherequery[22] = "Day LIKE 'Friday' and Time=4; ";
}
if($f4){
	$wherequery[23] = "Day LIKE 'Friday' and Time=5 OR Time=6; ";
}
if($f5){
	$wherequery[24] = "Day LIKE 'Friday' and Time=7; ";
}

$sql1 = 'SELECT *
		FROM nextcourse
		WHERE CourseNo LIKE "'.$class1.'" OR CourseNo LIKE "'.$class2.'" OR CourseNo LIKE "'.$class3.'"';

$sql2 = 'SELECT *
		FROM nextcourse
		WHERE ';

$query1 = mysqli_query($conn, $sql1);
$query3 = mysqli_query($conn, $sql1);
$query2 = array();
for($i=0; $i<25; $i++){
	if($wherequery[$i]==""){
		console_log("Skipping Query: ".$i);
		$query2[$i]=null;
		continue;
	}
	$query2[$i] = mysqli_query($conn, $sql2.$wherequery[$i]);
}
if (!$query1) {
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
   <table class="data-table">
		<caption class="title">Required Classes</caption>
		<thead>
			<tr>
				<th>CourseNo</th>
				<th>Day</th>
				<th>Time</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no = 0;
		$total 	= 0;
		$completed = array();
		while ($row = mysqli_fetch_array($query1))
		{

			echo '<tr>

					<td>'.$row['CourseNo'].'</td>
					<td>'.$row['Day'].'</td>
					<td>'.$row['Time'].'</td>
					</tr>';
					$completed[$no]=$row;
					$no++;
		} ?>
		</tbody>
		<tfoot>
			<tr>
					</tr>
		</tfoot>
	</table>
	</br>
	<table class="data-table">
		<caption class="title">Possible Classes</caption>
		<thead>
			<tr>
				<th>CourseNo</th>
				<th>Day</th>
				<th>Time</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$total 	= 0;

		while ($row1 = mysqli_fetch_array($query3))
		{
			for($i=0; $i<25; $i++){
				if(!$query2[$i]){
					console_log(" Query not working : ".$i);
					continue;
				}
				while($row2 = mysqli_fetch_array($query2[$i])){
					if($row1['Day'] == $row2['Day'] && $row1['Time'] == $row2['Time']){continue;}
					for($j=0; $j<$no; $j++){
						if(!strcmp($completed[$j]['CourseNo'], $row2['CourseNo'])){
							continue 2;
						}
					}
					echo '<tr>

						<td>'.$row2['CourseNo'].'</td>
						<td>'.$row2['Day'].'</td>
						<td>'.$row2['Time'].'</td>
						</tr>';
						$completed[$no]=$row2;
						$no++;

		}
	}
} ?>
		</tbody>
		<tfoot>
			<tr>
					</tr>
		</tfoot>
	</table>
</div>
</body>
</html>
