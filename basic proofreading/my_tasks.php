<html><head>
		<title>UL-Proofreading Service - My Tasks</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<header id="header" class="alt">
				</header>

				<!-- Nav -->
					<nav id="nav" class="alt">
						<ul>
							<li><a href="./index.php" class="active">Home</a></li>
							
							<li><a href="./logout.php" class="">Logout</a></li>						
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>UL-Proofreading Service</h2>
										</header>
									
										
									</div>
									
								</div>
							</section>
			<?php
				//if (isset($_GET["User_ID"])) {
				$id = 16123234;
				try{
					$dbh = new PDO("mysql:host=localhost;dbname=Proofreading", "root", "");
					while($row_data = mysql_fetch_array($row_data))
					{
						$Task_ID = $row_data['Task_ID'];
						$Title = $row_data['Title'];
						echo $Task_ID;
						echo $Title;
					}
					}
				catch (PDOException $exception) {
					printf("Connection error: %s", $exception->getMessage());
	
				}
				//}
			?>
										<!-- First Section -->
							
							
						
							

						<!-- Get Started -->
							

					</div>

				<!-- Footer -->
					<footer id="footer">
						
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	
</body></html>
