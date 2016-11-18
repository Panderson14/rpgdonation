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
	<script>
		function seeResult(){
			var x = document.forms["ChoiceForm"]["attack"];

			var result = document.createElement("p");
			result.setAttribute("align","center");
			result.style.fontSize="150%";
			//alert(x);
			var page = document.getElementById("page");
			var form = page.childNodes[0];
			if (x.checked){
				result.appendChild(document.createTextNode("You decided to fight the troll. This was a terrible decision. He splatters you across the ground with his club. You are dead."));
				page.insertBefore(result, form);
				$("#submitbutton").remove();
				return false;
			}
			x = document.forms["ChoiceForm"]["run"];
			if (x.checked){
				result.appendChild(document.createTextNode("Smart move. You decided to run away. The troll saw you outrunning him and gave up. You escape."));
				page.insertBefore(result, form);
				$("#submitbutton").remove();
				var y = document.createElement("a");
				y.setAttribute("href","rogue2.php");
				y.setAttribute("class", "button small");

				y.appendChild(document.createTextNode("Proceed to the next adventure"));
				result.appendChild(y);
				y.setAttribute("align", "center");
				return false;
			}
			x = document.forms["ChoiceForm"]["talk"];
			if (x.checked){
				result.appendChild(document.createTextNode("You try talking about baseball with the troll. This works at first, until you say the Mets suck. Then the troll beats you into a puddle of blood. You are dead."));
				page.insertBefore(result, form);
				$("#submitbutton").remove();
				return false;
			}

			alert("You have to select a choice!");
			return false;

		}
	</script>
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
				<header id="header">
					<h1 id="logo"><a href="index.php">
						<img src="images/Charity RPG Logo.png" style="width:25%; height:auto; "></a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="signup.php" class="button special">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
			<section id="banner">
					<div class="content">
						<header id="page">
							<h2 align="center" id="Adventure">Rogue Adventure 1</h2>
							<div align="center">
							<p align="center" style="font-size: 150%"> You're wandering in a large, empty field. In the distance, you see a river, sparkling like nothing you've ever seen. You start to head towards it. As this happens, a troll appears, holding a club and wearing a half ripped baseball cap! What do you do? </p><br/><br/>
							<form id="ChoiceForm" name="ChoiceForm" onsubmit="return seeResult()">
								<div align="left" style="padding-left: 40%">
									<div>
  										<input  type="radio" name="choice" value="attack" id="attack"/>
  										<label for="attack"> Fight the troll with nothing but your fists</label><br>
  									</div>
  									<div>
  										<input  type="radio" name="choice" value="talk" id="talk"/> 
  										<label for="talk">Try to talk about the World Series with the troll</label><br>
	  								</div>
  									<div>
  										<input type="radio" name="choice" value="run" id="run"/>
  										<label for="run">Run for your life! </label> <br>
									</div>
									<div>
										<input type="submit" value="Submit" id="submitbutton">
									</div>

								</div>

							</form>
							</div>
						</header>
					</div> 
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="https://twitter.com/torryyang" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://github.com/Panderson14/rpgcharity" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
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