<?php
session_start();
require 'config.php';

if(isset($_POST['submit'])){
    $usernameEmail = $_POST['usernameEmail'];
    $password = $_POST['password'];
    
    $recaptchaSecret = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe'; // Replace with your reCAPTCHA secret key
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $recaptchaVerify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $recaptchaData = json_decode($recaptchaVerify);

    if (!$recaptchaData->success) {
        echo "<script> alert('Please complete the CAPTCHA.'); </script>";
    } else {
    $query = "SELECT id, username, email, password FROM master_user WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($con, $query);

    if (!$stmt) {
        die('Error in preparing the query: ' . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "ss", $usernameEmail, $usernameEmail);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $id, $username, $email, $hashedPassword);

        mysqli_stmt_fetch($stmt);

        if ($id) {
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $id;
                header("Location: index.php");
                exit;
            } else {
                echo "<script> alert('Wrong Password'); </script>";
            }
        } else {
            echo "<script> alert('User Not Registered'); </script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        die('Error in executing the query: ' . mysqli_error($con));
    }
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <h2>Login</h2>
        <form class="" action="login.php" method="post">
        Username/Email: <input type="text" name="usernameEmail" id="usernameEmail" required value=""><br>
        Password: <input type="password" name="password" id="password" required value=""><br>
        <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div><br>
        <button type="submit" name="submit">Login</button>
        </form>
        <a href="signup.php">Signup</a>
    </body>
</html>