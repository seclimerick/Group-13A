<html><head>
		<title>UL Buy n' Sell - Item Details</title>
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
							
							<?php 
							if (!isset ($_SESSION)) {
								session_start();
							}
							
							if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ''){ 
								printf("<li><a href=\"./sell.php\" class=\"\">Sell</a></li>");
							    printf("<li><a href=\"./logout.php\" class=\"\">Logout</a></li>");
							} else {
								printf("<li><a href=\"./login.php\" class=\"\">Login</a></li>");
							}
							?>
						
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>UL Buy n' Sell</h2>
										</header>
<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
	    try {
            $dbh = new PDO("mysql:host=localhost;dbname=buynsell", "root", "");
            $stmt = $dbh->prepare("SELECT title, description FROM `items` WHERE id=:id" );
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                printf("<h2> %s </h2> <p> %s </p>\n", $row["title"], $row["description"]);
            } else {
                printf("Item not found.");
            }
        
		

        } catch (PDOException $exception) {
            printf("Connection error: %s", $exception->getMessage());
	
        }
    }

?>
												<ul class="actions small">
												<?php
												if (!isset ($_SESSION)) {
												session_start();
												}
							
												if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ''){ 
												?>
													<li><a href="#" class="button special small">Commit to buy</a></li>
												<?php } ?>
													<li><a href="./index.php" class="button small">Back</a></li>
												</ul>



										
										
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