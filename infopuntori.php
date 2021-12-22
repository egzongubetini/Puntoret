<?php

include 'db.php';
include 'templates/default/header.php';



if(isset($_GET['info'])) {

 $ida = mysqli_real_escape_string($connection, $_GET['info']);



$query = "SELECT * FROM puntor WHERE id='$ida'";
$muu = mysqli_query($connection, $query);


$nr = mysqli_num_rows($muu);

if($nr == 1){

$rows = mysqli_fetch_array($muu);
$numri = $rows['id'];
$emri = $rows['emri'];
$mbiemri = $rows['mbiemri'];
$rroga = $rows['rroga'];
$aftsia = $rows['aftsia'];
$statusi = $rows['statusi'];









?>



<div id="container">
  <div id="page">
  <div id="title">
    <h1 style="font-family:'Rubik',sans-serif;border-bottom:solid 1px #e6e6e6;padding: 3px;">Menagjimi i puntorit</h1><br>

 </table><table width="100%" border="0" cellpadding="10" cellspacing="0">
  <tr>
    <td class="tab">
<?php
    if(isset($_SESSION['msg1']) && isset($_SESSION['msg1']) !="")
{ 
echo '<div id="infobox"><strong>' . $_SESSION['msg1'] . '</strong><br />' . $_SESSION['msg2'] . '</div>';
unset($_SESSION['msg1']); 
unset($_SESSION['msg2']); 
} 
?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td width="50%" valign="top"><fieldset>
            <table width="100%" border="0" cellpadding="2" cellspacing="2">
              <tbody><tr>
                <td colspan="2" class="fieldheader">Te dhenat e Puntorit</td>
              </tr>
              <tr>
                <td class="fieldname" style="height:20px;width:110px;">Emri</td>
                <td class="fieldarea"><?php echo $emri  ?></td>
              </tr>
              <tr>
                <td class="fieldname" style="height:20px;">Mbiemri</td>
                <td class="fieldarea"><?php echo $mbiemri  ?></td>
              </tr>
              <tr>
                <td class="fieldname" style="height:20px;">Rroga</td>
                <td class="fieldarea"><?php echo $rroga  ?> EUR</td>
              </tr>
              <tr>
                <td class="fieldname" style="height:20px;">Aftsia</td>
                <td class="fieldarea"><?php echo $aftsia  ?></td>
              </tr>
              <tr>
                <td class="fieldname" style="height:20px;">Statusi</td>
                <td class="fieldarea"><?php	if($statusi == 'on'){$statusi = '<font color="#6CFF00">Aktiv&euml;</font>'; echo $statusi;} else {$statusi = '<font color="red">Joaktiv&euml;</font>'; echo $statusi;} ?></td>
              </tr>
            </tbody></table>
            </form>
            </td>
          <td width="50%" valign="top"><fieldset>
          <form method="post" action="">

          <table width="100%" border="0" cellpadding="2" cellspacing="2">
                <tbody><tr>
                  <td class="fieldheader" colspan="2">Vrejtjet e Puntorit</td>
                </tr>
                <tr>
                  <td width="350" align="center"><textarea placeholder="Shkruaj Vrejtjen" style="width: 100%;" name="vrejtja" class="textarea" rows="4" cols="60"></textarea></td>
                <td align="center"><button type="submit" name="baba" class="button green">Shto</button></td>
                </tr>
              </tbody></table>
              </form>
            </fieldset>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
<?php


$idas = mysqli_real_escape_string($connection,$_GET['info']);

            $querys = "SELECT * FROM vrejtjet WHERE id='$idas' ORDER BY vrt_id DESC";
$mu = mysqli_query($connection, $querys);
$id_vrt = 0;
while($rows = mysqli_fetch_array($mu)) {

$turs = $rows['vrt_id'];
$msg = $rows['vrejtja'];
$id_vrt++;
$admin_id = $rows['admin_id'];
$data = $rows['data'];






$quer = "SELECT * FROM users WHERE id='$admin_id'";
$muj = mysqli_query($connection, $quer);


$row = mysqli_fetch_array($muj);

$emri = $row['emri'];
$mbiemri = $row['mbiemri'];

$allname = "$emri " .  "$mbiemri";










?>
            <fieldset>
            <form method="post" action="">

<table width="100%" border="0" cellpadding="2" cellspacing="2">
      <tbody><tr>
        <td class="fieldheader" colspan="2">Vrejtja #<?php echo $id_vrt ?></td>
      </tr>
      <tr>
        <td>
        
        <div style="padding:18px 25px;" class="newsbox">
			<strong>Shkruar nga</strong>&nbsp;<span style="background: #c06c84;" class="badge badge-danger"><?php echo $allname ?></span><br><br>
			<?php echo $msg ?>
		<br><br><table width="100%">
		<tbody><tr>
		  
    <td width="56%" align="right"><button type="button" onclick="window.location.href='/info/fshiju/<?php echo $turs ?>'"  class="button red">Fshije Vrejtjen</button></td>
	  
	   <td align="right">
		 <span class="date-home"><?php echo $data ?></span></td>
   </tr>
</tbody></table>
		
</div>
        </td>
        
      </tr>
    </tbody></table>
    </form> </fieldset>

    <?php } ?>
            
         
          


<?php
if(isset($_POST['baba'])) {


  $ida = mysqli_real_escape_string($connection,$_GET['info']);
  $vretja = mysqli_real_escape_string($connection,$_POST['vrejtja']);
  $admin_id = $_SESSION['id'];
  $today = date("d/m/Y H:i:s");

$query = "INSERT INTO vrejtjet(vrejtja,data,admin_id,id) VALUES ('$vretja','$today','$admin_id','$ida') ";


$result = mysqli_query($connection, $query);

if (!$result) {
	
	die('Failed' . mysqli_error());
	
}else{
	
  
  $_SESSION['msg1'] = "Vrejta Eshte Shtuar me sukses";
  $_SESSION['msg2'] = "Vrejtja eshte shtuar boom !!!!!.";
	header('Location: /info/puntori/'.$ida);
exit;
	
}

}


}
else {

   $_SESSION['msg1'] = "ID nuk egiston!!!";
  $_SESSION['msg2'] = "Kjo id nuk egiston na vjen keq!!.";

	header('Location: /puntoret');
exit;



}


}

if(isset($_GET['fshiju'])) {

   
  $iba = mysqli_real_escape_string($connection,$_GET['fshiju']);

  $qu = "SELECT id FROM vrejtjet WHERE vrt_id='$iba'";
$re = mysqli_query($connection, $qu);
$rest = mysqli_fetch_array($re);
$osap = $rest['id'];




  $query = "DELETE FROM vrejtjet WHERE vrt_id='$iba'";
$result = mysqli_query($connection, $query);

if (!$result) {
	
	die('Failed' . mysqli_error());
	
}else{
	
  
  $_SESSION['msg1'] = "Vrejta Eshte fshir me sukses";
  $_SESSION['msg2'] = "Vrejtja eshte fshir boom !!!!!.";
	header('Location: /info/puntori/'.$osap);
exit;
	
}

} 


?>