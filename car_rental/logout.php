<?php
session_start();
session_destroy();
header('Location:http://localhost/car_rental/');
exit;
?>