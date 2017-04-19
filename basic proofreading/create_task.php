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
							    printf("<li><a href=\"./logout.php\" class=\"\">Logout</a></li>");
							} else {
								printf("<li><a href=\"./login.php\" class=\"\">next</a></li>");
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
$Student_ID = $_SESSION['user_id'];
//printf("student id %s",$Student_ID);
//$Student_ID = htmlspecialchars(ucfirst(trim($_POST["Student_ID"])));
$Task_Type = htmlspecialchars(ucfirst(trim($_POST["Task_Type"])));
$Title = htmlspecialchars(ucfirst(trim($_POST["Title"]))); 
$Description = htmlspecialchars(ucfirst(trim($_POST["Description"])));
$Req_Words = htmlspecialchars(ucfirst(trim($_POST["Req_Words"])));
$Word_Count = htmlspecialchars(ucfirst(trim($_POST["Word_Count"])));
$Total_Pages = htmlspecialchars(ucfirst(trim($_POST["Total_Pages"])));
$File_Format = htmlspecialchars(ucfirst(trim($_POST["File_Format"])));
$Due_Date = htmlspecialchars(ucfirst(trim($_POST["Due_Date"])));
//printf("Due Date: %s ",$Due_Date);
$Due_Time = htmlspecialchars(ucfirst(trim($_POST["Due_Time"])));
//$Due_Time = $Due_Time.":00";
//printf("Due Time: %s ",$Due_Time);
$Tag = htmlspecialchars(ucfirst(trim($_POST["Tag"])));
//$passOne = $_POST["pass_one"]; $passTwo = $_POST["pass_two"];
//check wheter user/email alerady exists
$dbh = new PDO("mysql:host=localhost;dbname=Proofreading", "root", "");
/*$stmt = $dbh->prepare("SELECT task_id FROM tasks WHERE task_id = ?" );
$stmt->execute(array($task_id));
$rowCount = $stmt->rowCount();
if ($passOne != $passTwo) { //in case Javascript is disabled.
	printf("<h2> Passwords do not match. </h2>");
} else {
			if ($rowCount > 0) {
			printf("<h2> This task already exists.</h2>");
			} else {*/
			
			//$student_id = 15181596
				$query = "INSERT INTO `tasks` (`Task_ID`,`Task_Type`, `Title`, `Req_Words`, `Word_Count`, `Total_Pages`, `File_Format`, `Due_Date`, `Due_Time`, `Description`, `Tag`, `Student_ID`) VALUES (null, :Task_Type , :Title, :Req_Words, :Word_Count, :Total_Pages, :File_Format, :Due_Date, :Due_Time, :Description, :Tag, :Student_ID)";
				//$query = "INSERT INTO Tasks SET Student_ID = :Student_ID, Task_Type = :Task_Type, Title = :Title, Req_Words = :Req_Words, Word_Count = :Word_Count, Total_Pages = :Total_Pages, File_Format = :File_Format, Due_Date = :Due_Date, Due_Time = :Due_Time, Description = :Description, Tags = :Tags";
				//$stmt->bindValue(':Task_Type', $Task_Type);
				$stmt = $dbh->prepare($query);
				//$siteSalt = "Proofreading";
				$temp = array(':Task_Type' => $Task_Type, ':Title' => $Title, ':Req_Words' => $Req_Words, ':Word_Count' => $Word_Count, ':Total_Pages' => $Total_Pages, ':File_Format' => $File_Format, ':Due_Date' => $Due_Date, ':Due_Time' => $Due_Time, ':Description' => $Description, ':Tag' => $Tag, ':Student_ID' => $Student_ID);
				

				$affectedRows = $stmt->execute($temp);
				$insertId = $dbh->lastInsertId();
				if ($affectedRows > 0) {
					//printf("Inserted rows is equal to %s", $affectedRows);
					$insertId = $dbh->lastInsertId();
					printf("<h2> Task successfully created!");
					//logout first
					//http://php.net/manual/en/function.session-unset.php
					//session_unset(); session_destroy(); session_write_close(); setcookie(session_name(),'',0,'/');
					//session_regenerate_id(true);
				}
			
		//}			
}

?>
<?php 

if (!isset($_POST) || count($_POST) == 0) { 
?> 
		<form method="post">
												<label> Task Type:</label>
												<select name = "Task_Type">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'Assignment'>Assignment</option>
												<option value = 'Dissertation'>Dissertation</option>
												<option value = 'Research_Paper'>Research_Paper</option>
												<option value = 'Thesis'>Thesis</option>
												</select>
												<br>
												<label> Title:</label>
												<input type="text" name="Title" placeholder="Title" required="required" maxlength="255"/>
												<label> Description:</label>
												<input type="text" name="Description" placeholder="Description" maxlength="60"/>
												<label> Required Words:</label>
												<input type="number" name="Req_Words" placeholder="Required_Words" maxlength="60"/>
												<label> Word Count:</label>
												<input type="number" name="Word_Count" placeholder="Word_Count" maxlength="60"/>
												<label> Total Pages:</label>
												<input type="number" name="Total_Pages" placeholder="Total_Pages" maxlength="60"/>
												<label> File Format:</label>
												<select name = "File_Format">
												<option value = '-Pick From List-'>-Pick From List-</option>
												<option value = 'doc'>.doc</option>
												<option value = 'docx'>.docx</option>
												<option value = 'html'>.html</option>
												<option value = 'pdf'>.pdf</option>
												</select>
												<br>
												<ul>
												<label> Due Date:</label>
												<input type="date" name="Due_Date" placeholder="Due_Date" required="required"/>
												<label>Due Time:</label>
												<input type="time" name="Due_Time" placeholder="Due_Time" required="required"/>
												<label> Tags:</label>
												<form> <p>Pick 4 tags maximum </p> 
												<script type="text/javascript">
												</script>
												</head> 
												<body> 
												<div id="ScrollCB" style="height:150;width:400px;overflow:auto" name = Tag> 
												<input type="checkbox" id="Accounting" value="Accounting" name = Tag><label for="Accounting"> Accounting</label><br>
												<input type="checkbox" id="Database Design" value="Database Design" name = Tag><label for="Database Design"> Database Design</label><br>
												<input type="checkbox" id="Design" value="Design"><label for="Design" name = Tag> Design</label><br>
												<input type="checkbox" id="Disabilities" value="Disabilities" name = Tag><label for="Disabilities"> Disabilities</label><br>
												<input type="checkbox" id="Education" value="Education" name = Tag><label for="Education"> Education</label><br>
												<input type="checkbox" id="Engineering" value="Engineering" name = Tag><label for="Engineering"> Engineering</label><br>
												<input type="checkbox" id="Equine" value="Equine"><label for="Equine" name = Tags> Equine</label><br>
												<input type="checkbox" id="Food Sciences" value="Food Sciences" name = Tag><label for="Food Sciences"> Food Sciences</label><br>
												<input type="checkbox" id="Health Sciences" value="Health Sciences" name = Tag><label for="Health Sciences"> Health Sciences</label><br>
												<input type="checkbox" id="Law" value="Law"><label for="Law" name = Tag> Law</label><br>
												<input type="checkbox" id="Medical" value="Medical"><label for="Medical" name = Tag> Medical</label><br>
												<input type="checkbox" id="Mobile App Design" value="Mobile App Design" name = Tag><label for="Mobile App Design"> Mobile App Design</label><br>
												<input type="checkbox" id="Networking" value="Networking" name = Tag><label for="Networking"> Networking</label><br>
												<input type="checkbox" id="Nursing" value="Nursing" name = Tag><label for="Nursing"> Nursing</label><br>
												<input type="checkbox" id="Programming" value="Programming" name = Tag><label for="Programming"> Programming</label><br>
												<input type="checkbox" id="Psychology" value="Psychology" name = Tag><label for="Psychology"> Psychology</label><br>
												<input type="checkbox" id="Software" value="Software" name = Tag><label for="Software"> Software</label><br>
												<input type="checkbox" id="Sport" value="Sport" name = Tag><label for="Sport"> Sport</label><br>
												<input type="checkbox" id="Technology" value="Technology" name = Tag><label for="Technology"> Technology</label><br>
												<input type="checkbox" id="Web Design" value="Web Design" name = Tag><label for="Web Design"> Web Design</label><br>
												</div>
											
												
												<button type="submit" class="button special small">Submit</button>
												<button type="reset" class="button small">Reset</button>
												
										</form>
										<?php 
												}
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