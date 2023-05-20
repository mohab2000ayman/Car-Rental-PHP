<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>report 4</title>
  </head>
  <body>
  <br>
    <h2 style="text-align: center; text-decoration: underline;">Reservations of specefic client </h2>
    <br>
    <table class="table " >
        <thead class="thead-dark">
            <tr>
                <th scope="col">reserve_id </th>
                <th scope="col">client_id</th>
                <th scope="col">client name</th>
                <th scope="col">client email</th>
                <th scope="col">license_num</th>
                <th scope="col">DOB</th>
                <th scope="col">phonenum</th>
                <th scope="col">country</th>
                <th scope="col">plate_num</th>
                <th scope="col">car type </th>
            </tr>
        </thead>
        <tbody>
    <?php
    session_start();

    function displayreservation($car_id ,$plate_num,$price,$brand,$car_year,$type,$rented,$active,$outofservice,$office_id )
    {
        echo '
            <tr class="table-info">
                <th scope="row">'.$car_id.'</th>
                <td>'.$plate_num .'</td>
                <td>'.$price .'</td>
                <td>'.$brand .'</td>
                <td>'.$car_year .'</td>
                <td>'.$type .'</td>
                <td>'.$rented .'</td>
                <td>'.$active .'</td>
                <td>'.$outofservice .'</td>
                <td>'.$office_id .'</td>
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
        $clientid=$_SESSION['report4'];
    
    $query_client=" SELECT reserve_id,client_id,clientname,email,license_num,DOB,phonenum,country,plate_num,type
     FROM reservation as r natural join client   join car on car_id=cid where r.client_id ='$clientid'  ";
     $result4=mysqli_query($conn,$query_client);

     while ($row = mysqli_fetch_assoc($result4)) {
        displayreservation($row['reserve_id'], $row['client_id'], $row['clientname'], $row['email'], $row['license_num'],
         $row['DOB'], $row['phonenum'], $row['country'], $row['plate_num'], $row['type']);
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