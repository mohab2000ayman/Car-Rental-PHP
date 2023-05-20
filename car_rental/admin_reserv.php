<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>reservations</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="admin_index.php">Car Rental Company</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="car_register.php"> Add Car <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin_reserv.php">Car reservations</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="carstatus.php">Car Status</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="reports.php">Car Reports</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="office_add.php">Add office</a>
                </li>
            </ul >
            <ul class="navbar-nav " style="margin-left: auto;">
            <li class="nav-item active">
                    <a class="navbar-brand" href="#">Admin Portal</a>
                </li>
            </ul>

        </div>
    </nav>
    <br>
    <h2 style="text-align: center;">Cars reservations</h2>
    <br>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">reserve_id</th>
                <th scope="col">car_id</th>
                <th scope="col">client_id</th>
                <th scope="col">pickdate</th>
                <th scope="col">returndate</th>
                <th scope="col">totalprice</th>
                <th scope="col">pickedup</th>
                <th scope="col">returned</th>
                <th scope="col">paid</th>
                <th scope="col">resevedate</th>
            </tr>
        </thead>
        <tbody>
    <?php
    session_start();

    function displayreservation($reserv_id,$car_id,$client_id,$pickdate,$returndate,$totalprice,$pickedup,$returned,$paid,$resevdate)
    {
        echo '
            <tr>
                <th scope="row">'.$reserv_id.'</th>
                <td>'.$car_id .'</td>
                <td>'.$client_id .'</td>
                <td>'.$pickdate .'</td>
                <td>'.$returndate .'</td>
                <td>'.$totalprice .'</td>
                <td>'.$pickedup .'
                <form action="?res_id=' . $reserv_id . '&paid=' . $paid . ' " method="post">
                    <input type="submit" class="btn btn-warning" value="Pickup">
                </form>
                </td>
                <td>'.$returned .'
                <form action="?res_id2=' . $reserv_id . '&paid2=' . $paid . '&pick=' . $pickedup . '&car=' . $car_id . ' " method="post">
                    <input type="submit" class="btn btn-info" value="return">
                </form>
                </td>
                <td>'.$paid .'</td>
                <td>'.$resevdate .'</td>
            </tr>


';
    }

    ?>
     

    <?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "car_rental";
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    if (!$conn) {
        die('Connection Failed' . mysqli_connect_error());
    }


    $check = "SELECT * FROM reservation ";
    $result = mysqli_query($conn, $check);
    while ($row = mysqli_fetch_assoc($result)) {
        displayreservation($row['reserve_id'], $row['cid'], $row['client_id'], $row['pickupDate'], $row['returnDate'], $row['totalPrice'], $row['Pickedup'], $row['Returned'], $row['Paid'], $row['reservDate']);
    }
    if (isset($_GET['res_id'])) {
        $resid = $_GET['res_id'];
        $pay=$_GET['paid'];
        if($pay==1)
        {
        $query5 = "UPDATE  reservation SET Pickedup	=1 where reserve_id=$resid";
        $result1 = mysqli_query($conn, $query5);
        echo"<script>
    alert('Car pickedup successfully');
    window.location.href='http://localhost/car_rental/admin_reserv.php';
    </script>";
    }
    else{
        echo"<script>
    alert('reservation unpaid');
     window.location.href='http://localhost/car_rental/admin_reserv.php';
    </script>";
    }

    }

    if (isset($_GET['res_id2'])) {
        $resid1 = $_GET['res_id2'];
        $pay1=$_GET['paid2'];
        $pick=$_GET['pick'];
        $car=$_GET['car'];
        if($pay1==1&&$pick==1)
        {
        $query00 = "UPDATE  reservation SET Returned	=1 where reserve_id=$resid1";
        $result1 = mysqli_query($conn, $query00);
        $query001 = "UPDATE  car SET rented	=0 where car_id=$car";
        $result001 = mysqli_query($conn, $query001);
        echo"<script>
    alert('Car returned successfully');
    window.location.href='http://localhost/car_rental/admin_reserv.php';
    </script>";

    }
    else if($pay1==0){
        echo"<script>
    alert('reservation unpaid');
     window.location.href='http://localhost/car_rental/admin_reserv.php';
    </script>";
    }
    else if($pick==0){
        echo"<script>
    alert('car unpicked');
     window.location.href='http://localhost/car_rental/admin_reserv.php';
    </script>";
    }

    }



    ?>
         </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>