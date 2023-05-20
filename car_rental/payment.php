<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Payment page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Work+Sans:wght@800&display=swap');


        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;

        }

        body {
            padding: 15px;
            background-color: #ddc3c3;
        }

        .container {
            margin: 20px auto;
            max-width: 1000px;
            background-color: white;
            padding: 0;
        }


        .form-control {
            height: 25px;
            width: 150px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
            font-size: 14px;
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }

        .form-control2 {
            font-size: 14px;
            height: 20px;
            width: 55px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
        }

        .form-control2:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }

        .form-control3 {
            font-size: 14px;
            height: 20px;
            width: 30px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
        }

        .form-control3:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }

        p {
            margin: 0;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: fill;
        }

        .text-muted {
            font-size: 10px;
        }

        .textmuted {
            color: #6c757d;
            font-size: 13px;
        }

        .fs-14 {
            font-size: 14px;
        }

        .btn.btn-primary {
            width: 100%;
            height: 55px;
            border-radius: 0;
            padding: 13px 0;
            background-color: black;
            border: none;
            font-weight: 600;
        }

        .btn.btn-primary:hover .fas {
            transform: translateX(10px);
            transition: transform 0.5s ease
        }


        .fw-900 {
            font-weight: 900;
        }

        ::placeholder {
            font-size: 12px;
        }

        .ps-30 {
            padding-left: 30px;
        }

        .h4 {
            font-family: 'Work Sans', sans-serif !important;
            font-weight: 800 !important;
        }

        .textmuted,
        h5,
        .text-muted {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "car_rental";
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    if (!$conn) {
        die('Connection Failed' . mysqli_connect_error());
    }

    $carid = $_SESSION['carid'];
    $totalprice = $_SESSION['totalprice'];
    $check = "SELECT * FROM car where car_id='$carid' ";
    $result = mysqli_query($conn, $check);
    $row = mysqli_fetch_assoc($result);
    $brand = $row['brand'];
    $year = $row['car_year'];
    $img = $row['image'];


    ?>

    <div class="container">
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12 p-5">
                        <img src="<?php echo $img; ?>" alt="">
                    </div>

                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">
                    <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="h4 m-0"><?php echo $brand;
                                                echo " ";
                                                echo $year; ?></p>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Subtotal</p>
                            <p class="fs-14 fw-bold"><?php echo $totalprice; ?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Shipping</p>
                            <p class="fs-14 fw-bold">Free</p>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Total</p>
                            <div class="d-flex align-text-top ">
                                <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span class="h4"><?php echo $totalprice; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0">
                        <div class="row bg-light m-0">
                            <div class="col-12 px-4 my-4">
                                <p class="fw-bold">Payment detail</p>
                            </div>
                            <div class="col-12 px-4">
                                <div class="d-flex  mb-4">
                                    <span class="">
                                        <p class="text-muted">Card number</p>
                                        <input class="form-control" type="text" value="4485 6888 2359 1498" placeholder="1234 5678 9012 3456">
                                    </span>
                                    <div class=" w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">Expires</p>
                                        <input class="form-control2" type="text" value="01/2020" placeholder="MM/YYYY">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <span class="me-5">
                                        <p class="text-muted">Cardholder name</p>
                                        <input class="form-control" type="text" value="David J.Frias" placeholder="Name">
                                    </span>
                                    <div class="w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">CVC</p>
                                        <input class="form-control3" type="text" value="630" placeholder="XXX">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12  mb-4 p-0">
                                <form action="" method="post">
                                    <input type="submit" value="purchase" class="btn btn-dark btn-block btn-lg gradient-custom-4 text-body" name="purchase">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    
    $reserv_id = $_SESSION['reser_id'];

    if(isset($_POST["purchase"]))
    {
    $query1 = "INSERT INTO payment (reserve_id,totalPrice) VALUES ('$reserv_id','$totalprice')";
    $result = mysqli_query($conn, $query1);
    $query2="UPDATE  reservation SET Paid=1 where reserve_id=$reserv_id";
    $res2=mysqli_query($conn,$query2);
    echo"<script>
    alert('payment done  successfully');
     window.location.href='http://localhost/car_rental/reserve_car.php';
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