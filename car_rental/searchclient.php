<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>client search</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar w/ text</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sign out</a>
                </li>
            </ul>

        </div>
    </nav>
    <h2 style="text-align: center;">Cars Available for rent after search</h2>
    <br>

    <?php
    session_start();

    function displaycar($car_id, $platenum, $price, $brand, $year, $image)
    {
        echo '

<div class=" card" style="width: 18rem;">
  <img src=" ' . $image . '" class="card-img-top" width="200" height="200">
  <div class="card-body">
    <h5 class="card-title">' . $brand . ' ' . $year . '</h5>
    
    
    <p class="card-text">Plate number:' . $platenum . '</p>
    <p class="card-text">Price per day:' . $price . '</p>
    <form action="searchclient.php?carid=' . $car_id . '&price=' . $price . '" method="POST">
        <input type="submit" class="btn btn-primary" name="rent11" value="Rent now">
    </form>
    
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
            if (isset($_GET['attribute']) && isset($_GET['searchval'])) {
                $attribute = $_GET['attribute'];
                $value = $_GET['searchval'];
                $off_id=$_SESSION["of_id"];

                $query5 = "SELECT * FROM car WHERE office_id='$off_id'and  $attribute='$value' ";
                $result1 = mysqli_query($conn, $query5);
                if (mysqli_num_rows($result1) > 0) {
                    while ($row = mysqli_fetch_assoc($result1)) {
                        displaycar($row['car_id'], $row['plate_num'], $row['price'], $row['brand'], $row['car_year'], $row['image']);
                    }
                }
            } else {
                echo "No results found.";
            }
            ?>
        </div>
    </div>
    <?php
    $pick =  $_SESSION["pickup"];
    $return =   $_SESSION["return"];
    if (isset($_POST["rent11"])) {
    $carid22 = $_GET['carid'];
    $price22 = $_GET['price'];
    $date1 = new DateTime($return);
    $date2 = new DateTime($pick);

    $diff = date_diff($date1, $date2);
    $totalprice = intval($diff->days) * $price22;

    $client_id = $_SESSION['client_id'];

    $query = "INSERT INTO reservation (cid,client_id,pickupDate,returnDate,totalPrice) VALUES 
    ('$carid22','$client_id','$pick','$return','$totalprice')";
    $res1 = mysqli_query($conn, $query);
    $query2 = "UPDATE  car SET rented=1 where car_id=$carid22";
    $res2 = mysqli_query($conn, $query2);
    $query3 = "SELECT  MAX(reserve_id) FROM reservation";
    $res3 = mysqli_query($conn, $query3);
    $row = mysqli_fetch_array($res3);
    $_SESSION['reser_id'] = $row[0];
    $_SESSION['totalprice'] = $totalprice;
    $_SESSION['carid'] = $carid22;


    echo "<script>
    alert('Car reserved successfully');
    window.location.href='http://localhost/car_rental/payment.php';
    </script>";
    }
    ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>