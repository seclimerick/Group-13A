<html><head>
		<title>UL-Proofreading Service - Home</title>
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
					<nav id="nav" class="alt">
                        <ul>
							<li><a href="./landing.php" class="active">Home</a></li>
							<?php 
							if (!isset ($_SESSION)) {
								session_start();
							}
							if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ''){ 
							    printf("<li><a href=\"./Logout.php\" class=\"\">Logout</a></li>");
							} else {
								printf("<li><a href=\"./login.php\" class=\"\">Login</a></li>");
							}
							?>
						
						</ul>		
					</nav>
				
				</header>

				

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>UL-Proofreading Service</h2>
											</div>
							</section>
								<section id="all_tasks_list" class="main">
								<div class="spotlight">
									<div class="content">
								<button type="submit" class="button special small"> <a href="./task_list.php" class="active">View all tasks</a></button>										
										
									</div>
									
								</div>
							</section>
							
							<section id="my_task_list" class="main">
								<div class="spotlight">
									<div class="content">
								<button type="submit" class="button special small"> <a href="./my_tasks.php" class="active">My Tasks</a></button>										
										
									</div>
									
								</div>
							</section>
								<section id="create_task" class="main">
								<div class="spotlight">
									<div class="content">
								<button type="submit" class="button special small"> <a href="./create_task.php" class="active">Create Task</a></button>										
										
									</div>
									
								</div>
							</section>
										</header>
									
										
									</div>
									
								</div>
							</section>

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
