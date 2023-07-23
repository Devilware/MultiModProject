<!-- 
        Author: Andrew Gilbey
Student Number: C00263656
-->
<?php

session_start();

include_once "db.inc.php"; // Required to connect to the db
require_once "keymg.inc.php"; // Required to connect to the key management db
include_once "cryptography.inc.php"; // Need for encryption/decryption of data

// Checks if form was submitted then pulls the data out
if (isset($_POST["submit"])) {
    $userID = $_SESSION["user_ID"]; //Get he user ID from the authenticated session
    $image = file_get_contents($_FILES["antigen"]["tmp_name"]); //retrieves the temporary name of an uploaded image file from the $_FILE
    $date = $_POST["date"];

}
//256-bit key size, requires a key length of 32 bytes
$key = random_bytes(32);



// Insert encrypted data into database
$sql ="INSERT INTO Antigens (FK_UserID, AG_Image, DateOfTest) VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL Error";
} else {
    //Encrypt the fields required
    $encrypted_image = encryptData($image, $key);
    $encrypted_date = encryptData($date, $key);
    // Bind to the statement
    mysqli_stmt_bind_param(
        $stmt,
        "iss",
        $userID,
        $encrypted_image,
        $encrypted_date
    );

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If it goes through
        $key_query = "INSERT INTO Key_Manager_Antigen (user_id, antigen_key) VALUES (?, ?)";
        $stmt = $key_mg_conn->prepare($key_query);

        //$hex_key = bin2hex($key);

        $stmt->bind_param("is", $userID, $key);
        $stmt->execute();
        $key_mg_conn->close();
        $stmt->close();

        header("Location: ../other/success.php?success=uploadSuccess");
        exit();
    } else {
        echo "Failed";
        exit();
    }
}
mysqli_stmt_close($stmt); //close the statement

?>
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