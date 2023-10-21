<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $proses = $_POST['proses'];
    $id_user = $_POST['id_user'];

    $check_user_query = "SELECT id FROM master_user WHERE id = $id_user";
    $check_user_result = mysqli_query($con, $check_user_query);

    if (mysqli_num_rows($check_user_result) > 0) {
        $q_insert = "INSERT INTO listtask(taskTitle, deskripsi, progress, id_user) VALUES('$title', '$desc', '$proses', $id_user)";
        $q_run = mysqli_query($con, $q_insert);

        if($q_run){
            header('location: index.php');
        } else {
            echo "Data Failed";
        }
    } else {
        echo "Invalid id_user";
    }
}
?>
