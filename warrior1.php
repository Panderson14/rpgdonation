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
		function addAnswer(){
			var check = document.getElementById("response");
			if ($('#response').length == 0) {
				var x = document.createElement("input");
				x.setAttribute("type", "text");
				x.setAttribute("id", "response");
				$("#answerlabel").append(x);
			}
			
		}
		function removeAnswer(){
			$("#response").remove();
		}
		function seeResult(){
			var x = document.forms["ChoiceForm"]["answer"];

			var result = document.createElement("p");
			result.setAttribute("id", "result");
			result.setAttribute("align","center");
			result.style.fontSize="150%";
			//alert(x);
			var page = document.getElementById("page");
			var form = page.childNodes[0];
			if (x.checked){
				if ($("#response").val().toUpperCase() == "SKULL"){
					result.appendChild(document.createTextNode('The goblin looks over at you in outrage. "How did you get that right?! You are the first I have encountered to get that right!" The goblin breathes deeply and seems to relax. "I suppose a deal is a deal. You may pass." You continue deeper into the forest.'));
				var y = document.createElement("a");
				y.setAttribute("href","warrior2.php");
				y.setAttribute("class", "button small");
				y.appendChild(document.createTextNode("Save progress and proceed to the next adventure"));
				var z = document.createElement("div");
				z.setAttribute("id", "buttondiv");
				z.setAttribute("align", "center");
				page.insertBefore(z, page.childNodes[1]);
				
				$("#buttondiv").append(y);
				}else {
					result.appendChild(document.createTextNode('The goblin smiles sinisterly at you. "Guess what buddy? That is incorrect, and now you are going to pay the price." He then charges at you and stabs you in the chest repeatedly until you bleed out. You are dead.'));
				}
				page.insertBefore(result, form);
				$("#submitbutton").remove();
				return false;
			}
			x = document.forms["ChoiceForm"]["ignore"];
			if (x.checked){
				result.appendChild(document.createTextNode("You tried to ignore the goblin. Goblins don't like to be ignored. As you walk away, the goblin throws his knife at you and it hits you in the jugular. You can't breathe and you die."));
				page.insertBefore(result, form);
				$("#submitbutton").remove();
				
				return false;
			}
			x = document.forms["ChoiceForm"]["attack"];
			if (x.checked){
				result.appendChild(document.createTextNode("The goblin is very tiny. You easily pick him up by the throat and choke him out. The goblin is dead."));
				page.insertBefore(result, form);
				$("#submitbutton").remove();
				var y = document.createElement("a");
				y.setAttribute("href","warrior2.php");
				y.setAttribute("class", "button small");
				y.appendChild(document.createTextNode("Save progress and proceed to the next adventure"));
				result.appendChild(y);
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
							SET warrior=0
							WHERE email='$email'";
				$result = mysql_query($order);
				?>

			<!-- Banner -->
			<section id="banner">
					<div class="content">
						<header id="page">
							<h2 align="center" id="Adventure">Warrior Adventure 1</h2>
							<div align="center">
							<p align="center" style="font-size: 150%"> You are walking deep into a forest, and all of a sudden a goblin appears! The goblin is decked out in a suit, the kind you might find on characters like James Bond. You see the goblin is holding an ornate knife. Then he begins to speak. "Answer me this riddle, or prepare to die. I don't have eyes, but once I did see. Once I had thoughts, but now I'm white and empty." What do you do? </p><br/><br/>
							<form id="ChoiceForm" name="ChoiceForm" onsubmit="return seeResult()">
								<div align="left" style="padding-left: 40%">
									<div>
  										<input onclick="addAnswer()" type="radio" name="choice" value="answer" id="answer"/>
  										<label id = "answerlabel" for="answer"> Answer the riddle</label><br>
  									</div>
  									<div>
  										<input onclick = "removeAnswer()" type="radio" name="choice" value="attack" id="attack"/> 
  										<label for="attack">Fight the goblin with your bare fists</label><br>
	  								</div>
  									<div>
  										<input onclick = "removeAnswer()" type="radio" name="choice" value="ignore" id="ignore"/>
  										<label for="ignore">Ignore the goblin and brush past him </label> <br>
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