<style>
@import url('https://fonts.googleapis.com/css2?family=Golos+Text:wght@500&family=Roboto:wght@100&display=swap');
</style> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style\style.css">
</head>
<body>
	<div class="wrapper">
		<div class="form" >
			<img src="images/sent-logo.png" alt="Sentinel" width="200">
            <br><br>
			<form action="includes/login.inc.php" method="POST">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
			<button type="submit">Login</button>
			<a href="signup.php"><button type="button">Register</button></a>
		</form>
		</div>
	</div>
	<div class="footer">
		<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sentinel <br> Andrew Gilbey© 2023 </p>
	</div>
</body>
</html>
<!-- References -->
<!--
    Date formatting:
    PHP MySQL Prepared Statements (no date) PHP mysql prepared statements. 
    W3 Schools. Available at: https://www.w3schools.com/php/php_mysql_prepared_statements.asp (Accessed: February 21, 2023).

    Prepared Statements in PHP:
    PHP MySQL Prepared Statements (no date) PHP mysql prepared statements. 
    W3 Schools. Available at: https://www.w3schools.com/php/php_mysql_prepared_statements.asp (Accessed: February 21, 2023). 

    Password-Confirm Password Validation:
    How to - password validation (no date) How To Create a Password Validation Form. 
    W3 Schools. Available at: https://www.w3schools.com/howto/howto_js_password_validation.asp (Accessed: March 8, 2023). 

    Image Preview Pre-Upload:
    10:40 / 14:39 Previewing Image Before File Upload On Websites - HTML, CSS &amp; JavaScript Tutorial (2019) Previewing Image Before File Upload On Websites - 
    HTML, CSS &amp; JavaScript Tutorial. dcode. Available at: https://www.youtube.com/watch?v=VElnT8EoEEM (Accessed: Feburary 21, 2023). 
-->