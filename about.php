<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>About Us</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper" style="background-color:rgba(39, 40, 51, 0.965);">

			<!-- Header -->
				<?php
				session_start();
				if (isset($_SESSION['email'])){
					include("loggedinmenu.php");
				}else{
					include("loggedoutmenu.php");
				} 
				?>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>About Us</h2>
						</header>

						<!-- Text -->
							<section>
								<p>RPG Charity is a non-profit that allows people to donate to their favorite charities while having fun, too. At RPG Charity, users can set up recurring donations, or they can play any of the role-playing scenarios we currently have available. With a large selection of different storylines, users will have countless hours of gameplay while giving back to those in need. </p>

								<p>Many people sincerely support helping the less fortunate in whatever way they can. However often times they simply forget to do so or they feel like they don’t have enough time or resources available to them. We have designed two ways of donating to help any user contribute. With recurring payments, users can easily set up monthly donations at any price, which they can cancel at any time. Alternatively, they can choose to embark on a text-based RPG adventure. Each choice along the fantastical journey is also a choice to decide which charity they want to donate a small contribution to. At the end of the quest, the sum of all the choices will be calculated, and the user can choose to add more or less funding to the final result.</p>

								<p>Our donating strategy is quite unlike competing alternatives. While most charities operate under the monthly subscription that we also provide, they often do not have an initial incentive to get people inspired to donate who do not already plan on donating. Furthermore, many people hesitate when it comes to setting up subscription-based donations and would prefer one-time donations. Often, these one-time donations are less frequent than the monthly subscriptions. An entertaining RPG experience, like what we provide, offers the “no strings attached” one-time donation option, while incentivizing people to keep coming back for more.</p>

								<p>Torry, Will, and I are grateful that you have decided to visit our website, and we hope to assist you in your charitable endeavors as best as we can.</p>

								<p>Patrick Anderson<br>Co-founder & Chief Executive Officer</p>


					</div>
				</div>

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

	</body>
</html>