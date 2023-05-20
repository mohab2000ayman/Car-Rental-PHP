<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>INdex Page</title>
  </head>
  <body>



  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Car Rental Company</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="client_signup.php">Client sign up <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="client_login.php" name="login">Client Login</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="admin_signup.php">Admin sign up</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="admin_login.php">Admin Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link"  href="logout.php">Sign Out</a>
                </li>


            </ul>

        </div>
    </nav>
    <?php
session_start();
// session_destroy();

if(isset($_SESSION['client_id']) && isset($_POST["login"]))  
{
  echo "<script> alert('already logged in');
  window.location.href='http://localhost/car_rental/reserve_car.php';
  </script>";
   //header("Location:index.php");
} 
?>
    <br>
    <h2 style="text-align: center;">Cars Available</h2>
    <br><br>
    

    <?php

    function displaycar($platenum, $price, $brand, $year, $image)
    {
        echo '

<div class=" card" style="width: 18rem;border-color: black;">
  <img src=" ' . $image . '" class="card-img-top"  width="200" height="200">
  <div class="card-body" >
    <h5 class="card-title">' . $brand . ' ' . $year . '</h5>
    
    
    <p class="card-text">Plate number:' . $platenum . '</p>
    <p class="card-text">Price per day:' . $price . '</p>



  </div>
</div>


';
    }
    ?>
    <div class="container ">
        <div class="card-columns" style="column-width: 20rem;">
            <?php


            $servername = "localhost";
            $username = "root";
            $pass = "";
            $dbname = "car_rental";
            $conn = mysqli_connect($servername, $username, $pass, $dbname);
            if (!$conn) {
                die('Connection Failed' . mysqli_connect_error());
            }


            $check = "SELECT * FROM car ";
            $result = mysqli_query($conn, $check);
            while ($row = mysqli_fetch_assoc($result)) {
                displaycar($row['plate_num'], $row['price'], $row['brand'], $row['car_year'], $row['image']);
            }




            ?>
        </div>
    </div>

    <br><br>




  <!-- <a  href="logout.php">Sign out</a>

    <br><br>
  <button onclick="location.href = 'client_signup.php';" id="myButton" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" > client sign up here</button>
  <br><br>
  <button onclick="location.href = 'client_login.php';" name="login"  id="myButton" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" > client Login here</button>

  <br><br>
  <button onclick="location.href = 'admin_signup.php';" id="myButton" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" >admin sign up here</button>
  <br><br>
  <button onclick="location.href = 'admin_login.php';" id="myButton" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" > admin Login here</button> -->

  
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
