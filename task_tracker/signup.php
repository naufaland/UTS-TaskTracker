<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Signup</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <section class="h-100 h-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <div class="card-body p-4 p-md-5">   
            <h3 class="text-center mb-2 pb-2 pb-md-0 mb-md-3 px-md-2">SIGN UP YOUR ACCOUNT!</h3>
            <form action="signup.php" method="post" class="px-md-2">
            <div class="row">
            <div class="col">
                <div class="form-outline mb-3">
                        <input type="text" id="form3Example1q" class="form-control" name='nama_depan'placeholder="Nama Depan"/>
                </div>
            </div>
            <div class="col">
                <div class="form-outline mb-3">
                    <input type="text" id="form3Example1q" class="form-control" name='nama_belakang'placeholder="Nama Belakang" />
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="form3Example1q" class="form-control" name='username'placeholder="Username"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline mb-3">
                        <input type="text" id="form3Example1q" class="form-control" name='email' placeholder="Email" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-outline mb-2">
                    <input type="password" id="form3Example1q" class="form-control" name='password' placeholder="Password" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-mr-6 mb-4">
                    <div class="col">
                    <label for="birthdate">Birth Date</label>
                    <input type="date" id="birthdate" name="tanggal_lahir" class="form-control">
                </div>
                      <h6 class="mb-1 pb-1">Gender: </h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                            value="option1" checked />
                            <label class="form-check-label" for="femaleGender">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="maleGender"
                          value="option2" />
                            <label class="form-check-label" for="maleGender">Male</label>
                        </div>
                </div>
            </div>
              <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $con = mysqli_connect("localhost", "root", "", "task-tracker");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $con = mysqli_connect("localhost", "root", "", "task-tracker");

            if (!$con) {
                die('Connection failed: ' . mysqli_connect_error());
            }

            if (isset($_POST['nama_depan']) && isset($_POST['nama_belakang']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['tanggal_lahir'])) {
                if ($_POST['username'] != '') {
                    // --- check username availability ---
                    $checkQuery = "SELECT COUNT(*) FROM master_user WHERE username = ?";
                    $checkStmt = mysqli_prepare($con, $checkQuery);

                    if (!$checkStmt) {
                        die('Error in preparing the username check query: ' . mysqli_error($con));
                    }

                    mysqli_stmt_bind_param($checkStmt, "s", $_POST['username']);
                    mysqli_stmt_execute($checkStmt);
                    mysqli_stmt_bind_result($checkStmt, $count);
                    mysqli_stmt_fetch($checkStmt);

                    mysqli_stmt_close($checkStmt);

                    if ($count > 0) {
                        echo "The username " . htmlspecialchars($_POST['username']) . " is already taken.";
                    } else {
                        // --- actual submit ---
                        $query = "INSERT INTO master_user (nama_depan, nama_belakang, username, email, password, gender, tanggal_lahir) VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_prepare($con, $query);

                        if (!$stmt) {
                            die('Error in preparing the query: ' . mysqli_error($con));
                        }

                        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

                        mysqli_stmt_bind_param($stmt, "sssssss", $_POST['nama_depan'], $_POST['nama_belakang'], $_POST['username'], $_POST['email'], $hashedPassword, $_POST['gender'], $_POST['tanggal_lahir']);

                        if (mysqli_stmt_execute($stmt)) {
                            echo "<script>
                            alert('Sign Up Success!');
                            window.location.href='login.php';
                            </script>";
                        } else {
                            die('Error in executing the query: ' . mysqli_error($con));
                        }

                        mysqli_stmt_close($stmt);

                    }
                } else {
                    echo "<script>alert('The username field is required and cannot be left empty.');</script>";
                }
            }
            mysqli_close($con);
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </section>
    </body>
</html>
