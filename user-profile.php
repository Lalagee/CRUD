<?php
//include('header.php');
    session_start();
    $uid = $_SESSION['userid'];
    $uemail = $_SESSION['uemail'];

if(!isset($_SESSION['userid'])){
        header('location: Login.php');
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
  public function EditUser($uid,$pname,$pemail,$ppass,$ppicture,$connection)
  { 
        //if(isset($ppicture))
        //{  
    
    
        $query = "UPDATE userregis set Username = '$pname' , Uemail = '$pemail', Upass ='$ppass', image = '$ppicture' where id = '$uid'";
        
        $result = mysqli_query($connection,$query);
        if($result)
          
          return true;
        //}
       // else
      //  {
        //   $query = "UPDATE userregis set Username = '$pname' , Uemail = '$pemail', Upass ='$ppass' where id = '$uid'";

        // $result = mysqli_query($connection,$query);
        // if($result)
        // echo "Update Sucessfully";
        // }  
    
    
  }

  // public function ViewPost($postid,$connection)
  // {
  //   $query = "SELECT Pid, title, Description FROM `Post` WHERE Pid = '$postid'";

  //   $result1 = mysqli_query($connection,$query);
  //   this->result1 = $result1;


  // } 
}


    $conn = new connectdb;
    $connection =$conn->setconnection();
    $query = "SELECT * FROM `userregis` WHERE id = '$uid'";

      $result1 = mysqli_query($connection,$query);

        //$vefun = new dbfunction;
        // $efun->ViewPost($postid,$connection);
        // $result1=$efun->result1;

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
                    $dname = $col['Username'];
                    $demail = $col['Uemail'];
                    $dpass = $col['Upass'];
                    $dpicture =$col['image'];
                   // $file_name =$dpicture;
                    
                                 
                    }
              }
      

    $file_name = $dpicture;
    

    if (isset($_POST['submit']))
    {
        $pname = $_POST['uname'];
        $pemail = $_POST['uemail'];
        $ppass = $_POST['upass'];
        
        //$ppicture= $_FILES['mypicture']['name'];
        if(isset($_FILES['image123'])&& !empty($_FILES['image123']['size']))
        {
          $errors= array();
          $file_name = $_FILES['image123']['name'];
          $file_size =$_FILES['image123']['size'];
          $file_tmp =$_FILES['image123']['tmp_name'];
          $file_type=$_FILES['image123']['type'];
          $file_ext=strtolower(end(explode('.',$_FILES['image123']['name'])));
          $extensions= array("jpeg","jpg","png");
      
            if(in_array($file_ext,$extensions)== false)
            {
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
          
            if($file_size> 2097152)
            {
             $errors[]='File size must be excately 2 MB';
            }
          
            if(empty($errors)==true)
            {
             move_uploaded_file($file_tmp,"images/".$file_name);
            }
            else
            {
             print_r($errors);
            }
        }
        

    
        

          

        

    

    $efun = new dbfunction;
    $success = $efun->EditUser($uid,$pname,$pemail,$ppass,$file_name,$connection);
    if ($success) {
          $error = '<div class="alert alert-success">Updated Successfully</div>';
    }
   
    }

    $query = "SELECT * FROM `userregis` WHERE id = '$uid'";

      $result1 = mysqli_query($connection,$query);

       $rowcount = mysqli_num_rows($result1);
       if($rowcount == 0)
       {
        echo "No Post Edit";
       }
       else
              {
                while ($col = mysqli_fetch_array($result1))
                    {
                    $dname = $col['Username'];
                    $demail = $col['Uemail'];
                    $dpass = $col['Upass'];
                    $dpicture =$col['image'];
                   // $file_name =$dpicture;
                    
                                 
                    }
              }

      

    
    //$postid =$_GET['postid'];
    

    
    
    
      

    
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
                        <div class="h3 mb-0">Edit User Profile</div>
                        <?php   ?>
                          
                    </div>


                    <!-- Form -->
                    <div>
                        <form method="post"  enctype="multipart/form-data">
                            <div class="form-row">
                              <div class="form-group col-12 col-md-6">
                                <img src="<?php echo "images/".$dpicture; ?> "  alt="Flowers in Chania" width="100" height="100">
                                    
                              </div>
                                
                                                                  
                                
                            </div>
                            <div class="form-row">
                              
                                <div class="form-group col-12 col-md-6">
                                    <label for="name">User Name</label>
                                    <?php // echo $dname ?>
                                    <input type="text" class="form-control" value= "<?php echo $dname;  ?>" id="name" name="uname" placeholder="User Name">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="email">User Email</label>
                                    <div>
                                    <input type="text" class="form-control" value=<?php echo $demail;  ?> id="name" name="uemail" placeholder="User Name">
                                </div>
                                                                  
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="email">User Password</label>
                                    <div>
                                    <input type="text" class="form-control" value=<?php echo $dpass;  ?> id="name" name="upass" placeholder="User Name">
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="file">Profile Picture </label>
                                    <div>
                                    <input type="file" id="myfile" name="image123">
                                </div>

                                  
                                </div>
                            </div>
                            <div class="form-row">
                                
                            </div>
                            
                            <!-- <button type="button" name="submit">Submit</button> -->
                            <input type="submit" name="submit" class="btn btn-primary btn-block">
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <?php echo(isset($error))? $error:''; ?>    
                                </div>
                            </div>
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
</html>