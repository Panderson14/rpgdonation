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
			var x = document.forms["ChoiceForm"]["heal"];

			var result = document.createElement("p");
			result.setAttribute("align","center");
			result.style.fontSize="150%";
			var page = document.getElementById("page");
			var form = page.childNodes[0];
			if (x.checked){
				result.appendChild(document.createTextNode("You decided to heal him. Almost immediately, his gash is gone. He get's up quickly, thanks you, and heads down the road. You feel good about yourself."));
				page.insertBefore(result, form);
				$("#submitbutton").remove();
				var y = document.createElement("a");
				y.setAttribute("href","priest2.php");
				y.setAttribute("class", "button small");

				y.appendChild(document.createTextNode("Save progress and proceed to the next adventure"));
				var z = document.createElement("div");
				z.setAttribute("id", "buttondiv");
				z.setAttribute("align", "center");
				page.insertBefore(z, page.childNodes[1]);
				$("#buttondiv").append(y);
				return false;
			}
			x = document.forms["ChoiceForm"]["ignore"];
			if (x.checked){
				result.appendChild(document.createTextNode("You walk away from him. You're a real jerk, but you continue on your way."));
				page.insertBefore(result, form);
				$("#submitbutton").remove();
				var y = document.createElement("a");
				y.setAttribute("href","priest2.php");
				y.setAttribute("class", "button small");

				y.appendChild(document.createTextNode("Save progress and proceed to the next adventure"));
				var z = document.createElement("div");
				z.setAttribute("id", "buttondiv");
				z.setAttribute("align", "center");
				page.insertBefore(z, page.childNodes[1]);
				$("#buttondiv").append(y);
				return false;
			}
			x = document.forms["ChoiceForm"]["attack"];
			if (x.checked){
				result.appendChild(document.createTextNode("You snap his neck. You could have healed him, but you didn't how does that make you feel? You continue on your journey."));
				page.insertBefore(result, form);
				$("#submitbutton").remove();
				var y = document.createElement("a");
				y.setAttribute("href","priest2.php");
				y.setAttribute("class", "button small");
				y.appendChild(document.createTextNode("Save progress and proceed to the next adventure"));

				var z = document.createElement("div");
				z.setAttribute("id", "buttondiv");
				z.setAttribute("align", "center");
				page.insertBefore(z, page.childNodes[1]);
				$("#buttondiv").append(y);
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
				<?php
				include("loggedinmenu.php"); 
				?>
				<?php
				$user_name = "root";
				$password = NULL;
				$database = "rpgcharity";
				$server = "localhost";
				mysql_connect("$server","$user_name","$password");
				mysql_select_db("$database");
				$email = $_SESSION['email'];
				$order = "UPDATE siteusers 
							SET priest=0
							WHERE email='$email'";
				$result = mysql_query($order);
				?>

			<!-- Banner -->
			<section id="banner">
					<div class="content">
						<header id="page">
							<h2 align="center" id="Adventure">Priest Adventure 1</h2>
							<div align="center">
							<p align="center" style="font-size: 150%"> You're walking on a long road and you see an injured person up ahead. As you approach, he speaks. "Please help me. I can see that you are a priest, and I could really use some help. Please." You then notice the source of his injury: he has large gash on his side. What do you do? </p><br/><br/>
							<form id="ChoiceForm" name="ChoiceForm" onsubmit="return seeResult()">
								<div align="left" style="padding-left: 40%">
									<div>
  										<input  type="radio" name="choice" value="heal" id="heal"/>
  										<label for="heal"> Cast a spell of healing on him</label><br>
  									</div>
  									<div>
  										<input  type="radio" name="choice" value="ignore" id="ignore"/> 
  										<label for="ignore">Ignore him, and keep on walking</label><br>
	  								</div>
  									<div>
  										<input type="radio" name="choice" value="attack" id="attack"/>
  										<label for="attack">Put him out of his misery </label> <br>
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