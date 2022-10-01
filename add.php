<?php
require 'config.php';
require 'secureuser.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Manage Employees</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  
      <div class="container">
        <a href="dashboard.php" class="btn btn-primary mt-5">Manage Employee</a>
        <?php if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];

            if (
                $name != '' &&
                $address != '' &&
                $email != '' &&
                $contact != ''
            ) {
                $insert_query = "INSERT INTO employees (name, address, email, contact) 
                VALUES('$name','$address','$email','$contact')";
                $insert_result = mysqli_query($conn, $insert_query);
                if ($insert_result) {
                    echo header('Location: dashboard.php?msg=asuccess');
                } else {
                    echo 'Student Record can not be added successfully.';
                }
            } else {
                echo 'All fields are necessary !';
            }
        } ?>
        <h2 class = "mt-3">Add Employee</h2>
        <form action="#" method = "POST">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text"
                class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Enter your name ">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text"
                class="form-control" name="address" id="address" aria-describedby="helpId" placeholder="Enter your address">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email"
                class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter your email id ">
            </div>
            <div class="form-group">
              <label for="contact">Contact</label>
              <input type="tel"
                class="form-control" name="contact" id="contact" aria-describedby="helpId" placeholder="Enter your phone number">
            </div>
            <input name="submit" id="" class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>