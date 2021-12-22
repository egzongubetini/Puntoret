


  <div class="login-page">

    
<?php




require('db.php');
include( "./templates/default/header_login.php" );
session_start();

if (isset($_SESSION['username'])) 
{
header('Location: /');
}


if (isset($_POST['username'])){

 $username = stripslashes($_REQUEST['username']);

 $username = mysqli_real_escape_string($connection,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($connection,$password); 

        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
 $result = mysqli_query($connection,$query) or die(mysql_error());
 $test = mysqli_fetch_assoc($result);
 $rows = mysqli_num_rows($result);
        if($rows==1){
         $emri = $test['emri'];
         $mbiemri = $test['mbiemri'];
         $full = $test['emri'] .' '.$test['mbiemri'];
          $today = date("Y-m-d H:i:s");
         
          if (!empty($_SERVER["HTTP_CLIENT_IP"])){
            
            $ip = $_SERVER["HTTP_CLIENT_IP"];
          }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
         
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
          }else{
            $ip = $_SERVER["REMOTE_ADDR"];
          }

          

        
          $shtimi = "INSERT INTO hyrjet(emri,koha,ip) VALUES ('$full','$today','$ip')";
          mysqli_query($connection, $shtimi);
          

     $_SESSION['username'] = $username;
     $_SESSION['id'] = $test['id'];
      
     header("Location: /");
         }else{
             
         $show_errors = '<div class="alert alert-danger">
        Ju sh&euml;nuat t&euml; dh&euml;na t&euml; gabuara, ju lutemi provoni p&euml;rs&euml;ri!
        </div>';
 }
    } 
?>
 <div class="login-page">
    <div class="form">';

<?php if(isset($show_errors)) {
    
   echo $show_errors;
    
} ?>



<form action="" method="post">
        <a href="#"><img src="templates/default/images/logo.png" class="logo"></a>
        <input type="text" name="username" placeholder="Username" required />
        <table width="100%">
        <tr>
        <td width="width:50%"><input style="width:100%;" type="password" name="password" placeholder="Password" required /></td>
        </tr>
        </table>
        <button type="submit" name="submit" class="button"><i class="fas fa-sign-in-alt"></i> Kyqu</button>
             </form>
    </div>
  </div>
   

