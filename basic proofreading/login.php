<html><head>
		<title>UL Proofreading Service - Login</title>
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
							<li><a href="./landing.php" class="active">Home</a></li>
							<?php 
							if (!isset ($_SESSION)) {
								session_start();
								$_SESSION['user_id'] = session_id();
							}
				
							if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ''){ 
							    printf("<li><a href=\"./register.php\" class=\"\">Register</a></li>");
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
    
 
										
    if (isset($_POST["email"]) && isset($_POST["password1"]) && trim($_POST["email"]) !='' && trim($_POST["password1"]) != ''  ) {
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=proofreading", "root", "");
			//printf("inside login php");
            $email = trim(($_POST["email"]));
            $password = $_POST["password1"];	
			$passwordHash = "";
            $stmt = $dbh->prepare("SELECT Student_ID, Email, Password1 FROM userinfo WHERE Email = :email");
			$stmt->execute(array(':email' => $email));
			$Student_ID = null;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {      
                $Student_ID = $row['Student_ID'];
				$passwordHash = $row['Password1'];
			}
		printf("student id %s",$Student_ID);
		$siteSalt  = "proofreading";
		$saltedHash = hash('sha256', $password.$siteSalt);
		//if ($passwordHash == $saltedHash && !is_null($Student_ID)) {
			$_SESSION['user_id'] = $Student_ID;
			header("Location:./index.php");
		//} else {
			//printf("<h2> Password incorrect or account not found. </h2>");
		//}

    } catch (PDOException $exception) {
        printf("Connection error: %s", $exception->getMessage());
	
    }

    }
?>

										<h2>Login</h2>
										<form action="./login.php" method="post">
												<input type="text" name="email" placeholder="email" required="required" maxlength="35"/>
												<br>
												<input type="password" name="password1" placeholder="Password" required="required" maxlength="50"/>
												<br>
												<button type="submit" class="button special small">Login</button>
												<label>Don't have account yet ! <a href="./register.php">Sign Up</a></label>
										</form>
										
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
