
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sign Up</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script>
		function validateForm() {
		    var x = document.forms["newUserForm"]["email"].value;
		    var atpos = x.indexOf("@");
		    var dotpos = x.lastIndexOf(".");
		    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		        alert("Not a valid e-mail address");
		        return false;
		    }
		}
		</script>
	</head>
	<body>
		<div id="page-wrapper" style="background-color:rgba(39, 40, 51, 0.965);">

			<!-- Header -->
				<?php
				include("loggedoutmenu.php"); 
				?>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Sign up for your free account</h2>
							<p>Start saving the world now!</p>
						</header>

						<!-- Form -->
							<section>
								
								<form name="newUserForm" method="post" onsubmit="return validateForm()" action="CreateAccount.php">
									<div class="row uniform 50%">
										<div class="12u$">
											<h3>Personal Information</h3>
										</div>
										<div class="6u 12u$(xsmall)">
											<input type="text" name="first" id="first" value="" placeholder="First Name" pattern="[a-zA-Z]+[a-zA-Z ]+" required title="letters & spaces only"/>
										</div>
										<div class="6u$ 12u$(xsmall)">
											<input type="text" name="last" id="last" value="" placeholder="Last Name" pattern="[a-zA-Z]+[a-zA-Z ]+" required title="letters & spaces only"/>
										</div>
										<div class="6u 12u$(xsmall)">
											<input type="email" name="email" id="email" value="" placeholder="Email"  required/>
										</div>										
										<div class="6u$ 12u$(xsmall)">
											<input type="password" name="pass" id="pass" value="" placeholder="Password" pattern=".{5,}"  required title="5 characters minimum"/>
										</div>
										<div class="12u$">
											<input type="text" name="address" id="address" value="" placeholder="Address" pattern="[a-zA-Z0-9]+[a-zA-Z0-9\- ]+" required title="letters, numbers, spaces & hyphens only"/>
										</div>
										<div class="4u 12u$(xsmall)">
											<input type="text" name="city" id="city" value="" placeholder="City" pattern="[a-zA-Z]+[a-zA-Z ]+" required title="letters & spaces only"/>
										</div>
										<div class="4u 12u$(xsmall)">
											<div class="select-wrapper">
												<select name="state" id="state" required>
													<option value="">State</option>
													<option value="AL">Alabama</option>
													<option value="AK">Alaska</option>
													<option value="AZ">Arizona</option>
													<option value="AR">Arkansas</option>
													<option value="CA">California</option>
													<option value="CO">Colorado</option>
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="DC">District Of Columbia</option>
													<option value="FL">Florida</option>
													<option value="GA">Georgia</option>
													<option value="HI">Hawaii</option>
													<option value="ID">Idaho</option>
													<option value="IL">Illinois</option>
													<option value="IN">Indiana</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="ME">Maine</option>
													<option value="MD">Maryland</option>
													<option value="MA">Massachusetts</option>
													<option value="MI">Michigan</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="MT">Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NV">Nevada</option>
													<option value="NH">New Hampshire</option>
													<option value="NJ">New Jersey</option>
													<option value="NM">New Mexico</option>
													<option value="NY">New York</option>
													<option value="NC">North Carolina</option>
													<option value="ND">North Dakota</option>
													<option value="OH">Ohio</option>
													<option value="OK">Oklahoma</option>
													<option value="OR">Oregon</option>
													<option value="PA">Pennsylvania</option>
													<option value="RI">Rhode Island</option>
													<option value="SC">South Carolina</option>
													<option value="SD">South Dakota</option>
													<option value="TN">Tennessee</option>
													<option value="TX">Texas</option>
													<option value="UT">Utah</option>
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WA">Washington</option>
													<option value="WV">West Virginia</option>
													<option value="WI">Wisconsin</option>
													<option value="WY">Wyoming</option>
												</select>
											</div>
										</div>
										<div class="4u$ 12u$(xsmall)">
											<input type="text" name="zipcode" id="zipcode" value="" pattern="[0-9]{5}" placeholder="Zip Code" required title="5-digit zip code"/>
										</div>
<!-- 										<div class="12u$(medium)">
											<input type="checkbox" id="terms" name="terms" required>
											<label for="terms">By clicking this button, you agree to our terms and conditions.</label>
										</div> -->
										<div class="12u$">
											<h3>Banking Information</h3>
										</div>
										<div class="12u$">
											<div class='card-wrapper'></div>
										</div>
										<div class="4u 12u$(xsmall)">
											<input type="text" name="number" id="card" value="" placeholder="Credit Card Number" required title="credit card number"/>
										</div>
										<div class="4u 12u$(xsmall)">
											<input type="text" name="name" id="name" value="" pattern="[a-zA-Z]+[a-zA-Z ]+" placeholder="Full Name" required title="full name"/>
										</div>
										<div class="2u 12u$(xsmall)">
											<input type="text" name="expiry" id="expiry" value="" placeholder="MM/YY" required title="MM/YY"/>
										</div>					
										<div class="2u$ 12u$(xsmall)">
											<input type="text" name="cvc" id="cvc" value="" placeholder="CVV" required title="3-4 digit number"/>
										</div>
										<div class="12u$">
												<input type="submit" value="Create account" class="button special fit" />
										</div>
									</div>

								</form>
							</section>
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
			<script src="assets/js/card.js"></script>
			<script>
		        new Card({
		            form: document.querySelector('form'),
		            container: '.card-wrapper'
		        });
			</script>
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