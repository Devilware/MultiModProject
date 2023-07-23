<!-- 
        Author: Andrew Gilbey
Student Number: C00263656
-->
<?php

session_start();
include_once "db.inc.php";
require_once "keymg.inc.php";
include_once "cryptography.inc.php"; // Need for encryption/decryption of data
if (isset($_POST["submit"])) {
    $userID = $_SESSION["user_ID"]; //Get he user ID from the authenticated session
    $firstname = $_POST["CC_Firstname"];
    $lastname = $_POST["CC_Lastname"];
    $phone = $_POST["CC_Phone"];
}
//256-bit key size, requires a key length of 32 bytes
$key = random_bytes(32);
// the data is encrypted using AES-256-CTR cipher and then encoded using base64, which obscures the encrypted data
// Prepare the Prepared sTATEMENT
$sql ="INSERT INTO Close_Contacts (FK_userID, CC_Firstname, CC_Lastname, CC_Phone) VALUES (?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL Error";
} else {
    // Encrypt the form data
    $encrypted_firstname = encryptData($firstname, $key);
    $encrypted_lastname = encryptData($lastname, $key);
    $encrypted_phone = encryptData($phone, $key);

    // Bind to the statement
    mysqli_stmt_bind_param(
        $stmt,
        "isss",
        $userID,
        $encrypted_firstname,
        $encrypted_lastname,
        $encrypted_phone
    );
}
if ($stmt->execute()) {
    // If it goes through
    // Debug
    //echo $user_id;
    $key_query =
        "INSERT INTO Key_Manager_CloseContacts (user_id, cc_key) VALUES (?, ?)";
    $stmt = $key_mg_conn->prepare($key_query);
    $stmt->bind_param("is", $userID, $key);
    $stmt->execute();
    $key_mg_conn->close();
    $stmt->close();
    header("Location: ../other/success.php?success=ccSuccess");
    exit();
} else {
    // if it fails
    echo "Failed for reasons...";
    exit();
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
