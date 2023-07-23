<style>
@import url('https://fonts.googleapis.com/css2?family=Golos+Text:wght@500&family=Roboto:wght@100&display=swap');
</style> 


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Registration Successful</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<div class="wrapper"  >
	<div class="form">
	<h1>Success!</h1>
	<?php
		// Check if a success code is present in the URL
		if (isset($_GET["success"])) {   //One page sends another to this one and dependant on the switch case will return a different result based on the success
			$successCode = $_GET["success"];
			// Display different success messages based on the success code
			switch ($successCode) {
				case "uploadSuccess":
					echo "<p>Your Image uploaded successfully.</p>";
					break;
				case "ccSuccess":
						echo "<p>Your Close contact uploaded successfully.</p>";
						break;
				default:
					echo "<p>An error has occurred. Please try again later.</p>";
					break;
			}
		} else {
			echo "<p>An error has occurred. Please try again later.</p>";
		}
		?>
		<p>Click <a href="../home.php">here</a> to return home.</p>
	</div>
</div>
<footer>
		<div class="footer">
            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sentinel <br> Andrew Gilbey© 2023 </p>
        </div>
	</footer>
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