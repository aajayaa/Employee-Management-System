<?php
require 'config.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <?php
    if (isset($_SESSION['id'])) {
        echo header('Location: dashboard.php?msg=already_loggedin');
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $confirm_password = md5($_POST['confirm_password']);

        if ($password == $confirm_password) {
            $signup_query = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
            $signup_result = mysqli_query($conn, $signup_query);

            if ($signup_result) {
                echo header('Location: index.php?msg=register_success');
            } else {
                echo header('Location: signup.php?msg=register_failed');
            }
        } else {
            echo "Both password doesn't match";
        }
    }
    ?>
        
        <h2 class = "mt-3">Welcome to the signup page </h2>
        <form action="#" method="POST">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text"
                class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Enter your name ">
            </div>
            
            <div class="form-group">
              <label for="">Email</label>
              <input type="email"
                class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter your email id ">
            </div>
            
            <div class="form-group">
              <label for="password ">Password</label>
              <input type="password"
                class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Enter your Password">
            </div>
            <div class="form-group">
              <label for="confirm_password ">Confirm Password</label>
              <input type="password"
                class="form-control" name="confirm_password" id="confirm_password" aria-describedby="helpId" placeholder="Enter your Password Again">
            </div>
            <input name="submit" id="" class="btn btn-primary" type="submit" value="Submit">
        </form>
        Already Signed up , <a href="index.php">Log in</a>
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>