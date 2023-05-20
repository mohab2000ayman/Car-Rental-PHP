<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Report 5</title>
</head>

<body>
    <br>
    <h2 style="text-align: center; text-decoration: underline;">Daily payments within specific period.</h2>
    <br>
    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">payment_id </th>
                <th scope="col">reserve_id</th>
                <th scope="col">totalPrice </th>
                <th scope="col">payment_date</th>

            </tr>
        </thead>
        <tbody>
            <?php
            session_start();

            function displayreservation($car_id, $plate_num, $price, $brand)
            {
                echo '
            <tr class="table-info">
                <th scope="row">' . $car_id . '</th>
                <td>' . $plate_num . '</td>
                <td>' . $price . '</td>
                <td>' . $brand . '</td>

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
            $start = $_SESSION['report5start'];
            $end   = $_SESSION['report5end'];

            $query_payment = " SELECT * FROM payment where payment_date BETWEEN  '$start' AND '$end' ORDER BY payment_date ASC ";
            $result4 = mysqli_query($conn, $query_payment);
            $last="";
            while ($row = mysqli_fetch_assoc($result4)) {
                if($last!=$row['payment_date'])
                {
                    displayreservation("New day","","","");
                }
                $last=$row['payment_date'];
                displayreservation(
                    $row['payment_id'],
                    $row['reserve_id'],
                    $row['totalPrice'],
                    $row['payment_date']
                );
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