<!-- 
        Author: Andrew Gilbey
Student Number: C00263656
-->
<style>
@import url('https://fonts.googleapis.com/css2?family=Golos+Text:wght@500&family=Roboto:wght@100&display=swap');
</style> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Antigen Upload</title>
	<link rel="stylesheet" type="text/css" href="style\style.css">
</head>
<body>
<header>
  <h1>Welcome to Sentinel</h1>

  <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="closeContacts.php">Manage Close Contacts</a>
            <a href="manageDetails.php">Manage Details</a>
            <a href="includes/logout.inc.php">Logout</a>
          </nav>
</header>
	<div class="wrapper">
    <div class="form">
            <h1><img src="images/sent-logo.png" alt="Sentinel" width="200"></h1>
            <b><p> Welcome to the Sentinel Portal</p></b>
            <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
            <label for="antigen">Antigen:</label>
            <input type="file" id="antigen" name="antigen" onchange="previewImage(event);">
            <br>
            <label for="antigen">Image Preview:</label>
            <img id="preview" alt="Antigen Preview will be displayed here" width="423px" height="237px" style="display: inline-block"><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date">
            <div class=smallText> 
            <i>By uploading this image, you confirm that you possess the rights to share it, and give your consent for its 
                use in accordance with the provisions of the General Data Protection Regulation (GDPR). 
                If you do not have permission to distribute this image, you may face legal repercussions, 
                which includes penalties. This image should only display your own test.</i>
</div>
            <button type="submit" name="submit">Upload</button>
        </form>
        <h1>Current Antigens</h1>
		<table>
			<thead>
				<tr>
					<th>Antigen Photo</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
    session_start();

    $userID = $_SESSION["user_ID"]; // get logged in user id
    include_once "includes/db.inc.php"; //include the database connection script
    include_once "includes/cryptography.inc.php";
    require_once "includes/keymg.inc.php"; 

    $user_ID = $_SESSION['user_ID'];
    $userID = $user_ID; // Define $userID variable

    // Grab all keys for the current user
    $key_query = "SELECT antigen_key FROM Key_Manager_Antigen WHERE user_id = ?";
    $stmt = $key_mg_conn->prepare($key_query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Store the keys in an array
    $keys = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $keys[] = $row['antigen_key'];
    }
    $stmt->close();
    $sql = "SELECT AG_Image, DateOfTest FROM Antigens WHERE FK_UserID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../upload.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $imageData = $row['AG_Image'];
        $date = $row['DateOfTest'];
        $key = $keys[$i];
        $date = decryptData($date, $key);
        $formattedDate = date("Y-m-d", strtotime($date));
        $image = decryptData($imageData, $key); // Decrypt the image
        $imageSrc = 'data:image/png;base64,' . base64_encode($image); // Convert the decrypted binary data to a base64-encoded string so it can be embedded
        echo "<tr>";
        echo "<td><img src='" . $imageSrc . "' alt='Antigen Preview' width='200'></td>";
        echo "<td>" . $formattedDate . "</td>"; // Decrypt the date using the key
        echo "</tr>";
        $i++;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    ?>
    <tr>
      <td>
			</tbody>
		</table>
    </div>
        </div>
    </div>
	<footer>
		<div class="footer">
            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sentinel <br> Andrew Gilbey© 2023 </p>
        </div>
	</footer>

<!-- Java Script -->

	<script>
        // This is used to display the image preview on the screen
function previewImage(event) {
        // Create a new FileReader object
        var reader = new FileReader();
        // Set up a function to run when the file is loaded
        reader.onload = function() {
        // Get the image element with ID "preview"
        var output = document.getElementById('preview');
        // Set the image source to the FileReader's result (which is a data URL)
        output.src = reader.result;
        // Make the image visible by setting its display property to "block"
        output.style.display = 'block';
    }
    // Read the contents of the selected file as a data URL
    reader.readAsDataURL(event.target.files[0]);

}
    </script>
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

