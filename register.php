<?php
//include config.php
include 'config/config.php';
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Website Name - Register Admin</title>
</head>
<body>

    <div class="container login-container">
      <div class="row">
        <div class="col-md-6 ads">
          <h1><span id="fl">Website Name</h1>
        </div>
        <div class="col-md-6 login-form">
          <div class="profile-img">
            <img src="assets/img/logo.png" alt="profile_img" height="140px" width="140px;">
          </div>
          <h3>Register</h3>
          <p class="form_error"><?php if(isset($_SESSION['general_e'])){ echo $_SESSION['general_e'];}?></p>
          <form method="POST" action="authenticate.php">
          <div class="form-group">
              <input type="text" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?>" class="form-control" name="username" placeholder="username">
              <p class="form_error"><?php if(isset($_SESSION['username_e'])){ echo $_SESSION['username_e'];}?></p>
            </div>
            <div class="form-group">
              <input type="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" class="form-control" name="email" placeholder="email">
              <p class="form_error"><?php if(isset($_SESSION['email_e'])){ echo $_SESSION['email_e'];}?></p>
            </div>
            <div class="form-group">
              <input type="password" value="<?php if(isset($_SESSION['password'])){echo $_SESSION['password'];} ?>" class="form-control" name="password" placeholder="Password">
              <p class="form_error"><?php if(isset($_SESSION['password_e'])){ echo $_SESSION['password_e'];}?></p>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="register_admin" value="Register">
            </div>
          </form>
          <?php
                reset_register_error_msg();
           ?>
        </div>
      </div>
    </div>



    <!-- include Javascript Files -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>