<?php
include 'db.php';
session_start();




if(isset($_POST['ruaje'])) {


    $idasg = mysqli_real_escape_string($connection,$_POST['id']);

$query = "SELECT * FROM users WHERE id='$idasg'";
$info = mysqli_query($connection,$query);
$rows = mysqli_fetch_array($info);


$ida = $rows['id'];
    
    
    $emri = mysqli_real_escape_string($connection,$_POST['emri']);
    $mbiemri = mysqli_real_escape_string($connection,$_POST['mbiemri']);
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $password2 = mysqli_real_escape_string($connection,$_POST['password2']);




   

    
    
    
    $len = strlen($emri);
    if ($len <= "0")
    {
        $_SESSION['msg2'] .= "<li>Emri [ <b>Emri nuk eshte shkruar</b> ]</li>";
    }
    $len = strlen($mbiemri);
    if ($len <= "0")
    {
        $_SESSION['msg2'] .= "<li>Mbiemri [ <b>Mbiemri nuk eshte shkruar</b> ]</li>";
    }
    $len = strlen( $email );
    if ( $len <= "0" )
    {
        $_SESSION['msg2'] .= "<li>Email [ <b>Nuk eshte shkruar</b> ]</li>";
    }
    else if ($len <= "3")
    {
        $_SESSION['msg2'] .= "<li>Email [ <b>Nuk eshte i gjat mjaftueshum</b> ]</li>";
    }
    $len = strlen( $username );
    if ($len <= "0")
    {
        $_SESSION['msg2'] .= "<li>Username [ <b>Not Entered</b> ]</li>";
    } else if (mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `users` WHERE `username` = '".$username."' && `id` != '".$ida."'")) != 0 )
    {

        $_SESSION['msg2'] .= "<li>Username  [ <b>Eshte ne perdorim provoni nje tjter</b> ]</li>";
    }
    if ( $password !== $password2 )
    {
        $_SESSION['msg2'] .= "<li>Passwords  [ <b>Passwordi nuk perputhet</b> ]</li>";
    }

    if ( isset( $_SESSION['msg2'] ) )
    {
        $_SESSION['msg1'] = "Ju lutem vendosni te dhenat ne rregull!!!!!";
        $_SESSION['msg2'] = "<ul>".$_SESSION['msg2']."</ul>";
        header("Location: /profili/im");
        exit( );
    }


    

    
    if ( empty( $password ) )
    {
      $querys = "UPDATE `users` SET `username` = '".$username."', `emri` = '".$emri."', `mbiemri` = '".$mbiemri."', `email` = '".$email."' WHERE `id` = '".$ida."'";
      $yess = mysqli_query($connection,$querys);
    }
    else
    {
      $queri = "UPDATE `users` SET `username` = '".$username."', `emri` = '".$emri."', `mbiemri` = '".$mbiemri."', `email` = '".$email."', `password` = md5('".$password."') WHERE `id` = '".$ida."'";
      $po = mysqli_query($connection, $queri);
    }
    

    $_SESSION['msg1'] = "Admini eshte bere update me sukses!";
    $_SESSION['msg2'] = "Ndryshimet tuaja te adminit jan ruajtur.";
    header("Location: /");
    exit( );


    
}



?>