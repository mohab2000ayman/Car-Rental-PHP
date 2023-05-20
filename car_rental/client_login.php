<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Login</title>
  <style>
    body {
      background: #e3f2fd;
    }

    input::placeholder {
      font-size: 15px;
    }
  </style>




  <script type="text/javascript">
    function validation() {
      var email = document.forms["login_form"]["email"].value;
      var pass = document.forms["login_form"]["password"].value;
      if (pass == null || pass == "") {
        alert("Please enter your Password");
        return false;
      }
      var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
      if (email.search(emailRegEx) == -1) {
        alert("Please enter a valid email address");
        return false;
      }
      return true;
    }
  </script>
</head>



</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['client_id'])) {
    echo "<script> alert('already logged in');
  </script>";
    header("Location:index.php");
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Car Rental Company</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="client_signup.php">Client sign up <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="client_login.php">Client Login</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="admin_signup.php">Admin sign up</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="admin_login.php">Admin Login</a>
        </li>



      </ul>

    </div>
  </nav>
  <br><br>

  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-200 gradient-custom-3">
      <div class="container h-200">
        <div class="row d-flex justify-content-center align-items-center h-200">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6 mx-auto">
            <div class="card " style="border-radius: 50px; width: 600px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Login</h2>

                <form name="login_form" method="POST" action="" onsubmit="return validation();">


                  <div class="form-outline mb-4">
                    <label class="form-label">Email:</label>
                    <input type="email" placeholder="Enter your Email" name="email" class="form-control form-control-lg" />

                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Password:</label>

                    <input type="password" placeholder="Enter your Password" name="password" class="form-control form-control-lg" />
                  </div>









                  <div class="d-flex justify-content-center">
                    <input type="submit" value="Login" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit0">
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Create new account? <a href="client_signup.php" class="fw-bold text-body"><u>Signup here</u></a></p>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php

  // session_start();
  // session_destroy();
  
  $servername = "localhost";
  $username = "root";
  $pass = "";
  $dbname = "car_rental";
  $conn = mysqli_connect($servername, $username, $pass, $dbname);
  if (!$conn) {
    die('Connection Failed' . mysqli_connect_error());
  }
  if (isset($_POST["submit0"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrptedpass = md5($password);
    $check = "SELECT * FROM client WHERE email='$email'";
    $result = mysqli_query($conn, $check);
    $my_row = mysqli_fetch_assoc($result);
    if ($email == $my_row['email'] &&  $encrptedpass == $my_row['password']) {
      $_SESSION['client_id'] = $my_row['client_id'];
      echo "<script> alert('client found Logging in');
        
        window.location.href='http://localhost/car_rental/reserve_car.php';
        </script>";

      //$_SESSION['email']=$email;
    } else {
      echo "<script>
        alert('client not found');
        window.location.href='http://localhost/car_rental/index.php';
        </script>";
    }
  }

  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>