<?php
include('config.php'); 

if (isset($_POST['edit'])) {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $proses = $_POST['proses'];

        $q_update = "UPDATE listtask SET taskTitle='$title', deskripsi='$desc', progress='$proses' WHERE id='$id'";
        $q_run = mysqli_query($con, $q_update);

        if ($q_run) {
            header('location: index.php');
        } else {
            echo "Gagal mengedit data";
        }
    } else {
        echo "ID tidak valid atau tidak tersedia.";
    }
} else {
    echo "Aksi edit tidak diaktifkan.";
}
?>

