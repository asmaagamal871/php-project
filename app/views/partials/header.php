<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>El-La3eeb</title>

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

	<!-- Accordion -->
	<link href="/css/sidebar-accordion.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="/css/custom.css" rel="stylesheet">

	<link rel="icon" type="image/x-icon" href="images/ball.ico">

</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<!-- header -->
			<div style="height:fit-content;" class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="/home" class="site_title"><img src="/images/ball.gif" width=40px><span>El-La3eeb!</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="/images/default.png" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?php
								echo  $_SESSION['username'];
								?>
							</h2>

						</div>
						<small>
							<p class="text-center "><strong>last login: </strong>
								<?php
								$timestamp = strtotime($_SESSION['last_login']);
								$readable_datetime = date('F j, Y - g:i a', $timestamp);

								echo  $readable_datetime;
								?>
							</p>
						</small>
					</div>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu editmargin">
						<div class="menu_section">
							<h3>General</h3>
							<div class="contenedor-menu">

								<ul class="menu">
									<li><a href="/home"><i class="fa fa-home"></i> Dashboard
										</a></li>
										<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
									<li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
										<ul>
											<li><a href="/users">Index</a></li>
											<li><a href="/users/create">Create</a></li>
										</ul>
									</li>
									<?php } ?>
									<?php if (isset($_SESSION['role']) &&($_SESSION['role'] == 'admin'||$_SESSION['role'] == 'editor')) { ?>

									<li><a><i class="fa fa-group"></i> Groups <span class="fa fa-chevron-down"></span></a>
										<ul>
											<li><a href="/groups">Index</a></li>

											<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
											<li><a href="/groups/create">Create</a></li>
									<?php } ?>

										</ul>
									</li>
									<?php } ?>


									<li><a><i class="fa fa-edit"></i> Articles <span class="fa fa-chevron-down"></span></a>
										<ul>
											<li><a href="/articles">Index</a></li>
											<li><a href="/articles/create">Create</a></li>
										</ul>
									</li>
								</ul>

							</div>
						</div>
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<!-- <div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div> -->
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<!-- <div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div> -->
					<nav class="nav navbar-nav">
						<div class="contenedor-menu">
							<ul class=" navbar-right menu">
								<li class="nav-item dropdown open" style="padding-left: 15px;">

									<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
										<img class="top-nav-img" src="/images/default.png" alt="">
										<?php
										echo  $_SESSION['username'];
										?>
									</a>
									<ul class="dropdown-menu dropdown-usermenu pull-right">
										<li> <a class="dropdown-item" href='/users/<?php echo $_SESSION["user_id"]; ?>'><i class="fa fa-user new-icon"></i> Profile</a></li>
										<li> <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out pull-right new-icon"></i>
												Log Out</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>