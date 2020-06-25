<?php
//include('header.php');
    session_start();
    $uid = $_SESSION['userid'];
    $uemail = $_SESSION['uemail'];

if(!isset($_SESSION['userid'])){
        header('location: Login.php');
}
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
if(isset($_GET['postid']) && $_GET['action'] =="edit"){
                        
    $lpostid =$_GET['postid'];
if (isset($_POST['submit'])){ 
    $ftitle = $_POST['name'];
    $fdesc = $_POST['desc'];
     // echo $lpostid;
     // echo $ftitle;
     // echo $fdesc;
     // die();

    $query = " UPDATE Post set title = '$ftitle' , Description = '$fdesc' where Pid = '$lpostid'";
    
    $result = mysqli_query($connection,$query);
    if($result)
        { echo "Update Sucessfully";}

    //var_dump($query);
    //die;
    
  
}


        $postid =$_GET['postid'];
    
        $query = "SELECT Pid, title, Description FROM `Post` WHERE Pid = '$postid'";
//var_dump($query);
//die;
    
    //$result = mysqli_query($connection,$query);
        $result1 = mysqli_query($connection,$query);

      //if(empty($result)){
        //echo "Invalid Email";
      //}
       $rowcount = mysqli_num_rows($result1);
       if($rowcount == 0)
       {
        echo "No Post Edit";
       }
       else
              {
                while ($col = mysqli_fetch_array($result1))
                    {
                    $dpid = $col['Pid'];
                    $dtitle = $col['title'];
                    
                    $ddesc = $col['Description'];
                     
                    }
              }

      

    //var_dump($query);
    //die;
    

  
//   if(isset($_GET['postid']) && $_GET['action'] =="delete")
//   {
//     $postid =$_GET['postid'];
//     $query = "delete from Post where Pid = '$postid' ";
// //var_dump($query);
// //die;
    
//     $result = mysqli_query($connection,$query);
//     if($result)
//         { echo "One Post Deleted Sucessfully";}

//     //var_dump($query);
//     //die;
    
//   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Create User | Graindashboard UI Kit</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/img/favicon.ico">

    <!-- Template -->
    <link rel="stylesheet" href="public/graindashboard/css/graindashboard.css">
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
<!-- Header -->
<?php
include 'header.php';
?>
<!-- End Header -->

<main class="main">
    <!-- Sidebar Nav -->
    <?php
include 'sidebar.php';
?>
    <!-- End Sidebar Nav -->

    <div class="content">
        <div class="py-4 px-3 px-md-4">
            <div class="card mb-3 mb-md-4">

                <div class="card-body">
                    <!-- Breadcrumb -->
                    <nav class="d-none d-md-block" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Users</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create New User</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->

                    <div class="mb-3 mb-md-4 d-flex justify-content-between">
                        <div class="h3 mb-0">Create New User</div>
                    </div>


                    <!-- Form -->
                    <div>
                        <form method="post" >
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" value=<?php echo $dtitle;  ?> id="name" name="name" placeholder="User Name">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="email">Description</label>
                                    <div>
                                    <textarea class="form-control" name="desc"> <?php  echo $ddesc;  ?> </textarea>
                                    </div>

                                  <!--   <input type="text-" class="form-control" value= <?php echo $ddesc;  ?> id="email" name="email" placeholder="User Email"> -->
                                </div>
                            </div>
                            <div class="form-row">
                                
                            </div>
                            <div class="custom-control custom-switch mb-2">
                                <input type="checkbox" class="custom-control-input" id="randomPassword">
                                <label class="custom-control-label" for="randomPassword">Set Random Password</label>
                            </div>
                            <!-- <button type="button" name="submit">Submit</button> -->
                            <input type="submit" name="submit" class="btn btn-primary btn-block">
                        </form>
                    </div>
                    <!-- End Form -->
                </div>
            </div>


        </div>

        <!-- Footer -->
        <?php
            include 'footer.php';
        ?>
        <!-- End Footer -->
    </div>
</main>


<script src="public/graindashboard/js/graindashboard.js"></script>
<script src="public/graindashboard/js/graindashboard.vendor.js"></script>

</body>
</html><?php
}
?>