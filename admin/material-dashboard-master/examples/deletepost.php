<?php
class connectdb 
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
        { echo "One Post Deleted Sucessfully";
      exit();
    }

  }
  public function SearchUser($search_user,$connection)
  {
    
    $query = "SELECT * FROM `userregis` where Username like '%$search_user%'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) > 0){
    	 while ($row = mysqli_fetch_array($result) ) {
          ?>
          <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['Username']; ?></td>
            <td><?= $row['Uemail']; ?></td>
          </tr>
         
          <?php
       }
    }
    else{
      ?>
        <tr>
            <td colspan="7">No record found</td>
          </tr>
          <?php
    }

        

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
   	case 'search_user':
   						$search_username = $_POST['s_Userstring'];
   						$dfun->SearchUser($search_username,$connection);
   	   		
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