<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Report 2</title>
</head>

<body>
    <br>
    <h2 style="text-align: center; text-decoration: underline;">All Reservations of specefic car in specefic period </h2>
    <br>
    <?php
    session_start();

    function displayinfo(
        $reserve_id,
        $car_id,
        $client_id,
        $platenum,
        $price,
        $brand,
        $year,
        $type,
        $rented,
        $active,
        $outofsevice,
        $office_id,
        $image
    ) {
        echo '

<div class=" card" >
  <div>      
  <img src=" ' . $image . '"  class="card-img-top" style="width: 300px; height: 200px; " >
  </div>


  <div class="card-body">
    
    <p class="card-text"><b>Car Info</b></p>
    <p class="card-text">Car id:' . $car_id . '</p>
    <p class="card-text">Plate number:' . $platenum . '</p>
    <p class="card-text">Price per day:' . $price . '</p>
    <p class="card-text">Car Type:' . $type . '</p>
    <p class="card-text">Rented:' . $rented . '</p>
    <p class="card-text">Active:' . $active . '</p>
    <p class="card-text">Out of Service:' . $outofsevice . '</p>
    <p class="card-text">Office id:' . $office_id . '</p>
    <br>
    <p class="card-text"><b>Client Info</b></p>
    <p class="card-text">Client id:' . $client_id . '</p>
    <br>
    <p class="card-text"><b>Reservation Info</b></p>
    <p class="card-text">Reservation id:' . $reserve_id . '</p>

  </div>

    
</div> 



';
    }



    ?>
    <div class="container ">
        <div class="card-columns" style="column-width: 15rem;">
            <?php

            $servername = "localhost";
            $username = "root";
            $pass = "";
            $dbname = "car_rental";
            $conn = mysqli_connect($servername, $username, $pass, $dbname);
            if (!$conn) {
                die('Connection Failed' . mysqli_connect_error());
            }


            $start = $_SESSION['report2start'];
            $end   = $_SESSION['report2end'];
            $car1 = $_SESSION['report2carid'];

            $query_client = " SELECT reserve_id,car_id,client_id,plate_num,price,brand,car_year,type,rented,active,outofservice,office_id,image
     FROM reservation as r   join car on car_id=cid where r.cid ='$car1' and reservDate between '$start' AND '$end'  ";

            $result4 = mysqli_query($conn, $query_client);

            while ($row = mysqli_fetch_assoc($result4)) {
                displayinfo(
                    $row['reserve_id'],
                    $row['car_id'],
                    $row['client_id'],
                    $row['plate_num'],
                    $row['price'],
                    $row['brand'],
                    $row['car_year'],
                    $row['type'],
                    $row['rented'],
                    $row['active'],
                    $row['outofservice'],
                    $row['office_id'],
                    $row['image']
                );
            }



            ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>