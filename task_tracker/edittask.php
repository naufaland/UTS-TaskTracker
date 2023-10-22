<?php
include('config.php');
$id = $_GET['id'];

if(isset($_GET['id'])){
    $edit_id = $_GET['id'];
    $edit_query = "SELECT * FROM listtask WHERE id = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
    if(mysqli_num_rows($edit_query_run) > 0){
        $edit_row = mysqli_fetch_array($edit_query_run);
    }
    else{
        // header('location: index.php');
        echo "Error1";
    }
}
else{
    // header("location: index.php");
    echo "Error2";
}
//Data Updating
if(isset($_POST['submit']))
{
	$title = $_POST['title'];
	$description = $_POST['description'];
	$proses = $_POST['proses'];
	
	$update = "UPDATE listtask SET taskTitle='$title', deskripsi = '$description', progress = '$proses' WHERE id=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
           echo "<script>
            alert('Success! Data has been successfully updated!');
            window.location.href='index.php';
            </script>";
	}else{
		echo "Data not update";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Tracker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
<?php 

$getData = "SELECT * FROM listtask WHERE id = $id";
$runData = mysqli_query($con, $getData);
while ($row = mysqli_fetch_array($runData)) {
        $id = $row['id'];
        $title2 = strtoupper(htmlspecialchars($row['taskTitle'])); 
        $desc2 = htmlspecialchars($row['deskripsi']); 
        $proses2 = htmlspecialchars($row['progress']);
        echo "
            <div class='form-edit'>
            <form action='edittask.php?id=$id' method='POST'>
                <div class='form-row'>
                    <div class='form-group col-md-6'>
                        <label for='inputTitle'>Title Task</label>
                        <input type='text' class='form-control' name='title' placeholder='What do you want to edit?'  required>
                    </div>
                    <div class='form-group col-md-6'>
                        <label for='inputDescription'>Description</label>
                        <input type='text' class='form-control' name='description' required>
                    </div>
                    <div class='form-row'>
                        <div class='form-group col-md-6'>
                            <label for='inputProgress'>Progress</label>
                            <select class='form-control' name='proses'>
                                <option disabled>Not Yet Started</option>
                                <option>In Progress</option>
                                <option>Finish</option>
                            </select>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='form-group col-md-12'>
                        <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            ";
} ?>
</body>
</html>
<?php


?>

