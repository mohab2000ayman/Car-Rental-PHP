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
    <h2 style="text-align: center;">Cars Available</h2>
    <br>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">car_id </th>
                <th scope="col">plate_num</th>
                <th scope="col">price</th>
                <th scope="col">brand</th>
                <th scope="col">car_year</th>
                <th scope="col">type</th>
                <th scope="col">rented</th>
                <th scope="col">active</th>
                <th scope="col">outofservice</th>
                <th scope="col">office_id </th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();

            function displayreservation($car_id, $plate_num, $price, $brand, $car_year, $type, $rented, $active, $outofservice, $office_id)
            {
                echo '
            <tr>
                <th scope="row">' . $car_id . '</th>
                <td>' . $plate_num . '</td>
                <td>' . $price . '</td>
                <td>' . $brand . '</td>
                <td>' . $car_year . '</td>
                <td>' . $type . '</td>
                <td>' . $rented . '</td>
                <td>' . $active . '
                <form action="?carid=' . $car_id . ' " method="post">
                    <input type="submit" class="btn btn-info" value="active">
                </form>
                </td>
                <td>' . $outofservice . '
                <form action="?carid2=' . $car_id . ' " method="post">
                    <input type="submit" class="btn btn-warning" value="outservice">
                </form>
                </td>
                <td>' . $office_id . '</td>
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


            $check = "SELECT * FROM car ";
            $result = mysqli_query($conn, $check);
            while ($row = mysqli_fetch_assoc($result)) {
                displayreservation(
                    $row['car_id'],
                    $row['plate_num'],
                    $row['price'],
                    $row['brand'],
                    $row['car_year'],
                    $row['type'],
                    $row['rented'],
                    $row['active'],
                    $row['outofservice'],
                    $row['office_id']
                );
            }
            if (isset($_GET['carid'])) {
                $carid = $_GET['carid'];

                $q1 = "SELECT rented,outofservice FROM car where car_id=$carid";
                $res3 = mysqli_query($conn, $q1);
                $row = mysqli_fetch_array($res3);
                $rent = $row['rented'];
                echo $rent;
                $out=$row['outofservice'];
                echo $out;
                if ($rent == 0) {
                $query5 = "UPDATE  car SET active=1,outofservice=0 where car_id=$carid";
                $result1 = mysqli_query($conn, $query5);
                if($out==1)
                    {
                        $q4 = "UPDATE  car_status SET end_date=CURRENT_DATE() where carid='$carid' and status='outofservice'and end_date='0000-00-00'  ";
                    $rest1 = mysqli_query($conn, $q4);
                    }
                $query6 = "INSERT INTO car_status  (carid,status,start_date) VALUES 
        ('$carid','active',CURRENT_DATE())";
                $result2 = mysqli_query($conn, $query6);
                echo "<script>
    alert('Car is active!');
    window.location.href='http://localhost/car_rental/carstatus.php';
    </script>";
                }
                else{
                    echo "<script>
    alert('Car cannot be  active now!');
    window.location.href='http://localhost/car_rental/carstatus.php';
    </script>";
                }
            }

            if (isset($_GET['carid2'])) {
                $carid2 = $_GET['carid2'];

                $q1 = "SELECT rented,active FROM car where car_id=$carid2";
                $res3 = mysqli_query($conn, $q1);
                $row = mysqli_fetch_array($res3);
                $rent = $row['rented'];
                echo $rent;
                $out=$row['active'];
                echo $out;
                if ($rent == 0) {
                    $query4 = "UPDATE  car SET active=0,outofservice=1 where car_id=$carid2";
                    $result1 = mysqli_query($conn, $query4);
                    if($out==1)
                    {
                        $q4 = "UPDATE  car_status SET end_date=CURRENT_DATE() where carid='$carid2' and status='active'and end_date='0000-00-00'  ";
                    $rest1 = mysqli_query($conn, $q4);
                    }
                    $query7 = "INSERT INTO car_status  (carid,status,start_date) VALUES 
        ('$carid2','outofservice',CURRENT_DATE())";
                    $result9 = mysqli_query($conn, $query7);
                    
                    echo "<script>
        alert('Car is out of service');
        window.location.href='http://localhost/car_rental/carstatus.php';
        </script>";
                } else {
                    echo "<script>
        alert('Car cant be out of service now');
         window.location.href='http://localhost/car_rental/carstatus.php';
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