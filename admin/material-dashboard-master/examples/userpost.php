<?php
$host = "localhost";
$username = "newroot";
$password = "Test@321";
$dbname = "phptrainee";
$connection = mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_errno()){
die("database connection failed. Error Number:" .
mysqli_connect_errno()." Error Type.".mysqli_connect_error());
                          }

//user Deletion
if(isset($_GET['userid']) && $_GET['action'] =="delete")
  {
    $Uid =$_GET['userid'];
    $query = "delete from userregis where id = '$Uid' ";
    
    $result = mysqli_query($connection,$query);
      
  }
// Post Deletion
if(isset($_GET['postid']) && $_GET['action'] =="delete")
  {
    $Uid =$_GET['postid'];
    $query = "delete from Post where Pid = '$Uid' ";
    
    $result = mysqli_query($connection,$query);
      
  }







?>
<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a></div>
      <?php include("sidebar.php");  ?>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Table List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <?php include("header.php"); ?>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <form action="/action_page.php">

<?php
    $query = "SELECT id,Username FROM `userregis` ";
    $result1 = mysqli_query($connection,$query);
    $rowcount = mysqli_num_rows($result1);
    
?>

  <label for="cars">Choose a User View Thier Posts:</label>
  <select name="cars" id="userchange">
    <option class ="selected" value= 0 >Select any user</option>
     <?php  
            while ($col = mysqli_fetch_array($result1))
          {
    
             echo '<option class="selected" name= "userid" value="'.$col["id"].'">'.$col["Username"].'</option>';
    
          }
       
     ?>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>
     
<?php
//echo $uid;
   
//    $query = "SELECT * FROM `userregis` ";
//    $result1 = mysqli_query($connection,$query);

//       //if(empty($result)){
//         //echo "Invalid Email";
//       //}
//        $rowcount = mysqli_num_rows($result1);
//        if($rowcount == 0)
//        {
//         echo "No Post Yet";
//        }
//        else
//           {
//      
//      while ($col = mysqli_fetch_array($result1))
//      {
      

//        echo '<option value="">"'.col["Username"].'"</option>
             
//                            ';
     
//      }
//      </select>

//      }
// //echo $uid;
     ?>  
                        
                   
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Table on Plain Background</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  class="table table-hover">
                      <thead class="">
                        <th>
                          Post ID
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                          Delete Post
                        </th>
                        
                      </thead>
                      <tbody id= "tdata">
                        <?php
   if(isset($_GET['userid']) && $_GET['action'] =="view")
  {
    $Uid =$_GET['userid'];
    $user =$_GET['record'];

    if($user == 0 )
    {
    $query ="SELECT u.Username,p.Pid,p.title,p.Description,p.id 
FROM userregis u
INNER JOIN Post p
ON u.id = p.id
where u.id ='$Uid'
ORDER by p.Pid";
    //$query = "select * from Post where id = '$Uid' ";
    
    $result1 = mysqli_query($connection,$query);
    $rowcount = mysqli_num_rows($result1);
       if($rowcount == 0)
       {
        echo "No Post Yet";
       }
       else
          {
     while ($col = mysqli_fetch_array($result1))
                  {
                  echo '    
                        <tr id='.$col['Pid'].'>
                          <td>
                            '.$col['Pid'].'
                          </td>
                          <td>
                            '.$col['title'].'
                          </td>
                          <td>
                            '.$col['Description'].'
                          </td>
                          <td>
                          <button type="button" class="dlink" name =postid value='.$col['Pid'].'>Delete</button>
                          </td>
                          <td>
                            '.$col['Username'].'
                          </td>
                        </tr>';
                    }
            }
      }
      else
      {
        $query ="SELECT u.Username,p.Pid,p.title,p.Description,p.id 
FROM userregis u
INNER JOIN Post p
ON u.id = p.id
ORDER by u.Username";
    //$query = "select * from Post where id = '$Uid' ";
    
    $result1 = mysqli_query($connection,$query);
    $rowcount = mysqli_num_rows($result1);
       if($rowcount == 0)
       {
        echo "No Post Yet";
       }
       else
          {
     while ($col = mysqli_fetch_array($result1))
                  {
                  echo '    
                        <tr id='.$col['Pid'].'>
                          <td>
                            '.$col['Pid'].'
                          </td>
                          <td>
                            '.$col['title'].'
                          </td>
                          <td>
                            '.$col['Description'].'
                          </td>
                          <td>
                          <button type="button" class="dlink" name =postid value='.$col['Pid'].'>Delete</button>
                          </td>
                          <td>
                            '.$col['Username'].'
                          </td>
                        </tr>';
                    }
            }
      }

   }                
    ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include ("fotter.php"); ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  
  <script>
    
     $(document).ready(function() {
      $(".dlink").click(function(){

        var dataId = $(this).attr("value");


        $.ajax({
            type:"POST",
            url: "deletepost.php",
            data: {"post_id":dataId,"action":"delete_post"},
            success: function(response){
             $("#"+dataId).remove();
              alert('post deleted');
                                        }


              });

     
    
    
        });

      
      $("#userchange").change(function(){
              var id = $(this).val();

              if(id==0)
                alert("Plz select the User");
              else
              {

              $.ajax({
              type:"POST",
              url: "deletepost.php",
              data: {"s_Userid":id,"action":"user_posts"},
              success: function(response){
                console.log(response);
                    $("#tdata").html(response);
                  },
              error: function(error){
                console.log(error);
              }
          });



              alert("The user id is "+id);
            }
                                });
      



      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>