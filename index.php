<?php

include 'db.php';
include 'templates/default/header.php';
session_start();

$query = "SELECT * FROM puntor";
$numra = mysqli_query($connection, $query);

$puntort = mysqli_num_rows($numra);


$stat = "SELECT * FROM puntor WHERE statusi='on'";
$on = mysqli_query($connection, $stat);

$aktiv = mysqli_num_rows($on);

$joakti = "SELECT * FROM puntor WHERE statusi='off'";
$off = mysqli_query($connection, $joakti);

$joaktiv = mysqli_num_rows($off);

$prof = "SELECT * FROM profesionet";
$profes = mysqli_query($connection,$prof);

$profesionet = mysqli_num_rows($profes);

?>

<div id="container">
  <div id="page">
  <div id="title">
  <?php
  $query = "SELECT * FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";
$info = mysqli_query($connection,$query);
$rows = mysqli_fetch_array($info);

?>
    <h1 style="font-family:'Rubik',sans-serif;border-bottom:solid 1px #e6e6e6;padding: 3px;float: center;">Mire se Erdhe, <?php echo $rows['emri']?> <?php echo $rows['mbiemri']?></h1><br>
	<?php
	if(isset($_SESSION['msg1']) && isset($_SESSION['msg1']) !="")
{ 
echo '<div id="infobox"><strong>' . $_SESSION['msg1'] . '</strong><br />' . $_SESSION['msg2'] . '</div>';
unset($_SESSION['msg1']); 
unset($_SESSION['msg2']); 
} 
?>



<table width="100%" cellspacing="0" cellpadding="15">
		<td width="20%">
			<div class="data-holder dataholder_first">
				<table align="center">
					<tr><td><font style="font-size: 20px;color: #fff;"><i  class="fas fa-users"></i> Pun&euml;tor&euml;t</td></tr>
					<tr><td><font style="font-size: 80px;color: #fff;"><?php echo $puntort ?></td></tr>
					<tr><td><br><button type="button" class="btnwhite" onclick="window.location=('/puntoret');"><i class="fas fa-cogs"></i></button></tr>
				</table>
			</div>
		</td>

		<td width="20%">
			<div class="data-holder dataholder_second">
				<table align="center">
					<tr><td><font style="font-size: 20px;color: #fff;"><i class="fas fa-cog"></i> Profesionet</td></tr>
					<tr><td><font style="font-size: 80px;color: #fff;"><?php echo $profesionet ?></td></tr>
					<tr><td><br><button type="button" class="btnwhite" onclick="window.location=('/profesioni');"><i class="fas fa-cogs"></i></button></tr>
				</table>
			</div>
		</td>
		
		<td width="20%">
			<div class="data-holder dataholder_third">
				<table align="center">
					<tr><td><font style="font-size: 20px;color: #fff;"><i class="fas fa-check"></i> Puntoret Aktiv&euml;</td></tr>
					<tr><td><font style="font-size: 73px;color: #fff;"><?php echo $aktiv ?></td></tr>
					<tr><td><br><button type="button" class="btnwhite" onclick="window.location=('/kerko/on');"><i class="fas fa-cogs"></i></button></tr>
				</table>
			</div>
		</td>

		<td width="20%">
			<div class="data-holder dataholder_fourth">
				<table align="center">
					<tr><td><font style="font-size: 20px;color: #fff;"><i class="fa fa-times"></i> Puntoret Joaktiv&euml;</td></tr>
					<tr><td><font style="font-size: 80px;color: #fff;"><?php echo $joaktiv ?></td></tr>
                   	<tr><td><br><button type="button" class="btnwhite" onclick="window.location=('/kerko/off');"><i class="fas fa-cogs"></i></button></tr>
				</table>
			</div>
		</td>

	</table>
</div>
</div>


