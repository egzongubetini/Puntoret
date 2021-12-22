<?php
include 'db.php';
include 'templates/default/header.php';

if (isset($_POST['submit'])) {


$emri = mysqli_real_escape_string($connection,$_POST['emri']);
$mbiemri = mysqli_real_escape_string($connection,$_POST['mbiemri']);
$rroga = mysqli_real_escape_string($connection,$_POST['rroga']);
$aftsia = mysqli_real_escape_string($connection,$_POST['aftsia']);
$statusi = mysqli_real_escape_string($connection,$_POST['statusi']);







$query = "INSERT INTO puntor(emri,mbiemri,rroga,aftsia,statusi) VALUES ('$emri','$mbiemri','$rroga','$aftsia','$statusi') ";


$result = mysqli_query($connection, $query);

if (!$result) {
	
	die('Failed' . mysqli_error());
	
}else{
$_SESSION['msg1'] = "Puntori u shtua me sukses!";
  $_SESSION['msg2'] = "Puntori  u shtua me sukes ju flm!!.";

	header('Location: /puntoret');
exit;
	
}

}

?>


<div class="alert alert-danger"><i class="fa fa-times-circle fa-1x"></i> Ju lutem jepini nj&euml; informacion!</div>
<div id="container">
  <div id="page">
  <div id="title">
    <h1 style="font-family:'Rubik',sans-serif;border-bottom:solid 1px #e6e6e6;padding: 3px;">Shto Puntorin</h1><br>

 </table><table width="100%" border="0" cellpadding="10" cellspacing="0">
  <tr>
    <td class="tab">
<form method="post" action=""><input type="hidden" name="task" value="serverinstall" />
<input type="hidden" name="serverid" value="5a" /><input type="hidden" name="boxid" value="baba" />
<input type="hidden" name="ipid" value="$ipida" /><img src="templates/default/images/spacer.gif" width="1" height="6" alt="" /><br /><fieldset><table width="100%" border="0" cellpadding="2" cellspacing="2"><tr>
                                 <tr>
								  <td class="fieldname" style="width:140px;">Emri</td>
       								  <td class="fieldarea"><input type="text" name="emri" class="text" size="10" value="" required/>
								    </td>
							    </tr><tr>
								  <td class="fieldname" style="width:140px;">Mbiemri</td>
								  <td class="fieldarea"><input type="text" name="mbiemri" class="text" size="15" value="" required/>
								    <font color="#666666" size="-2"></font></td>
							    </tr><tr>
								  <td class="fieldname" style="width:140px;">Rroga</td>
								  <td class="fieldarea"><input type="number" name="rroga" class="text"  size="15" value="" required/>
								    <font color="#666666" size="-2">EUR</font></td>
							    </tr><tr>
								  <td class="fieldname" style="width:140px;">Profesioni</td>
								  <td><select name="aftsia" class="select">
                                  <?php 
                                  $prof = "SELECT * FROM profesionet";
                                       $profes = mysqli_query($connection,$prof);

                                   while($rows = mysqli_fetch_array($profes)){
                                       $profesioni = $rows['prof_title'];
                                                                              
                                    ?>   
                                  
                                  
                                 
								  <option value="<?php echo $profesioni ?>"><?php echo $profesioni ?></option>
                                   <?php } ?>
								  </select></td>
								    </td>
							    </tr>
								<td class="fieldname" style="width:140px;">Statusi</td>
								<td>	<input type="hidden" name="statusi" value="off"/>
	<input type="checkbox" name="statusi" id="statusi" value="on">
	<label for="statusi" class="container"> Statusi i Puntorit
	<span class="checkmark"></span>
	</label></td>

								</table></fieldset><fieldset><table width="100%" border="0" cellpadding="2" cellspacing="2"><tr>

					<div align="center"><input type="submit" name="submit" value="Shto Puntorin" class="button green" />&nbsp;<input type="button" value="Kthehu mbrapa" onclick="window.location='/puntoret'" class="button red" /></div></form>    </td>
  </tr>
</table>