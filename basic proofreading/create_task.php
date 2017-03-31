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
    if (isset($_POST) && count ($_POST) > 0) {
//$user_id = htmlspecialchars(trim($_POST["user_id"]));
$task_type = htmlspecialchars(ucfirst(trim($_POST["task_type"])));
$title = htmlspecialchars(ucfirst(trim($_POST["title"]))); $description = htmlspecialchars(ucfirst(trim($_POST["description"])));
$req_words = htmlspecialchars(ucfirst(trim($_POST["req_words"])));
$word_count = htmlspecialchars(ucfirst(trim($_POST["word_count"])));
$total_pages = htmlspecialchars(ucfirst(trim($_POST["total_pages"])));
$file_format = htmlspecialchars(ucfirst(trim($_POST["file_format"])));
$due_date = htmlspecialchars(ucfirst(trim($_POST["due_date"])));
$due_time = htmlspecialchars(ucfirst(trim($_POST["due_time"])));
$tags = htmlspecialchars(ucfirst(trim($_POST["tags"])));
//$passOne = $_POST["pass_one"]; $passTwo = $_POST["pass_two"];
//check wheter user/email alerady exists
/*$dbh = new PDO("mysql:host=localhost;dbname=group13", "root");
$stmt = $dbh->prepare("SELECT user_id, email, password1 FROM userinfo WHERE email = ?" );
$stmt->execute(array($email));
$rowCount = $stmt->rowCount();
if ($passOne != $passTwo) { //in case Javascript is disabled.
printf("<h2> Passwords do not match. </h2>");
} else {
if ($rowCount > 0) {
printf("<h2> An account already exists with the given email.</h2>");
} else {*/
$query = "INSERT INTO tasks SET task_id = :task_id, user_id = :user_id, date = :date, expiry_date = :expiry_date, task_type = :task_type, title = :title, req_words = :req_words, word_count = :word_count, total_pages = :total_pages, file_format = :file_format, due_date = :due_date, due_time = :due_time, description = :description, tag = :tag";
$stmt = $dbh->prepare($query);
$siteSalt = "group13";
//$affectedRows = $stmt->execute(array(':user_id' => $user_id, ':user_type' => $user_type, ':email' => $email, ':first_name' => $firstName, ':last_name' => $lastName, ':password' => $saltedHash, ':level' => $level, ':discipline' => $discipline, ':current' => $current));
//if ($affectedRows > 0) {
//$insertId = $dbh->lastInsertId();
printf("<h2> Task successfully created %s! Please <a href=\"./login.php\"> login </a> to proceed. </h2>", $firstName);
//logout first
/*http://php.net/manual/en/function.session-unset.php*/
session_unset(); session_destroy(); session_write_close(); setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
} } } }

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
												<label> Required Words:</label>
												<input type="number" name="required_words" placeholder="required_words" maxlength="60"/>
												<label> Word Count:</label>
												<input type="number" name="word_count" placeholder="word_count" maxlength="60"/>
												<label> Total Pages:</label>
												<input type="number" name="total_pages" placeholder="total_pages" maxlength="60"/>
												<label> File Format:</label>
												<select name = "file_format">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'doc'>.doc</option>
												<option value = 'docx'>.docx</option>
												<option value = 'html'>.html</option>
												<option value = 'pdf'>.pdf</option>
												</select>
												<br>
												<ul>
												<label> Due Date:</label>
												<input type="date" name="due_date" placeholder="due_date" required="required"/>
												<label>Due Time:</label>
												<input type="time" name="due_time" placeholder="due_time" required="required"/>
												<label> Tags:</label>
												<form> <p>Pick 4 tags maximum </p> 
												<script type="text/javascript">
												</script>
												</head> 
												<body> 
												<div id="ScrollCB" style="height:150;width:400px;overflow:auto" name = tags> 
												<input type="checkbox" id="Accounting" value="Accounting"><label for="Accounting"> Accounting</label><br>
												<input type="checkbox" id="Database Design" value="Database Design"><label for="Database Design"> Database Design</label><br>
												<input type="checkbox" id="Design" value="Design"><label for="Design"> Design</label><br>
												<input type="checkbox" id="Disabilities" value="Disabilities"><label for="Disabilities"> Disabilities</label><br>
												<input type="checkbox" id="Education" value="Education"><label for="Education"> Education</label><br>
												<input type="checkbox" id="Engineering" value="Engineering"><label for="Engineering"> Engineering</label><br>
												<input type="checkbox" id="Equine" value="Equine"><label for="Equine"> Equine</label><br>
												<input type="checkbox" id="Food Sciences" value="Food Sciences"><label for="Food Sciences"> Food Sciences</label><br>
												<input type="checkbox" id="Health Sciences" value="Health Sciences"><label for="Health Sciences"> Health Sciences</label><br>
												<input type="checkbox" id="Law" value="Law"><label for="Law"> Law</label><br>
												<input type="checkbox" id="Medical" value="Medical"><label for="Medical"> Medical</label><br>
												<input type="checkbox" id="Mobile App Design" value="Mobile App Design"><label for="Mobile App Design"> Mobile App Design</label><br>
												<input type="checkbox" id="Networking" value="Networking"><label for="Networking"> Networking</label><br>
												<input type="checkbox" id="Nursing" value="Nursing"><label for="Nursing"> Nursing</label><br>
												<input type="checkbox" id="Programming" value="Programming"><label for="Programming"> Programming</label><br>
												<input type="checkbox" id="Psychology" value="Psychology"><label for="Psychology"> Psychology</label><br>
												<input type="checkbox" id="Software" value="Software"><label for="Software"> Software</label><br>
												<input type="checkbox" id="Sport" value="Sport"><label for="Sport"> Sport</label><br>
												<input type="checkbox" id="Technology" value="Technology"><label for="Technology"> Technology</label><br>
												<input type="checkbox" id="Web Design" value="Web Design"><label for="Web Design"> Web Design</label><br>
												</div>
											
												
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