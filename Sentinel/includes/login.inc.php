<!-- 
        Author: Andrew Gilbey
Student Number: C00263656
-->
<?php
require_once "db.inc.php";

if (isset($_POST["username"], $_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM User WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["Password"])) {
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["user_ID"] = $row["user_ID"];
            header("Location: ../home.php");

            mysqli_stmt_close($stmt); //close the statement
            $conn->close(); //Connection close
            exit();
        } else {
            header("Location: ..other/error.php?error=invalidusernameorpassword");
        }
    } else {
        header("Location: ..other/error.php?error=invalidusernameorpassword");
    }
    mysqli_stmt_close($stmt); //close the statement
    $conn->close(); //Connection close
}
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