<?php
require 'config.php';
require 'secureuser.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Employee Management System</title>
</head>
<body>

<div class="container">

    <a href="add.php" class= "btn btn-primary mt-5 ">Add Employee</a>
    <a href="logout.php" class= "btn btn-secondary mt-5 " style = "display:inline-block; float:right;">Log out</a>
    <h5 class= "mt-3">Logged in as : <?php echo $_SESSION['email']; ?> </h5>

    <?php if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];

        if ($msg == 'asuccess') { ?>
                <div class="alert alert-success alert-dismissible fade show" role = "alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label= "Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Student Record Updated Successfully.</strong> 
                </div> 

                <script>
                    $('.alert').alert();
                </script>
        <?php }
    } ?>
    <h1 class = " mt-3">Employee Records  </h1>
    <table class="container mt-4">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name </th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $select_query = 'SELECT * FROM employees ';
            $select_result = mysqli_query($conn, $select_query);
            $i = 0;
            while ($data_row = mysqli_fetch_array($select_result)) {
                $i++; ?>
                

            <tr>
                <td scope = "row"><?php echo $i; ?></td>
                <td><?php echo $data_row['name']; ?></td>
                <td><?php echo $data_row['address']; ?></td>
                <td><?php echo $data_row['email']; ?></td>
                <td><?php echo $data_row['contact']; ?></td>
           
                <td>
                    <a href="edit.php?id=<?php echo $data_row[
                        'id'
                    ]; ?>" class= "btn btn-primary">Edit</a>
                    <a href="delete.php?id=<?php echo $data_row[
                        'id'
                    ]; ?>" class= "btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php
            }
            ?>
        </tbody>
    </table>
</div>
    
</body>
</html>