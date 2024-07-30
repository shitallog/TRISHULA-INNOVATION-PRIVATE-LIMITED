<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Login | Trishula Innovation</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/png-logo-copy-favicon.png">
</head>

<body style="background: #1a232d;">
  <div class="container">
    <a class="login-logo d-flex align-items-center justify-content-center mt-5 mb-2">
      <img class="img-fluid" width="50px" src="img/png-logo-copy.png">
      <span style="color: #fff;">&nbsp;Trishula Innovation</span>
    </a>
    <div class="card card-login mx-auto">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" name="username" type="text" aria-describedby="emailHelp" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="password" type="password" placeholder="Password" required>
          </div>
          <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
        </form>
        <div class="d-block small text-center mt-3">
          Copyright © 2021 | Website Designed By <a href="http://technobizzar.com/">Technobizzar</a> | All Rights Reserved
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
<?php 
	include("config.php");
  	session_start();
	if (isset($_POST["login"]))
	{
		$u = mysqli_real_escape_string($con, $_POST['username']);
		$p = mysqli_real_escape_string($con, $_POST['password']);
		$pass = md5($p);
		// $login_code = mysqli_real_escape_string($con, $_POST['login_code']);
		// echo "Username: ".$register_username.", full name: ".$register_fullname.", email: ".$register_email.", pass: ".$register_cpassword;

		$select = "SELECT * FROM admin WHERE admin_username = '$u' AND admin_password = '$pass'";
		//echo $select;exit;
		$result = mysqli_query($con, $select);
		if (mysqli_num_rows($result) > 0)
		{
          $row = mysqli_fetch_array($result);
          $_SESSION['admin_user'] = $row["admin_name"];
          $_SESSION["login_time_stamp"] = time(); 
          echo ("<script LANGUAGE='JavaScript'>
               window.alert('Login successful!');
               window.location.href='index.php'; 
           </script>");
			
		}
		else
		{
			echo ("<script LANGUAGE='JavaScript'>
              window.alert('Username or Password Incorrect');
                  window.location.href='login.php'; 
              </script>");
		}
	}

	if(isset($_GET['logout']))
    {
       // remove all session variables
       session_unset(); 
       // destroy the session 
       session_destroy(); 
       echo ("<script LANGUAGE='JavaScript'>
           window.location.href='login.php';
       </script>");
    }
?>
