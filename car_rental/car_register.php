<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Sign IN</title>
  <style>
    body {
      background: #238BD8;
    }
    input::placeholder {
      font-size: 15px;
    }
  </style>




  <!-- <script type="text/javascript">
    function validateForm() {
    var name=document.forms["signup_form"]["name"].value;
	var email=document.forms["signup_form"]["email"].value;
	var pass=document.forms["signup_form"]["password"].value;
	var confpass=document.forms["signup_form"]["CP"].value;
    var dob=document.forms["signup_form"]["DOB"].value;
    var country=document.forms["signup_form"]["country"].value;
    var liscence=document.forms["signup_form"]["L_num"].value;
    var phone=document.forms["signup_form"]["ph_num"].value;
	if(name==null || name==""){
		alert("Please enter your name");
		return false;
	}

	if(pass==null || pass==""){
		alert("Please enter your Password");
		return false;
	}
	if(pass != confpass){
		alert("Passwords don't match");
		return false;
	}
	var emailRegEx=/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
	if(email.search(emailRegEx)==-1){
		alert("Please enter a valid email address");
		return false;
	}
	return true;
    }
  </script> -->
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

  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-200 gradient-custom-3">
      <div class="container h-200">
        <div class="row d-flex justify-content-center align-items-center h-200">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6 mx-auto">
            <div class="card " style="border-radius: 50px; width: 600px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">ADD new car</h2>

                <form name="signup_form" method="POST" action="" onsubmit="return validateForm();">

                  <div class="form-outline mb-4">
                    <label class="form-label">Car Brand:</label>
                    <input type="text" placeholder="Enter brand" name="brand" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" >year:</label>
                    <input type="text" placeholder="Enter year" name="year" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" >plate number:</label>
                    <input type="text" placeholder="Enter plate number" name="plate" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label"  >Car type:</label>
                    <input type="text" placeholder="enter car type" name="type" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Price per day:</label>
                    <input type="number" placeholder="Enter price per day" name="price" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">office id:</label>
                    <input type="number" placeholder="Enter office id " name="office" class="form-control form-control-lg" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label">Select image:</label>
                    <input type="file"  name="img" accept="image/jpg">
                    </div>

                  <div class="d-flex justify-content-center">
                    <input type="submit" value="Register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit2">
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
$servername="localhost";
$username="root";
$pass="";
$dbname="car_rental";
$conn=mysqli_connect($servername,$username,$pass,$dbname);
if(!$conn){
    die('Connection Failed'.mysqli_connect_error());
}
if(isset($_POST["submit2"]))
{
    	
    $brand=$_POST["brand"];
    $year=$_POST["year"];
    $platenum=$_POST["plate"];
    $type=$_POST["type"];
    $price=$_POST["price"];
    $office_id=$_POST["office"];
    $image=$_POST["img"];

    $check="SELECT * FROM car WHERE plate_num='$platenum'";
    $result=mysqli_query($conn,$check);
    if(mysqli_num_rows($result)>0)
    {
    echo"<script> alert('car already exists');
    window.location.href='http://localhost/car_rental/car_register.php';
    </script>";
    }
    else{
        $query="INSERT INTO car (brand,car_year,plate_num,type,price,office_id,image) VALUES ('$brand','$year','$platenum','$type','$price','$office_id','$image')";
        $res1=mysqli_query($conn,$query);
        echo"<script>
        alert('New car added successfully');
        window.location.href='http://localhost/car_rental/admin_index.php';
        </script>";


    }

}
?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>