<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Report1</title>
  </head>
  <body>
  
    <h2 style="text-align: center;">Cars Available for rent after search</h2>
    <br>
    <?php
    session_start();

    function displayinfo($reserve_id,$car_id,$client_id,$pickupDate,$returnDate,$totalPrice,$Pickedup,$Returned,$Paid,$reservDate, $platenum, $price, $brand, $year,$type,$rented,$active,$outofsevice,$office_id, $image,$clientname,$email,$license_num,$dob,$phonenum,$country)
    {
        echo '

<div class=" card" >
  <div style="text-align: center;">      
  <img src=" ' . $image . '"  class="card-img-top" style="width: 400px; height: 300px; " >
  </div>
  <div class="row">

  <div class="col-sm-3">
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
    </div>
    </div>
    <div class="col-sm-3">   
    <div class="card-body">
    <p class="card-text"><b>Client Info</b></p>
    <p class="card-text">Client id:' . $client_id. '</p>
    <p class="card-text">Client Name:' . $clientname . '</p>
    <p class="card-text">License number:' . $license_num . '</p>
    <p class="card-text">Date of Birth:' . $dob . '</p>
    <p class="card-text">Phone number:' . $phonenum . '</p>
    <p class="card-text">Country:' . $country . '</p>
    </div>
    </div>
    <div class="col-sm-3">
    <div class="card-body">
    <p class="card-text"><b>Reservation Info</b></p>
    <p class="card-text">Reservation id:' . $reserve_id. '</p>
    <p class="card-text">Pickup Date:' . $pickupDate. '</p>
    <p class="card-text">total price:' . $totalPrice. '</p>
    <p class="card-text">Picked up:' . $Pickedup. '</p>
    <p class="card-text">Returned:' . $Returned . '</p>
    </div>
    </div>
    

    
   </div> 
  </div>



';
    }



    ?>

    <div class="container ">
        <div class="card-columns" style="column-width: 600px;">
            <?php
            $servername = "localhost";
            $username = "root";
            $pass = "";
            $dbname = "car_rental";
            $conn = mysqli_connect($servername, $username, $pass, $dbname);
            if (!$conn) {
                die('Connection Failed' . mysqli_connect_error());
            }
          
            $rep1start=$_SESSION['report1start'];
            $rep1end=$_SESSION['report1end'];
            

                $query6 = "SELECT * FROM car as c
                 left join reservation as r on r.cid=c.car_id
                 left join client as cl on r.client_id=cl.client_id
                 WHERE reservDate  between '$rep1start' AND '$rep1end'";
                $result1 = mysqli_query($conn, $query6);
                if (mysqli_num_rows($result1) > 0) {
                    while ($row = mysqli_fetch_assoc($result1)) {
                        displayinfo($row['reserve_id'],$row['car_id'],$row['client_id'],
                        $row['pickupDate'],$row['returnDate'],$row['totalPrice'],$row['Pickedup'],
                        $row['Returned'],$row['Paid'],$row['reservDate'],
                        $row['plate_num'], $row['price'], $row['brand'],
                         $row['car_year'],$row['type'],$row['rented'],$row['active'],
                         $row['outofservice'],$row['office_id'], $row['image'],$row['clientname'],
                         $row['email'],$row['license_num'],$row['DOB'],$row['phonenum'],$row['country']);
                    }
                }
             else {
                echo "No results found.";
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