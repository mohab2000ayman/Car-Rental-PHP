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




  <script type="text/javascript">
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
  </script>
</head>

<body>

  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-200 gradient-custom-3">
      <div class="container h-200">
        <div class="row d-flex justify-content-center align-items-center h-200">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6 mx-auto">
            <div class="card " style="border-radius: 50px; width: 600px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Sign Up</h2>

                <form name="signup_form" method="POST" action="" onsubmit="return validateForm();">

                  <div class="form-outline mb-4">
                    <label class="form-label">Name:</label>
                    <input type="text" placeholder="Enter your Name" name="name" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" >Email:</label>
                    <input type="email" placeholder="Enter your Email" name="email" class="form-control form-control-lg" />

                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" >Password:</label>
                    <input type="password" placeholder="Enter your Password" name="password" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label"  >Confirm your password:</label>
                    <input type="password" placeholder="Confirm Password" name="CP" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">license number:</label>
                    <input type="text" placeholder="Enter License number" name="L_num" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Date of Birth:</label>
                    <input type="date" placeholder="Enter Date of Birth " name="DOB" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" >Phone Number:</label>
                    <input type="number" placeholder="Enter your Phone Number" name="ph_num" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label"  >Country:</label>
                    <input type="text" placeholder="Enter your Country" name="country" class="form-control form-control-lg" />
                  </div>

                  <div class="d-flex justify-content-center">
                    <input type="submit" value="Register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit33">
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="index.php" class="fw-bold text-body"><u>Login here</u></a></p>

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
if(isset($_POST["submit33"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    $dob=date('Y-m-d',strtotime($_POST["DOB"]));
    $country=$_POST["country"];
    $license=$_POST["L_num"];
    $phone=$_POST["ph_num"];
    $check="SELECT * FROM client WHERE email='$email'";
    $result=mysqli_query($conn,$check);
    if(mysqli_num_rows($result)>0)
    {
    echo"<script> alert('user already exists');
    window.location.href='http://localhost/car_rental/index.php';
    </script>";
    }
    else{
        $query="INSERT INTO client (clientname,email,password,license_num,DOB,phonenum,country) VALUES ('$name','$email','$password','$license','$dob','$phone','$country')";
        $res1=mysqli_query($conn,$query);
        echo"<script>
        alert('New details entered');
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