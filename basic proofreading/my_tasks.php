
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
				<nav id="nav" class="alt">
					<ul>
							<li><a href="./index.php" class="active">Home</a></li>
							
							<?php 
							if (!isset ($_SESSION)) {
								session_start();
								//printf("Student ID = %s", $_SESSION['user_id']);
							}
							
							if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ''){ 
							    printf("<li><a href=\"./logout.php\" class=\"\">Logout</a></li>");
							} else {
								printf("<li><a href=\"./login.php\" class=\"\">next</a></li>");
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
										</header>
									
										
									</div>
									
								</div>
							</section>
						<table border="2">
						  <thead>
							<tr>
							  <th>TaskID</th>
							  <th>Title</th>
							  <th>Student ID</th>
							  <th>Date Submitted</th>
							  <th>Due Date</th>
							</tr>
						  </thead>
			
			  
			<?php
				$Student_ID = $_SESSION['user_id'];
				//printf("student id = %s", $Student_ID);
				$dbh = new PDO("mysql:host=localhost;dbname=proofreading", "root", "");
				$stmt = $dbh->query("SELECT Task_ID, Student_ID, Date, Due_Date, Task_Type, Title FROM tasks where Student_ID = $Student_ID");
				//$stmt->execute(array(':Student_ID' => $Student_ID));
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$Task_ID = $row['Task_ID'];
					$Student_ID = $row['Student_ID'];
					$Date = $row['Date'];
					$Due_Date = $row['Due_Date'];
					$Title = $row['Title'];
					printf("
				<tr>
					<td> %s </td>
					<td> %s </td>
					<td> %s </td>
					<td> %s </td>
					<td> %s </td>
				</tr>", $Task_ID, $Title, $Student_ID, $Date, $Due_Date);
				}
			?>
				</table>
			
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
