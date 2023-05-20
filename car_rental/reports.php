<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Reports page</title>
</head>

<body>
<?php
    session_start();
    if (isset($_POST['rep1'])) {

        $_SESSION['report1start'] = $_POST['rep1start'];
        $_SESSION['report1end'] = $_POST['rep1end'];
        echo "<script>
        alert('redirecting to report');
        window.location.href='http://localhost/car_rental/report1.php';
        </script>";
    }
    if (isset($_POST['rep2'])) {
        $_SESSION['report2carid'] = $_POST['rep2carid'];
        $_SESSION['report2start'] = $_POST['rep2start'];
        $_SESSION['report2end']   = $_POST['rep2end'];
        echo "<script>
        alert('redirecting to report');
        window.location.href='http://localhost/car_rental/report2.php';
        </script>";
    }
    if (isset($_POST['rep3'])) {
        $_SESSION['report3day'] = $_POST['rep3day'];
        echo $_SESSION['report3day'];

        echo "<script>
        alert('redirecting to report');
        window.location.href='http://localhost/car_rental/report3.php';
        </script>";
    }

    if (isset($_POST['rep4'])) {

        $_SESSION['report4'] = $_POST['cid'];
        echo "<script>
        alert('redirecting to report');
        window.location.href='http://localhost/car_rental/report4.php';
        </script>";
    }
    if (isset($_POST['rep5'])) {

        $_SESSION['report5start'] = $_POST['rep5start'];
        $_SESSION['report5end']  = $_POST['rep5end'];
        echo "<script>
        alert('redirecting to report');
        window.location.href='http://localhost/car_rental/report5.php';
        </script>";
    }




    ?>

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
    <div class="border border-dark">
        <h3>All Reservations within a specified period</h3>
        <form method="POST" action="">
            <div class="row ">
                <div class="col">
                    <label class="form-label">Start date:</label>
                    <input type="date" name=rep1start class="form-control">
                </div>
                <div class="col">
                    <label class="form-label">End date:</label>
                    <input type="date" name=rep1end class="form-control">
                </div>

            </div>
            <br>
            <div style="text-align: center;">
                <input type="submit" class="btn btn-success  " name="rep1">

            </div>

        </form>
    </div>

    <br><br>
    <div class="border border-dark">
        <h3>reservations of specefic car in specific period.</h3>
        <form method="POST" action="">
            <div class="row ">
                <div class="col" style="margin-left: 30px;">
                    <label class="form-label"><b>Car id:</b></label>
                    <input type="text" style="width: 300px;" name="rep2carid" class="form-control">
                </div>
                <div class="col">
                    <label class="form-label">Start date:</label>
                    <input type="date" name="rep2start" class="form-control">
                </div>
                <div class="col">
                    <label class="form-label">End date:</label>
                    <input type="date" name="rep2end" class="form-control">
                </div>


            </div>
            <br>
            <div style="text-align: center;">
                <input type="submit" class="btn btn-success " name="rep2">

            </div>

        </form>
    </div>
    <br><br>
    <div class="border border-dark">
        <h3> Status of all cars in a specified day</h3>
        <form method="POST" action="">
            <div class="row ">
                <div class="col">
                    <label class="form-label">Select a day:</label>
                    <input type="date" name="rep3day" class="form-control">
                </div>


            </div>
            <br>
            <div style="text-align: center;">
                <input type="submit" class="btn btn-success  " name="rep3">

            </div>

        </form>
    </div>


    <br><br>
    <div class="border border-dark">
        <h3>Reservations of specific client</h3>
        <form method="POST" action="">
            <div class="row ">
                <div class="col" style="margin-left: 30px;">
                    <label class="form-label"><b>Client id:</b></label>
                    <input type="text" style="width: 300px;" name="cid" class="form-control">
                </div>
            </div>
            <br>
            <div style="text-align: center;">
                <input type="submit" class="btn btn-success  " name="rep4">

            </div>

        </form>
    </div>


    <br><br>
    <div class="border border-dark">
        <h3> Daily payments within specific period</h3>
        <form method="POST" action="">
            <div class="row ">
                <div class="col">
                    <label class="form-label">Start date:</label>
                    <input type="date" name="rep5start" class="form-control">
                </div>
                <div class="col">
                    <label class="form-label">End date:</label>
                    <input type="date" name="rep5end" class="form-control">
                </div>

            </div>
            <br>
            <div style="text-align: center;">
                <input type="submit" class="btn btn-success  " name="rep5">

            </div>

        </form>
    </div>



    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>