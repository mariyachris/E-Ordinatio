<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>E-ordinatio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Jewel a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link href="../css/contact.css" rel='stylesheet' type='text/css' />
	<link href="../css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Prata" rel="stylesheet">
	<style type="text/css">
.form-style-5{
    max-width: 500px;
    padding: 10px 20px;
    background: #f4f7f8;
    margin: 10px auto;
    padding: 20px;
    background: #f4f7f8;
    border-radius: 8px;
    font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
    border: none;
}
.form-style-5 legend {
    font-size: 1.4em;
    margin-bottom: 10px;
}
.form-style-5 label {
    display: block;
    margin-bottom: 8px;
}
.form-style-5 input[type=text], .form-style-5 input[type=date], .form-style-5 input[type=datetime], .form-style-5 input[type=email], .form-style-5 input[type=number], .form-style-5 input[type=search], .form-style-5 input[type=time], .form-style-5 input[type=url], .form-style-5 input[type=password], .form-style-5 textarea, .form-style-5 select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: none;
    border-radius: 4px;
    font-size: 16px;
    margin: 0;
    outline: 0;
    padding: 7px;
    width: 100%;
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    background-color: #e8eeef;
    color:#8a97a0;
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
    
}
.form-style-5 input[type=text]:focus, .form-style-5 input[type=date]:focus, .form-style-5 input[type=datetime]:focus, .form-style-5 input[type=email]:focus, .form-style-5 input[type=number]:focus, .form-style-5 input[type=search]:focus, .form-style-5 input[type=time]:focus, .form-style-5 input[type=url]:focus, .form-style-5 input[type=password]:focus, .form-style-5 textarea:focus, .form-style-5 select:focus{
    background: #d2d9dd;
}
.form-style-5 select{
    -webkit-appearance: menulist-button;
    height:35px;
}
.form-style-5 .number {
    background: #dd4026;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type=submit], .form-style-5 input[type=button]
{
    position: relative;
    display: block;
    padding: 19px 39px 18px 39px;
    color: #FFF;
    margin: 0 auto;
    background: #dd4026;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    width: 100%;
    border: 1px solid #dd4026;
    border-width: 1px 1px 3px;
    margin-bottom: 10px;
}
.form-style-5 input[type=submit]:hover, .form-style-5 input[type=button]:hover
{
    background: #292b2c;
    border: 1px solid #292b2c;
}
</style>
	<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 150px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

#snackbar1 {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 150px;
    font-size: 17px;
}

#snackbar1.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 150px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 150px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 150px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 150px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
#contentArea
{
	height:500px;
}
</style>

</head>

<body>
	<!--Header-->

	<header>
		<div class="top-bar_sub_w3layouts_agile">
			<h6>
				<i class="fa fa-phone" aria-hidden="true"></i> Call Us : 04872556957
				<!--<a href="contact.html">Contact Us </a>-->
			</h6>
			
			<div class="clearfix"> </div>
		</div>

		<div class="header_top" id="home">
			<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
				    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="index.html">
				<img src="../images/icon123.png" style="margin-top: -9px;">
					<span style="margin-left: -11px;font-size: 36px;">RDINATIO</span></a>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
						<li class="nav-item ">
							<a class="nav-link cool" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle cool" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Add
								<i class="fas fa-angle-down"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="addrommsandhalls.php">Rooms & halls</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="adddepatment.php">Add department</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="addfaculty.php">Add faculty</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="nominalroll.php">Add Nominal roll</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="timetable.php">Add timetable</a>
							</div>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle cool" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Report
								<i class="fas fa-angle-down"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="report_invigilation.php">Invigilation Duties</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="report_seatArrangement.php">Seat Arrangement</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="addfaculty.php">Add faculty</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="nominalroll.php">Add Nominal roll</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="timetable.php">Add timetable</a>
							</div>
						</li>
						
						<li class="nav-item">
							<a class="nav-link cool" href="seatarrangement.php">Arrange seat</a>
						</li>	
						<!--<li class="nav-item">
							<a class="nav-link cool" href="invigilationarrangement.php">Allocate invigilation</a>
						</li>-->
						<li class="nav-item">
							<a class="nav-link cool" href="../index.php">Logout</a>
						</li>
					</ul>
				</div>
			</nav>

		</div>
	</header>
	

