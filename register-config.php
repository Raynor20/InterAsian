<?php
session_start();

include("database.php");   //db

$registrationMessage = "";  //for the successful reg line
$errorMessage = "";   //for validation erroR msgs

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //Registration validation
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)) {
        $registrationMessage = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Invalid email format.";
    } elseif (strlen($password) < 6) {
        $errorMessage = "Password must be at least 6 characters long.";
    } elseif ($password !== $confirm_password) {
        $errorMessage = "Passwords do not match.";
    } else {
        $email_check_sql = "SELECT * FROM users WHERE email = '$email'";
        $email_check_result = $conn->query($email_check_sql);

        if ($email_check_result->num_rows > 0) {
            $errorMessage = "Email already exists. Please use a different email.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);   //hash pass

            $sql = "INSERT INTO users (firstname, lastname, email, password, role) VALUES ('$firstname', '$lastname', '$email', '$hashed_password', 'user')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['registration_success'] = true;
            } else {
                $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

   // Store the error message in the session if there's an error
   if (!empty($errorMessage)) {
    $_SESSION['registration_error'] = $errorMessage;
}

header("Location: signin.php");
exit(); 
?>