<html><head>
		<title>UL Proofreading Service - Item Details</title>
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
											<h2>UL Proofreading Service</h2>
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
<?php 

if (!isset($_POST) || count($_POST) == 0) { ?>
											<form method="post">
												<label> Task Type:</label>
												<select name = "task_type">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'Assignment'>Assignment</option>
												<option value = 'Dissertation'>Dissertation</option>
												<option value = 'Research_Paper'>Research_Paper</option>
												<option value = 'Thesis'>Thesis</option>
												</select>
												<br>
												<label> Title:</label>
												<input type="text" name="title" placeholder="title" required="required" maxlength="255"/>
												<label> Description:</label>
												<input type="text" name="description" placeholder="description" maxlength="60"/>
												<label> File Format:</label>
												<select name = "file_format">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'doc'>.doc</option>
												<option value = 'docx'>.docx</option>
												<option value = 'html'>.html</option>
												<option value = 'pdf'>.pdf</option>
												</select>
												<br>
												
												
												<button type="submit" class="button special small">Submit</button>
												<button type="reset" class="button small">Reset</button>
												
										</form>
<?php } ?>									
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