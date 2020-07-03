<?php
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

/*$host = "localhost";
$username = "newroot";
$password = "Test@321";
$dbname = "phptrainee";
$connection = mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
die("database connection failed. Error Number:" .
mysqli_connect_errno()." Error Type.".mysqli_connect_error());

                  }*/


if(isset($_POST['action']) && !empty($_POST['action'])){
			$conn = new connectdb;
    		$connection =$conn->setconnection();
    		$dfun = new dbfunction;
   	
   	switch ($_POST['action']) {
   	case 'delete_post':
   	   		$post_id = $_POST['post_id'];
    		$dfun->DeletePost($post_id,$connection);

   		break;
   	case 2:
   	   		echo "my value is 2";
   		break;
   	case 3:
   	   		echo "my value is 3";
   		break;

   	default:
   		echo "My value is not in switch";
   		break;
   				}
 }
?>