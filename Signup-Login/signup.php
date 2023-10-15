<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Signup</title>
    </head>
    <body>
        <h2>Signup</h2>
        <form action='signup.php' method='POST' >
        Nama Depan: <input type='text' name='nama_depan'><br>
        Nama Belakang: <input type='text' name='nama_belakang'><br>
        Username: <input type='text' name='username'><br>
        Email: <input type='email' name='email'><br>
        Password: <input type='text' name='password'><br>
        <label>Jenis Kelamin</label>
        <input type="radio" name="gender" value="m" /> Laki-laki
        <input type="radio" name="gender" value="f" /> Perempuan
        <br />
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" />
        <br />
        <input type='submit' value='Daftar'>
        </form>
        
        
        <?php
        
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        $con = mysqli_connect("localhost", "root", "", "Restoran");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $con = mysqli_connect("localhost", "root", "", "Restoran");

        if (!$con) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        if (isset($_POST['nama_depan']) && isset($_POST['nama_belakang']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['tanggal_lahir'])) {
            if ($_POST['username'] != '') {
                // --- check username available ---
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
                echo "The username ". $_POST['username']. " is already taken.";
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
                    echo "<script> alert('Data ter-submit.'); </script>";
                } else {
                    die('Error in executing the query: ' . mysqli_error($con));
                }

                mysqli_stmt_close($stmt); }
                // --- end actual submit ---
            } else {
                echo "<script>alert('The username field is required and cannot be left empty.');</script>";
            }
        }
        mysqli_close($con);
    }  
        ?>
        <br>
        <a href="login.php">Login</a>
    </body>
</html>