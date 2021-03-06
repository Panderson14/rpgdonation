<?php
	session_start();
	if (!isset($_SESSION['email'])){
		header('Location: /index.php');
	}
?>

<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>RPG Charity</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing">
		<div id="page-wrapper">

			<!-- Header -->
				<?php
				include("loggedinmenu.php"); 
				?>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<?php
							$user_name = "root";
							$password = NULL;
							$database = "rpgcharity";
							$server = "localhost";

							mysql_connect("$server","$user_name","$password");

							mysql_select_db("$database");
							$email = $_SESSION['email'];
							$order = "SELECT * FROM siteusers WHERE email='$email'";
							$rogue;
							$warrior;
							$priest;
							$wizard;
							$result = mysql_query($order);
							$row = mysql_fetch_array($result);
							$rogue = $row['rogue'];
							$warrior = $row['warrior'];
							$priest = $row['priest'];
							$wizard = $row['wizard'];
							if ($rogue > 0 || $warrior > 0 || $priest > 0 || $wizard > 0){
								echo '<h2 align="center">Continue your adventure.</h2>
							<div align="center">';
								if ($warrior > 0){
									echo '<a href="warrior2.php" style ="border-bottom: none;"><img data-placement="bottom" data-toggle="tooltip" title= "Warrior" style= "width: 19%; height: auto;" src="images/Warrior.png" ></a>';
								}
								if ($wizard > 0){
									echo '<a href="wizard2.php" style ="border-bottom: none;"><img data-placement="bottom" data-toggle="tooltip" title= "Wizard" style= "width: 19%; height: auto;" src="images/Wizard.png" ></a>';
								}
								if ($priest > 0){
									echo '<a href="priest2.php" style ="border-bottom: none;"><img data-placement="bottom" data-toggle="tooltip" title= "Priest" style= "width: 19%; height: auto;" src="images/Priest.png"></a>';
								}
								if ($rogue > 0){
									echo '<a href="rogue2.php" style ="border-bottom: none;"><img data-placement="bottom" data-toggle="tooltip" title= "Rogue" style= "width: 19%; height: auto;" src="images/Rogue.png"></a>';
								}
								echo '</div>';
							}
							?>
							<h2 align="center">Start a new adventure.</h2>
							<div align="center">
						<a href="warrior1.php" style ="border-bottom: none;"><img data-placement="bottom" data-toggle="tooltip" title= "Warrior" style= "width: 19%; height: auto;" src="images/Warrior.png" ></a>
						<a href="wizard1.php" style ="border-bottom: none;"><img data-placement="bottom" data-toggle="tooltip" title= "Wizard" style= "width: 19%; height: auto;" src="images/Wizard.png" ></a>
						<a href="priest1.php" style ="border-bottom: none;"><img data-placement="bottom" data-toggle="tooltip" title= "Priest" style= "width: 19%; height: auto;" src="images/Priest.png"></a>
						<a href="rogue1.php" style ="border-bottom: none;"><img data-placement="bottom" data-toggle="tooltip" title= "Rogue" style= "width: 19%; height: auto;" src="images/Rogue.png"></a>
						</div>
						</header>
					</div> 
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="https://twitter.com/torryyang" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://github.com/Panderson14/rpgdonation" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="mailto:willwill@virginia.edu" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Patrick, Torry & Will</li><li>Design: <a href="http://html5up.net" >HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script>
			$(document).ready(function(){
   				 $('[data-toggle="tooltip"]').tooltip(); 
			});
			</script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</body>
</html>