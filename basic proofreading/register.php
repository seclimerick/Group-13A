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
							<li><a href="./index.php" class="active">Home</a></li>
							
							<?php 
							if (!isset ($_SESSION)) {
								session_start();
								
							}
							
							if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ''){ 
								printf("<li><a href=\"#first\" class=\"\">Sell</a></li>");
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
											<h2> UL Proofreading Service</h2>
										</header>

										<h2>Sign up</h2>
<?php
if (isset($_POST) && count ($_POST) > 0) {
	$firstName = htmlspecialchars(ucfirst(trim($_POST["first_name"])));
	$lastName = htmlspecialchars(ucfirst(trim($_POST["last_name"])));
	$email = trim(strtolower($_POST["email"]));
	$passOne = $_POST["pass_one"];
	$passTwo = $_POST["pass_two"];
	
	
	
	//check wheter user/email alerady exists
	$dbh = new PDO("mysql:host=localhost;dbname=group13", "root", "");
	$stmt = $dbh->prepare("SELECT id, email, password FROM Users WHERE email = ?" );
	$stmt->execute(array($email));
	$rowCount = $stmt->rowCount();
	if ($passOne != $passTwo) { //in case Javascript is disabled.
		printf("<h2> Passwords do not match. </h2>");
	} else {
		if ($rowCount > 0) { 
			printf("<h2> An account already exists with the given email.</h2>");
		} else {
			$query = "INSERT INTO users SET email = :email, first_name = :first_name, last_name = :last_name, password = :password";
			$stmt = $dbh->prepare($query);
			$siteSalt  = "ulbuynsell";
			$saltedHash = hash('sha256', $passOne.$siteSalt);	
			$affectedRows = $stmt->execute(array(':email' => $email, ':first_name' => $firstName, ':last_name' => $lastName, ':password' => $saltedHash));
			
			if ($affectedRows > 0) {
					$insertId = $dbh->lastInsertId();
					printf("<h2> Welcome %s! Please <a href=\"./login.php\"> login </a> to proceed. </h2>", $firstName);
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
												<label> User_ID:</label>
												<input type="integer" User_ID="user_id" placeholder="user_id" required="required" maxlength="30"/>
												<label> User_Type:</label>
												<select name = "user_type">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'Student'>Student</option>
												<option value = 'Moderator'>Moderator</option>
												</select>
												<br>
												<label> First name*:</label>
												<input type="text" name="first_name" placeholder="first name" required="required" maxlength="30"/>
												<label> Last name:</label>
												<input type="text" name="last_name" placeholder="last name" maxlength="25"/>
												<label> Discipline:</label>
												<select name = "discipline">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'Law and Accounting'>Law and Accounting</option>
												<option value = 'Midwifery'>Midwifery</option>
												<option value = 'Product Design and Technology'>Product Des)ign and Technology</option>
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
$user_id = htmlspecialchars(trim($_POST["user_id"]));
$user_type = htmlspecialchars(ucfirst(trim($_POST["user_type"])));
$firstName = htmlspecialchars(ucfirst(trim($_POST["first_name"]))); $lastName = htmlspecialchars(ucfirst(trim($_POST["last_name"])));
$discipline = htmlspecialchars(ucfirst(trim($_POST["discipline"])));
$level = htmlspecialchars(ucfirst(trim($_POST["level"])));
$current = htmlspecialchars(ucfirst(trim($_POST["current"])));
$email = trim(strtolower($_POST["email"]));
$passOne = $_POST["pass_one"]; $passTwo = $_POST["pass_two"];
//check wheter user/email alerady exists
$dbh = new PDO("mysql:host=localhost;dbname=group13", "root");
$stmt = $dbh->prepare("SELECT user_id, email, password1 FROM userinfo WHERE email = ?" );
$stmt->execute(array($email));
$rowCount = $stmt->rowCount();
if ($passOne != $passTwo) { //in case Javascript is disabled.
printf("<h2> Passwords do not match. </h2>");
} else {
if ($rowCount > 0) {
printf("<h2> An account already exists with the given email.</h2>");
} else {
$query = "INSERT INTO userinfo SET user_id = :user_id, user_type = :user_type, email = :email, forename = :first_name, surname = :last_name, password1 = :password, discipline = :discipline, level = :level, current = :current";
$stmt = $dbh->prepare($query);
$siteSalt = "group13";
$saltedHash = hash('sha256', $passOne.$siteSalt);
$affectedRows = $stmt->execute(array(':user_id' => $user_id, ':user_type' => $user_type, ':email' => $email, ':first_name' => $firstName, ':last_name' => $lastName, ':password' => $saltedHash, ':level' => $level, ':discipline' => $discipline, ':current' => $current));
if ($affectedRows > 0) {
$insertId = $dbh->lastInsertId();
printf("<h2> Welcome %s! Please <a href=\"./login.php\"> login </a> to proceed. </h2>", $firstName);
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
