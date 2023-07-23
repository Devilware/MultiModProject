<!--Google Font Import-->
<style>
@import url('https://fonts.googleapis.com/css2?family=Golos+Text:wght@500&family=Roboto:wght@100&display=swap');
</style> 

<?php
session_start(); //creates a session

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Sentinel</title>
	<link rel="stylesheet" type="text/css" href="style\style.css">
</head>
<body>
	<header>

        <h1> Welcome to Sentinel</h1>

        <nav class="navbar">
            <a href="upload.php">Upload an Antigen</a>
            <a href="closeContacts.php">Manage Close Contacts</a>
            <a href="manageDetails.php">Manage Details</a>
            <a href="includes/logout.inc.php">Logout</a>
          </nav>

          
	</header>
	<div class="wrapper">
        <div class="form">
        <h1><img src="images/sent-logo.png" alt="Sentinel" width="200"></h1>
        <b><p> Welcome to the Sentinel Portal</p></b>
        <P>Username: <?php echo $_SESSION["username"]; ?> </P>
        <p>Please click on the links in the naviagation bar in order to upload your antigen and input any close contacts</p>
        <p>Please note - you can change your personal details in the manage details section</p>	
        <p>If you wish to change/delete/modify any antigens uploaded or close contacts please email info@sentinel.ie</p>	
        <p>These changes will be reflected any time within 30 days as per GDPR requirements</p>
        <?php
            //echo "User ID: " . $_SESSION['user_ID'];
        ?>

	

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