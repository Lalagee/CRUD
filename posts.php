<?php
//include('header.php');

    session_start();
    $uid = $_SESSION['userid'];
    $uemail = $_SESSION['uemail'];


if(!isset($_SESSION['userid']))
          {
        header('location: Login.php');
          }
//connect to database
class dbfunction
{
  public function loginfunction($email,$pwd,$connection)
  {
    
  

        $query = "SELECT id,Uemail,Upass FROM `userregis` WHERE Uemail = '$email' ";

        $result = mysqli_query($connection,$query);
  
        $rowcount = mysqli_num_rows($result);
         if($rowcount == 0)
          {
            echo "Email is Not register";
          }
       else
           {
            while ($col = mysqli_fetch_array($result))
                 {
                  $did = $col['id'];
                  $dpwd = $col['Upass'];
                  $demail = $col['Uemail'];
                  if($dpwd == $pwd)
                     {
                      session_start();
                      $_SESSION['userid'] = $did;
                      $_SESSION['uemail'] = $demail;
                      $check = $_SESSION['userid'];
                      
                      if($check)
                        {
                          header('location: index.php');
                        }
                      }
                  else
                    echo "Password is Incorrect";
                 }
           }
              mysqli_free_result($result);
              mysqli_close($connection);      
      

  }
  public function DeletePost($postid,$connection)
  {
    $query = "delete from Post where Pid = '$postid' ";
    
    $result = mysqli_query($connection,$query);
    if($result)
        { echo "One Post Deleted Sucessfully";}

  }
}

class connectdb extends dbfunction
{
  public function setconnection()
  {
    $host = "localhost";
$username = "root";
$password = "";
$dbname = "phptrainee";
$connection = mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
die("database connection failed. Error Number:" .
mysqli_connect_errno()." Error Type.".mysqli_connect_error());
                          }
        return $connection;

  }
}


if(isset($_GET['postid']) && $_GET['action'] =="delete")
  {
    $postid =$_GET['postid'];
    $conn = new connectdb;
    $connection =$conn->setconnection();
    $dfun = new dbfunction;
    $dfun->DeletePost($postid,$connection);
    
  }

  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Users | Graindashboard UI Kit</title>

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
                                <a href="#">Post</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Posts</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->

                    <div class="mb-3 mb-md-4 d-flex justify-content-between">
                        <div class="h3 mb-0">Posts</div>
                    </div>


                    <!-- Users -->
                    <div class="table-responsive-xl">
                        <table class="table text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">Post ID</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">TITLE</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">DESCRIPTION</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php

//echo $uid;
   $conn = new connectdb;
   $connection =$conn->setconnection();
   $query = "SELECT Pid, title, Description FROM `Post` WHERE id = '$uid'";
   $result1 = mysqli_query($connection,$query);

      //if(empty($result)){
        //echo "Invalid Email";
      //}
       $rowcount = mysqli_num_rows($result1);
       if($rowcount == 0)
       {
        echo "No Post Yet";
       }
       else
          {
     while ($col = mysqli_fetch_array($result1))
     {
      

       echo '<tr>
                                <td class="py-3">'.$col['Pid'].'</td>
                                <td class="align-middle py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative mr-2">
                                            
                                            <!--img class="avatar rounded-circle" src="#" alt="John Doe"-->
                                            
                                        </div>'.$col['title'].'
                                    </div>
                                </td>
                                <td class="py-3">'.$col['Description'].'</td>
                                
                                
                                <td class="py-3">
                                    <div class="position-relative">
                                        <a class="link-dark d-inline-block" href="post-edit.php?postid='.$col['Pid'].'&action=edit">
                                            <i class="gd-pencil icon-text"></i>
                                        </a>
                                        <a class="link-dark d-inline-block" href="posts.php?postid='.$col['Pid'].'&action=delete">
                                            <i class="gd-trash icon-text"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                           ';
       
      //echo "<br>";
     }
     }
//echo $uid;
     ?>  
                            </tbody>
                        </table>
                        <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                            <div class="d-flex mb-2 mb-md-0">Showing 1 to 8 of 24 Entries</div>

                            <nav class="d-flex ml-md-auto d-print-none" aria-label="Pagination"><ul class="pagination justify-content-end font-weight-semi-bold mb-0">				<li class="page-item">				<a id="datatablePaginationPrev" class="page-link" href="#!" aria-label="Previous"><i class="gd-angle-left icon-text icon-text-xs d-inline-block"></i></a>				</li><li class="page-item d-none d-md-block"><a id="datatablePaginationPage0" class="page-link active" href="#!" data-dt-page-to="0">1</a></li><li class="page-item d-none d-md-block"><a id="datatablePagination1" class="page-link" href="#!" data-dt-page-to="1">2</a></li><li class="page-item d-none d-md-block"><a id="datatablePagination2" class="page-link" href="#!" data-dt-page-to="2">3</a></li><li class="page-item">				<a id="datatablePaginationNext" class="page-link" href="#!" aria-label="Next"><i class="gd-angle-right icon-text icon-text-xs d-inline-block"></i></a>				</li>				</ul></nav>
                        </div>
                    </div>
                    <!-- End Users -->
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
</html>