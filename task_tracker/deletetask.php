<?php
include('config.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
$delete = "DELETE FROM listtask WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:index.php');
}else{
	echo "Do not Delete";
}
}
?>