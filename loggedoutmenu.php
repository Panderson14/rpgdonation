<header id="header">
	<h1 id="logo"><a href="index.php">
	<img src="images/Charity RPG Logo.png" style="width:25%; height:auto; "></a></h1>
	<nav id="nav">
	<form name="loginForm" method="post" action="Login.php">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><input type="text" name="email" id="email" placeholder="E-mail" required></li>
			<li><input type="password" name="password" id="password" placeholder="Password" required></li>
			<li><input type="submit" class="button special" value="Login"><!-- <a class="button special" onclick="loginForm.submit();">Login</a> --></li>
			<li><a href="signup.php" class="button special">Sign Up</a></li>
		</ul>
		</form>
	</nav>
</header>