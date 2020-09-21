 <?php
    session_start();
    $uid = $_SESSION['userid'];
    $uemail = $_SESSION['uemail'];


if(!isset($_SESSION['userid']))
          {
        header('location: login.php');
          }
//connect to database
class connectdb 
{
  public function setconnection()
  {
$host = "localhost";
$username = "newroot";
$password = "Test@321";
$dbname = "phptrainee";
$connection = mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
die("database connection failed. Error Number:" .
mysqli_connect_errno()." Error Type.".mysqli_connect_error());
                          }
        return $connection;

  }
}

class dbfunction extends connectdb 
{
    public $result1;





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
  public function EditPost($postid,$ftitle,$fdesc,$connection)
  {
    
    
        $query = " UPDATE Post set title = '$ftitle' , Description = '$fdesc' where Pid = '$postid'";
        $result = mysqli_query($connection,$query);
        if($result)
        echo "Update Sucessfully";
    
    
  }
   public function AddPost($title_err,$desc_err,$uid,$connection)
   {
  

     $query = "INSERT INTO `Post`(`title`, `Description`, `id`) VALUES ('$title_err','$desc_err','$uid')";
     $result = mysqli_query($connection,$query);
     if($result)
     echo "Posted Sucessfully";
  


   }

}

$conn = new connectdb;
$connection =$conn->setconnection();

  
  

if (isset($_POST['submit'])) {
    
    $title_err = $_POST['title'];
    $desc_err = $_POST['desc'];
    $errors = 0;



    if (empty($title_err)) {
      $title_err1 = "Enter Title plzz";
      $errors++;
                            }
    
    else if(empty($desc_err)) {
      $desc_err1 = "Enter descption";
      $errors++;
                              }

    else if($errors == 0)
    {
        $apfun = new dbfunction;
        $apfun->AddPost($title_err,$desc_err,$uid,$connection);
       
  //     $query = "INSERT INTO `Post`(`title`, `Description`, `id`) VALUES ('$title_err','$desc_err','$uid')";
   //    $result = mysqli_query($connection,$query);
      
    
      $title_err ="";
      $desc_err = ""; 

     }
    // }
    //   else
    //     {
    //     $errormsg[] = mysqli_error($connection);  
    //     }
                         }
//mysqli_close($connection);
        
       


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
                <div class="container">
  
  <form action="addpost.php" method="post">
    
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="uname" placeholder="Title" name="title" value = "<?php echo ( ( isset($title_err))? $title_err: '');?>">
      <tariq class="red" id="sys-error"><?php echo ( ( isset($title_err1))? $title_err1: ''); ?></tariq>
    </div>
    
    <div class="form-group">
      <label for="desc">Description:</label>
      <input type="text" class="form-control" id="email" placeholder="Description" name="desc" value = "<?php echo ( ( isset($desc_err))? $desc_err : '');?>">
      <tariq class="red" id="sys-error"><?php echo ( ( isset($desc_err1))? $desc_err1: ''); ?></tariq>
    </div>
    
    <input type="submit" name="submit" class="btn btn-primary">
    <!-- <button type="submit" name="register" >Submit</button> -->
  </form>
</div>

                
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