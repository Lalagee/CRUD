<?php
//connect to database
$host = "localhost";
$username = "newroot";
$password = "Test@321";
$dbname = "phptrainee";
$connection = mysqli_connect($host,$username,$password,$dbname);

if(mysqli_connect_errno()){
die("database connection failed. Error Number:" .
mysqli_connect_errno()." Error Type.".mysqli_connect_error());
                          }

if (isset($_POST['submit'])) {
    
    							$uname = $_POST['name'];
    							$email = $_POST['email'];
    							$pwd   = $_POST['password'];
    							$cpwd  = $_POST['cpassword'];

    							echo $uname;
    		

    
    
      // Checking that the email address is already exist in the database


      $query = "SELECT Uemail FROM `userregis` WHERE Uemail = '$email' ";
       $resulte = mysqli_query($connection,$query);
      if(empty($resulte)){
        echo "Invalid Email";
      						}
     	while ($col = mysqli_fetch_array($resulte))
      			{
       				$demail = $col['Uemail'];
       				if($demail == $email)
        			$emailexist =1;
			       "Email Already Exist ";

      			}
        if($emailexist == 0)
        		{
       $query = "INSERT INTO `userregis`(`Username`, `Uemail`, `Upass`) VALUES ('$uname','$email','$pwd')";
       $result = mysqli_query($connection,$query);
      
     		if($result){
      					echo "Sucessfully registered!";
     					}
      			else{
        				$errormsg[] = mysqli_error($connection);  
    				}
        		}
        else
          echo "Email Already Exist";


    mysqli_close($connection);
    						}

    
   




?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>Create new account | Graindashboard UI Kit</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/img/favicon.ico">

    <!-- Template -->
    <link rel="stylesheet" href="public/graindashboard/css/graindashboard.css">
  </head>

  <body class="">

    <main class="main">

      <div class="content">

			<div class="container-fluid pb-5">

				<div class="row justify-content-md-center">
					<div class="card-wrapper col-12 col-md-4 mt-5">
						<div class="brand text-center mb-3">
							<a href="/"><img src="public/img/logo.png"></a>
						</div>
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Create new account</h4>
								<form action="register.php" method="post">
			
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control" id="name" name="name" required="" autofocus="">
									</div>

									<div class="form-group">
										<label for="email">E-Mail Address</label>
										<input id="email" type="email" class="form-control" name="email" required="">
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="password">Password
											</label>
											<input id="password" type="password" class="form-control" name="password" required="">
										</div>
										<div class="form-group col-md-6">
											<label for="password-confirm">Confirm Password
											</label>
											<input id="password-confirm" type="password" class="form-control" name="cpassword" required="">
										</div>
									</div>


									<div class="form-group no-margin">
										<input type="submit" name="submit" class="btn btn-primary btn-block">
									</div>
									<div class="text-center mt-3 small">
										Already have an account? <a href="login.php">Sign In</a>
									</div>
								</form>
							</div>
						</div>
						<footer class="footer mt-3">
							<div class="container-fluid">
								<div class="footer-content text-center small">
									<span class="text-muted">&copy; 2019 Graindashboard. All Rights Reserved.</span>
								</div>
							</div>
						</footer>
					</div>
				</div>



			</div>

      </div>
    </main>


	<script src="public/graindashboard/js/graindashboard.js"></script>
    <script src="public/graindashboard/js/graindashboard.vendor.js"></script>
    
  </body>
</html>