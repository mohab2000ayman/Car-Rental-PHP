<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Sign IN</title>
  <style>
    body {
      background: #e3f2fd;
    }

    input::placeholder {
      font-size: 15px;
    }
  </style>




  <script type="text/javascript">
    function validateForm22() {
      var start = document.forms["reservef"]["pickup11"].value;
      var end = document.forms["reservef"]["return11"].value;
      var date = new Date();
      var CurrentDate = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();

      // alert(CurrentDate);
      // alert(start);


      if (start == null || start == "") {
        alert("Please enter pickup date");
        return false;
      }

      if (end == null || end == "") {
        alert("Please enter return date");
        return false;
      }
      if (CurrentDate>start) {
        alert("Please enter valid start date");
        return false;
      }

      if (end < start) {
        alert("Please enter valid return date");
        return false;
      }

      return true;
    }
  </script>
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-dark  bg-secondary">
        <a class="navbar-brand" href="reserve_car.php">Car Rental Company</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">


                <!-- <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Sign out</a>
                </li> -->
            </ul>
            <ul class="navbar-nav " style="margin-left: auto;">
            <li class="nav-item active">
                    <a class="navbar-brand" href="#">Client Portal</a>
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
                <h2 class="text-uppercase text-center mb-5">Reserve car</h2>
                <form name="reservef" method="POST" action="" onsubmit="return validateForm22();">

                  <div class="form-outline mb-4">
                    <label class="form-label">Pickup Date:</label>
                    <input type="date" name="pickup11" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Return Date:</label>
                    <input type="date" name="return11" class="form-control form-control-lg" />
                  </div>



                  <div class="d-flex justify-content-center">
                    <input type="submit" value="Register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="reserve">
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php
  session_start();
  if (isset($_POST["reserve"])) {
    $pick = ($_POST["pickup11"]);
    $return = $_POST["return11"];
    $_SESSION["pickup"] = $pick;
    $_SESSION["return"] = $return;

    echo "<script>
    alert('reservation date entered successfully');
    window.location.href='http://localhost/car_rental/client_rent.php';
    </script>";
  }
  // $carid = $_GET['carid'];
  // $price = $_GET['price'];

  ?>
  <!-- <?php
        // $servername = "localhost";
        // $username = "root";
        // $pass = "";
        // $dbname = "car_rental";
        // $conn = mysqli_connect($servername, $username, $pass, $dbname);
        // if (!$conn) {
        //   die('Connection Failed' . mysqli_connect_error());
        // }
        // if (isset($_POST["reserve"])) {

        //   $pick = $_POST["pickup"];
        //   $return = $_POST["return"];
        //   $_SESSION['pickup']=$pick;
        //   $_SESSION['return']=$return;

        //   $date1 = new DateTime($return);
        //   $date2 = new DateTime($pick);

        //   $diff = date_diff($date1, $date2);
        //   $totalprice = intval($diff->days) * $price;

        //   $client_id = $_SESSION['client_id'];

        //   $query = "INSERT INTO reservation (cid,client_id,pickupDate,returnDate,totalPrice) VALUES 
        //   ('$carid','$client_id','$pick','$return','$totalprice')";
        //   $res1 = mysqli_query($conn, $query);
        //   $query2 = "UPDATE  car SET rented=1 where car_id=$carid";
        //   $res2 = mysqli_query($conn, $query2);
        //   $query3 = "SELECT  MAX(reserve_id) FROM reservation";
        //   $res3 = mysqli_query($conn, $query3);
        //   $row = mysqli_fetch_array($res3);
        //   $_SESSION['reser_id'] = $row[0];
        //   $_SESSION['totalprice'] = $totalprice;
        //   $_SESSION['carid'] = $carid;


        //   echo "<script>
        //   alert('Car reserved successfully');
        //   window.location.href='http://localhost/car_rental/client_rent.php';
        //   </script>";
        // }
        // 
        ?>-->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>