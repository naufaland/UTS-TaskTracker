<?php
require 'config.php';
if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($con, "SELECT * FROM master_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task Tracker</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container" style="background-color: #FFFFF0;">
        <h3><i class='bx bx-run'></i><b>TASK TRACKER</b></h3>
        <br>
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Add New Task
        </button>
        <a href="logout.php" class="btn btn-primary"><i class='bx bx-exit'></i></a>
        <hr>
        <?php
        $userid = $_SESSION['id'];
        $getData = "SELECT * FROM listtask WHERE user_id = $userid ORDER BY 1 DESC";
        $runData = mysqli_query($con, $getData);
        $i = 0;
        ?>
        <table class="table table-bordered table-striped table-hover" id="myTable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Task</th>
                    <th class="text-center" scope="col">Start Date
                    <th class="text-center" scope="col">Done</th>
                    <th class="text-center" scope="col">Progress</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($runData)) {
                $sl = ++$i;
                $id = $row['id'];
                $title = strtoupper(htmlspecialchars($row['taskTitle'])); 
                $desc = htmlspecialchars($row['deskripsi']); 
                $proses = htmlspecialchars($row['progress']);
                $date = $row['tanggal'];
                ?>
                <tr>
                    <td class='text-center'><?php echo $sl; ?></td>
                    <td class='text-left'>
                        <div><b><?php echo $title; ?></b></div>
                        <?php echo $desc; ?>
                    </td>
                    <td class='text-center'><?php echo $date; ?></td>
                    <td class='text-center'>
                        <input type='checkbox' name='myCheckbox' id='myCheckbox'>
                    </td>
                    <td class='text-center'>
                        <select name="inputproses">
                            <option><?php echo $proses; ?></option>
                            <option>In Progress</option>
                            <option>Finish</option>
                        </select>
                    </td>
                    <td class='text-center'>
                        <span>
                            <a href='edittask.php?id=<?php echo $id; ?>' class='btn btn-warning mr-3 edituser' title='Edit'>
                                <i class='fa fa-pencil-square-o fa-lg'></i>
                            </a>
                        </span>
                    </td>
                    <td class='text-center'>
                        <span>
                            <a href='deletetask.php?id=<?php echo $id; ?>' class='btn btn-danger deleteuser' title='Delete' onclick="return confirm('Are You Sure?')">
                                <i class='fa fa-trash-o fa-lg' aria-hidden='true'></i>
                            </a>
                        </span>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Add New Task</h4>
                </div>
                <div class="modal-body">
                    <form action="addtask.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTitle">Title Task</label>
                                <input type="text" class="form-control" name="title" placeholder="What do you want to do?" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDescription">Description</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputProgress">Progress</label>
                                    <select class="form-control" name="proses">
                                        <option>Not Yet Started</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputDate">Start Date</label>
                                    <input type="date" class="form-control" name="duedate" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
                    </form>
                    <button type="button" class="btn btn-default mr-3" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
