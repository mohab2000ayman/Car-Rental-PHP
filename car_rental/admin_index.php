<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Admin Home</title>

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
    <br><br>
    <h2 style="text-align: center;">Cars Available</h2>
    <br>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <form action="searchadmin.php" method="get">
                    <div class="input-group">
                        <div class="input-group-btn">

                            <select name="attribute" class="btn btn-default dropdown-toggle">
                                <option value="car_id">car_id</option>
                                <option value="plate_num">plate number</option>
                                <option value="type">type</option>
                                <option value="price">Price</option>
                                <option value="brand">brand</option>
                                <option value="rented">rented</option>
                                <option value="active">active</option>
                                <option value="outofservice">outofservice</option>
                                <option value="price">Price</option>
                                <option value="car_year">year</option>
                                <option value="client_id">client_id</option>
                                <option value="clientname">clientname</option>
                                <option value="email">email</option>
                                <option value="license_num">license_num</option>
                                <option value="DOB">DOB</option>
                                <option value="phonenum">phonenum</option>
                                <option value="country">country</option>
                                <option value="reservDate">Reservation date</option>
                                
                                
                                

                               
                            </select>
                        </div>

                        <input type="text" name="searchval2" class="form-control" placeholder="Search for...">

                        <input type="submit" class="btn btn-dark" value="Search">

                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>