<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $proses = $_POST['proses'];
    $date = $_POST['duedate'];
    $userid =  $_SESSION['id'];

    $q_insert = "INSERT INTO listtask(taskTitle, deskripsi, progress, tanggal, user_id) VALUES('$title', '$desc', '$proses', '$date', '$userid')";
    $q_run = mysqli_query($con, $q_insert);
    
    if($q_run){
        header('location: index.php');
    } else {
        echo "Data Failed";
    }
}
?>
