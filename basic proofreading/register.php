<html><head>
		<title>UL Proofreading Service</title>
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
											<h2> UL Proofreading Service</h2>
										</header>

										<h2>Sign up</h2>
<?php
if (isset($_POST) && count ($_POST) > 0) {
	$forename = htmlspecialchars(ucfirst(trim($_POST["forename"])));
	$surname = htmlspecialchars(ucfirst(trim($_POST["surname"])));
	$email = trim(strtolower($_POST["email"]));
	$passOne = $_POST["pass_one"];
	$passTwo = $_POST["pass_two"];
	
	
	
	//check wheter user/email alerady exists
	$dbh = new PDO("mysql:host=localhost;dbname=proofreading", "root", "");
	$stmt = $dbh->prepare("SELECT id, email, password FROM Users WHERE email = ?" );
	$stmt->execute(array($email));
	$rowCount = $stmt->rowCount();
	if ($passOne != $passTwo) { //in case Javascript is disabled.
		printf("<h2> Passwords do not match. </h2>");
	} else {
		if ($rowCount > 0) { 
			printf("<h2> An account already exists with the given email.</h2>");
		} else {
			$query = "INSERT INTO users SET email = :email, forename = :forename, surname = :surname, password = :password";
			$stmt = $dbh->prepare($query);
			$siteSalt  = "proofreading";
			$saltedHash = hash('sha256', $passOne.$siteSalt);	
			$affectedRows = $stmt->execute(array(':email' => $email, ':forename' => $forename, ':surname' => $surname, ':password' => $saltedHash));
			
			if ($affectedRows > 0) {
					$insertId = $dbh->lastInsertId();
					printf("<h2> Welcome %s! Please <a href=\"./login.php\"> login </a> to proceed. </h2>", $forename);
													 //logout first
								/*http://php.net/manual/en/function.session-unset.php*/
								session_unset();
								session_destroy();
								session_write_close();
								setcookie(session_name(),'',0,'/');
								session_regenerate_id(true);		
				
			}
			


		}
	}
	

}

?>

<?php 

if (!isset($_POST) || count($_POST) == 0) { ?>
											<form method="post">
												<label> Student_ID:</label>
												<input type="integer" name="student_id" placeholder="student_id" required="required" maxlength="30"/>
												<label> User_Type:</label>
												<select name = "user_type">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'Student'>Student</option>
												<option value = 'Moderator'>Moderator</option>
												</select>
												<br>
												<label> Forename*:</label>
												<input type="text" name="forename" placeholder="forename" required="required" maxlength="30"/>
												<label> Surname:</label>
												<input type="text" name="surname" placeholder="surname" maxlength="25"/>
												<label> Discipline:</label>
												<select name = "discipline">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'Law and Accounting'>Law and Accounting</option>
												<option value = 'Midwifery'>Midwifery</option>
												<option value = 'Product Design and Technology'>Product Design and Technology</option>
												<option value = 'Computing Technologies'>Computing Technologies</option>
												<option value = 'Nursing (Mental Health)'>Nursing (Mental Health)</option>
												<option value = 'Nursing (Intellectual Disability)'>Nursing (Intellectual Disability)</option>
												<option value = 'Sport and Exercise Sciences'>Sport and Exercise Sciences</option>
												<option value = 'Software Engineering'>Software Engineering</option>
												</select>
												<br>
												<label> Level:</label>
												<select name = "level">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'BA'>BA</option>
												<option value = 'BSc'>BSc</option>
												<option value = 'MA'>MA</option>
												<option value = 'MSc'>MSc</option>
												<option value = 'PhD'>PhD</option>
												</select>
												<br>
												<label> Current:</label>
												<input type="text" name="current" placeholder="current" required="required" maxlength="60"/>
												<label> Email*:</label>
												<input type="text" name="email" placeholder="email" required="required" maxlength="60"/>
												<br>
												<label> Password*:</label>
												<input type="password" name="pass_one" placeholder="password" required="required" maxlength="50"/>
												<br>
												<label> Re-enter password*:</label>
												<input type="password" name="pass_two" placeholder="re-enter password" required="required" maxlength="50"/>
												<br>
												
												<button type="submit" class="button special small">Register</button>
												<button type="reset" class="button small">Reset</button>
												
										</form>
<?php } ?>	

<?php
if (isset($_POST) && count ($_POST) > 0) {
$student_id = htmlspecialchars(trim($_POST["student_id"]));
$user_type = htmlspecialchars(ucfirst(trim($_POST["user_type"])));
$forename = htmlspecialchars(ucfirst(trim($_POST["forename"]))); 
$surname = htmlspecialchars(ucfirst(trim($_POST["surname"])));
$discipline = htmlspecialchars(ucfirst(trim($_POST["discipline"])));
$level = htmlspecialchars(ucfirst(trim($_POST["level"])));
$current = htmlspecialchars(ucfirst(trim($_POST["current"])));
$email = trim(strtolower($_POST["email"]));
$passOne = $_POST["pass_one"]; 
$passTwo = $_POST["pass_two"];
//check wheter user/email alerady exists
$dbh = new PDO("mysql:host=localhost;dbname=proofreading", "root");
$stmt = $dbh->prepare("SELECT student_id, email, password1 FROM userinfo WHERE email = ?" );
$stmt->execute(array($email));
$rowCount = $stmt->rowCount();
if ($passOne != $passTwo) { //in case Javascript is disabled.
printf("<h2> Passwords do not match. </h2>");
} else {
if ($rowCount > 0) {
printf("<h2> An account already exists with the given email.</h2>");
} else {
$query = "INSERT INTO userinfo SET student_id = :student_id, user_type = :user_type, email = :email, forename = :forename, surname = :surname, password1 = :password, discipline = :discipline, level = :level, current = :current";
$stmt = $dbh->prepare($query);
$siteSalt = "proofreading";
$saltedHash = hash('sha256', $passOne.$siteSalt);
$affectedRows = $stmt->execute(array(':student_id' => $student_id, ':user_type' => $user_type, ':email' => $email, ':forename' => $forename, ':surname' => $surname, ':password' => $saltedHash, ':level' => $level, ':discipline' => $discipline, ':current' => $current));
if ($affectedRows > 0) {
$insertId = $dbh->lastInsertId();
printf("<h2> Welcome %s! Please <a href=\"./login.php\"> login </a> to proceed. </h2>", $forename);
//logout first
/*http://php.net/manual/en/function.session-unset.php*/
session_unset(); session_destroy(); session_write_close(); setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
} } } }
?>
								
										
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
