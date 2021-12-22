<?php
include 'db.php';
include 'templates/default/header.php';
session_start();





$query = "SELECT * FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";
$info = mysqli_query($connection,$query);
$rows = mysqli_fetch_array($info);

if (empty($_SESSION['emri'])) {
    $_SESSION['emri'] = $rows['emri'];
  }
       if (empty($_SESSION['mbiemri'])) {
       $_SESSION['mbiemri'] = $rows['mbiemri'];
      }
if (empty($_SESSION['username'])) {
    $_SESSION['username'] = $rows['username'];
}
if (empty($_SESSION['email'])) {
    $_SESSION['email'] = $rows['email'];
}
      if (empty($_SESSION['password'])) {
        $_SESSION['password'] = $rows['password'];
    }


?>

<div id="container">
  <div id="page">
  <div id="title">
    <h1 style="font-family:'Rubik',sans-serif;border-bottom:solid 1px #e6e6e6;padding: 3px;">Profili im</h1><br>

<form method="post" action="/puno">
<?php

if(isset($_SESSION['msg1']) && isset($_SESSION['msg1']) !="")
{ 
echo '<div id="infobox"><strong>' . $_SESSION['msg1'] . '</strong><br />' . $_SESSION['msg2'] . '</div>';
unset($_SESSION['msg1']); 
unset($_SESSION['msg2']); 
} 

?>
	<input type="hidden" name="task" value="myaccount" />
	<input type="hidden" name="id" value="<?php echo $rows['id']; ?>" />
	<fieldset><table width="100%" border="0" cellpadding="2" cellspacing="0"><tr>
    <tr>
		<td class="fieldname" style="width:140px;">Emri</td>
		<td class="fieldarea"><input type="text" name="emri" class="text" size="35" value="<?php echo $rows['emri'];?>" />
		</td>
	</tr>
    <tr>
		<td class="fieldname" style="width:140px;">Mbiemri</td>
		<td class="fieldarea"><input type="text" name="mbiemri" class="text" size="35" value="<?php echo $rows['mbiemri'];?>" />
		</td>
	</tr>
		<tr>
		<td class="fieldname" style="width:140px;">Email</td>
		<td class="fieldarea"><input type="text" name="email" class="text" size="35" value="<?php echo $rows['email'];?>" />
		</td>
	</tr><tr>
		<td class="fieldname" style="width:140px;">Username</td>
		<td class="fieldarea"><input type="text" name="username" class="text" size="25" value="<?php echo $rows['username'];?>" />
		</td>
	</tr><tr>
		<td class="fieldname" style="width:140px;">Passwordi</td>
		<td class="fieldarea"><input type="password" name="password" class="text" size="20" value="" />
			<font color="#666666" size="-2">(Lere that per mos nderruar pwn)</font></td>
		</tr><tr>
			<td class="fieldname" style="width:140px;">Rishkruaj Paswordin</td>
			<td class="fieldarea"><input type="password" name="password2" class="text" size="20" value="" />
			</td>
		</tr></table></fieldset><img src="templates/default/images/spacer.gif" height="10" width="1" alt="" /><br />
		<div align="center">
			<button type="submit" name="ruaje" class="btndefaultgreen" /><i class="fas fa-check"></i> Ruaj</button>
			<button type="reset" class="btndefaultred" /><i class="fas fa-times"></i> Anulo</button>
		</div>
	</form>