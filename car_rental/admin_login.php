
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
  <style>
    body {
      background: #238BD8;
    }
    input::placeholder {
      font-size: 15px;
    }
  </style>




  <script type="text/javascript">
  function validation(){
            var email=document.forms["login_form2"]["email"].value;
            var pass=document.forms["login_form2"]["password"].value;
            if(pass==null || pass==""){
                alert("Please enter your Password");
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


    
  </head>
  <body>

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-200 gradient-custom-3">
    <div class="container h-200">
      <div class="row d-flex justify-content-center align-items-center h-200">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 mx-auto">
          <div class="card " style="border-radius: 50px; width: 600px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Admin Login</h2>

              <form name="login_form2" method="POST" action="admin_index.php" onsubmit="return validation();">

                
                <div class="form-outline mb-4">
                  <label class="form-label" >Email:</label>
                  <input type="email" placeholder="Enter your Email" name="email" class="form-control form-control-lg" />

                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" >Password:</label>

                  <input type="password" placeholder="Enter your Password" name="password" class="form-control form-control-lg" />
                </div>


                <div class="d-flex justify-content-center">
                  <input type="submit" value="Login" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit1">
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
// session_start();
// session_destroy();
// session_start();
// if(isset($_SESSION['use']))   
                             
// //  {
    //  echo "<script> alert('admin found Logging in');
    //  </script>";
//     header("Location:index.php");

//  }

$servername="localhost";
$username="root";
$pass="";
$dbname="car_rental";
$conn=mysqli_connect($servername,$username,$pass,$dbname);
if(!$conn){
    die('Connection Failed'.mysqli_connect_error());
}
if(isset($_POST["submit1"]))
{ 
    $email=$_POST["email"];
    $password=$_POST["password"];
    $encrptedpass=md5($password); 
    $check="SELECT * FROM admin WHERE email='$email'";
    $result=mysqli_query($conn,$check);
    $my_row=mysqli_fetch_assoc($result);
    if($email==$my_row['email'] &&  $encrptedpass==$my_row['password'])
    {
        echo "<script> alert('admin found Logging in');
        </script>";
        //  $_SESSION['use']=$email;
        // echo  "Welcome ".$my_row['clientname'];
    }
    else
    {
        echo"<script>
        alert('admin not found');
        window.location.href='http://localhost/car_rental/index.php';
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