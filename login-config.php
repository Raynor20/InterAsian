<?php
session_start();

include("database.php");

if (isset($_POST['login'])) {
    $email_login = $_POST['email-login'];
    $password_login = $_POST['password-login'];

    $sql = "SELECT * FROM users WHERE email = '$email_login'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password_login, $row['password'])) {
            $_SESSION['user_logged_in'] = true; 
            $_SESSION['user_role'] = $row['role'];
            header("Location: index.php");
            exit(); 
        } else {
            $_SESSION['login_error'] = "Incorrect password!";     //to display errorMsg in the signin page
            header("Location: signin.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "User not found!";   // " " 
        header("Location: signin.php");
        exit();
    }
}
?>