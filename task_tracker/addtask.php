<?php
include('dbconnect.php');

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $proses = $_POST['proses'];

    $q_insert = "INSERT INTO listtask(taskTitle, deskripsi, progress) VALUES('$title', '$desc','$proses')";
    $q_run = mysqli_query($con, $q_insert);
    
    if($q_run){
        header('location: index.php');
    } else {
        echo "Data Failed";
    }
}

?>
