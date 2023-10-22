<?php
require 'config.php';

if (isset($_POST['submit'])) {
    $usernameEmail = $_POST['usernameEmail'];
    $password = $_POST['password'];

    $recaptchaSecret = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
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
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $row['id'];
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
    <section class="vh-100 d-flex justify-content-center align-items-center" style="background: aquamarine;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <div class="row">
                            <div class="col-sm-12 text-black">
                                <div class="px-5 ms-xl-4">
                                    <i class="bx bx-run fa-2x me-3 pt-5 mt-xl-4"></i>
                                    <span class="h1 fw-bold mb-0">Task Tracker</span>
                                </div>
                            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-3 pt-5 pt-xl-0 mt-xl-n5">
                                <form action="login.php" method="post" style="width: 23rem;">
                                    <h3 style="letter-spacing: 1px;">LOG IN</h3>
                                    <div class="mb-4">
                                        <input type="text" id="usernameEmail" name="usernameEmail" class="form-control form-control-lg" placeholder="Username/Email" required />
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
                                    </div>
                                    <div class="g-recaptcha mb-3" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                                    <div class="pt-1 mb-2">
                                        <button class="btn btn-success btn-lg mb-1" type="submit" name="submit">Login</button>
                                    </div>
                                    <p>Don't have an account? Please <a href="signup.php" class="link-info">Sign Up here</a></p>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
