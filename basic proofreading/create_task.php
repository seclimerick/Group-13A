<html><head>
		<title>UL Proofreading Service - Item Details</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css">
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
		<script type="text/javascript">

		/***********************************************
		* Limit number of checked checkboxes script- by JavaScript Kit (www.javascriptkit.com)
		* This notice must stay intact for usage
		* Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and 100s more
		***********************************************/

		function checkboxlimit(checkgroup, limit){
			var checkgroup=checkgroup
			var limit=limit
			for (var i=0; i<checkgroup.length; i++){
				checkgroup[i].onclick=function(){
				var checkedcount=0
				for (var i=0; i<checkgroup.length; i++)
					checkedcount+=(checkgroup[i].checked)? 1 : 0
				if (checkedcount>limit){
					alert("You can only select a maximum of "+limit+" checkboxes")
					this.checked=false
					}
				}
			}
		}

		</script>

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
												<div id="ScrollCB" style="height:150;width:400px;overflow:auto"> 
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
												<script type="text/javascript">

												//Syntax: checkboxlimit(checkbox_reference, limit)
												checkboxlimit(create_task, 4)

</script>
											
												
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