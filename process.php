<?php 
include "db.php";
session_start();
if(isset($_GET['delete'])){
	
$id = mysqli_real_escape_string($connection,$_GET['delete']);

$qferi = "SELECT * FROM vrejtjet WHERE id='$id'";
$orea = mysqli_query($connection, $qferi);


$copa = mysqli_num_rows($orea);


if($copa == 0) {






$query = "DELETE FROM puntor WHERE id='$id'";

$result = mysqli_query($connection, $query);







if (!$result) {
 
 die("ERROR DELETE" . mysqli_error($connection));
 
}

	$_SESSION['msg1'] = "U fshi puntori me sukes!";
    $_SESSION['msg2'] = "Ky veprim u krye me sukses";
header('Location: /puntoret');
exit;
	
}
else {
	$_SESSION['msg1'] = "Nuk mund ta fshini Puntorin perderisa figurojn Vrejtjet!";
    $_SESSION['msg2'] = "Ky Puntor ka vrejtje largoni ato nese deshironi te feshini!!!";
header('Location: /puntoret');
exit;

}


}
if(isset($_POST['shipka'])){
	
    

    $ida = mysqli_real_escape_string($connection,$_POST['ida']);
    $emri = mysqli_real_escape_string($connection,$_POST['emri']);
$mbiemri = mysqli_real_escape_string($connection,$_POST['mbiemri']);
$rroga = mysqli_real_escape_string($connection,$_POST['rroga']);
$aftsia = mysqli_real_escape_string($connection,$_POST['aftsia']);
$statusi = mysqli_real_escape_string($connection,$_POST['statusi']);

    
    $messi = "UPDATE puntor SET emri='$emri',mbiemri='$mbiemri',rroga='$rroga',aftsia='$aftsia',statusi='$statusi' WHERE id='$ida'";
    
    $ronaldo = mysqli_query($connection, $messi);
    
    if (!$ronaldo) {
     
     die("ERROR Edit" . mysqli_error($connection));
     
    }
	$_SESSION['msg1'] = "Editi u be me sukses!";
    $_SESSION['msg2'] = "U editua me sukes ju flm!!.";
    header('Location: /puntoret');
    exit;
            
    }





?>


  


