
<?php
require 'config.php';
require 'secureuser.php';
?>
 <!doctype html>
<html lang="en">
  <head>
    <title>Edit Employees</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $select_query = "SELECT * FROM employees WHERE id = $id";
      $select_result = mysqli_query($conn, $select_query);
      $select_row = $select_result->fetch_assoc();
  } ?>

      <div class="container">
      
        <a href="dashboard.php" class="btn btn-primary mt-5">Manage Employee</a>
        <h2 class = "mt-3">Add Employee</h2>
        <?php if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];

            $update = "UPDATE employees SET name = '$name',address = '$address', email = '$email', contact = '$contact' where id =$id";
            $update = mysqli_query($conn, $update);
            if ($update) {
                // echo 'data is submitted';
                // echo "<meta http-equiv=\"refresh\" content=\"0;URL=dashboard.php\">";
                echo header('Location: dashboard.php?msg=edited_successfully');
            } else {
                echo 'data is not submitted';
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=add.php\">";
            }
        } ?>
        <form action="" method = "POST">
                <div class="form-group">
                <label for="name">Name : </label>
                <input type="text"
                    class="form-control" name="name" id="name" value = "<?php echo $select_row[
                        'name'
                    ]; ?>" aria-describedby="helpId" placeholder="Enter your name">
                </div>
                <div class="form-group">
                <label for="address">Address : </label>
                <input type="text"
                    class="form-control" name="address" id="address" value = "<?php echo $select_row[
                        'address'
                    ]; ?>" aria-describedby="helpId" placeholder="Enter your Address">
                </div>
                <div class="form-group">
                <label for="email">Email : </label>
                <input type="email"
                    class="form-control" name="email" id="" value = "<?php echo $select_row[
                        'email'
                    ]; ?>" aria-describedby="helpId" placeholder="Enter Your Email-Id">
                </div>
                <div class="form-group">
                <label for="contact">Contact Number : </label>
                <input type="phone"
                    class="form-control" name="contact" id="contact" value = "<?php echo $select_row[
                        'contact'
                    ]; ?>" aria-describedby="helpId" placeholder="Enter Your Mobile Number">
                </div>
            
                <input type="submit" name="submit" class= "btn btn-primary btn-lg mt-3">
            </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>