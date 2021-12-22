<?php

include 'db.php';
include 'templates/default/header.php';




session_start();



$nri = 0;



$query = "SELECT * FROM puntor";


$result = mysqli_query($connection, $query);

$baba = mysqli_query($connection, $query);

if (!$result) {
	
	die('Failed' . mysqli_error());
	
}


if (isset($_GET['query'])) {
$search = mysqli_real_escape_string($connection,$_GET['query']);
$sear = "SELECT * FROM `puntor` WHERE CONCAT(emri, ' ', statusi) LIKE '%".$search."%' ORDER by id DESC";
$result = mysqli_query($connection, $sear);






}
if (isset($_POST['baba'])) {

   if (empty($_POST['baba'])) {
    echo '<div class="alert alert-danger"><i class="fa fa-times-circle fa-1x"></i> Ju lutem jepini nj&euml; informacion!</div>';
   }


$baba = mysqli_real_escape_string($connection,$_POST['kerko']);
header("Location: /kerko/$baba");

}





?>







<div class="alert alert-danger"><i class="fa fa-times-circle fa-1x"></i> Ju lutem jepini nj&euml; informacion!</div>
<div id="container">
  <div id="page">
  <div id="title">
    <h1 style="font-family:'Rubik',sans-serif;border-bottom:solid 1px #e6e6e6;padding: 3px;">Lista e Puntorve</h1><br>
			<table width="100%">
			<tr>
				
			</tr>
		</table>
		
		

	<tr>
   <form action="" method="POST">  
    <table align="center" width="98%" cellspacing="0" cellpadding="12">
        <tr>
		&nbsp;&nbsp;&nbsp;
            <input class="text" style="width: 30%;" type="text" placeholder="K&euml;rko sipas emrit..." name="kerko" required/>
            &nbsp;&nbsp;&nbsp;
            <button type="submit" name="baba" class="btndefault"><i class="fas fa-search"></i> K&euml;rko</button>
<div style= float:right >
 <button type="button" onclick="window.location.href='/shtopuntorin'" class="btndefaultgreen"><i class="fas fa-plus"></i> Shto punetorin</button></div>


			
				
			</tr>
		


        </tr>
    </table>
	
	

<?php 

if(isset($_SESSION['msg1']) && isset($_SESSION['msg1']) !="")
{ 
echo '<div id="infobox"><strong>' . $_SESSION['msg1'] . '</strong><br />' . $_SESSION['msg2'] . '</div>';
unset($_SESSION['msg1']); 
unset($_SESSION['msg2']); 
} 



?>






	
	
</form> 
<br>
<table width="100%" id="myTable" cellspacing="0" cellpadding="5" class="data_list">
<thead>
            <tr>
                <th width="35px" style="font-size:13px;">Id</th>
                 <th style="text-align:left;">Emri</th>
                <th style="text-align:left;">Mbiemri</th>
                <th style="text-align:left;">Rroga</th>
                <th style="text-align:left;">Profesioni</th>
                <th style="text-align:left;">Statusi</th>
				<th width="100px" style="text-align: left;"></th>
                <th width="74px"style="text-align: left;"></th>
                <th width="84px"style="text-align: left;"></th>
            </tr>
            </thead>
                <?php
				

                    if(mysqli_num_rows($result) == 0) {
						
						echo '<tr><td style="text-align:center;" colspan="7">Nuk ka asnje puntor per te shfaqur!!!!</td></tr>';
						
					} else {				
				
				     while( $row = mysqli_fetch_assoc($result)){
						 

	
            $nri++;		
    	  $id = $row['id'];
	  $emri = $row['emri'];
	  $mbiemri = $row['mbiemri'];
	  $rroga = $row['rroga'];
	  $aftsia = $row['aftsia'];
	  $statusi = $row['statusi'];
	  	  
     
			?>	
				
				
	              
                 <tr> 
                             <td style="text-align:center;"><b><?php echo $nri ?></b></td>
							 <td style="text-align:left;"><b><?php echo $emri ?></b></td>
                            <td style="text-align:left;"><b><?php echo $mbiemri ?></b></td>
                             <td style="text-align:left;"><b><?php echo $rroga ?>  <strong>EUR</strong></b></td>
                            <td style="text-align:left;"><b><?php echo $aftsia ?></b></td>
							 <td style="text-align:left;"><b><?php	if($statusi == 'on'){$statusi = '<font color="#6CFF00">Aktiv&euml;</font>'; echo $statusi;} else {$statusi = '<font color="red">Joaktiv&euml;</font>'; echo $statusi;} ?></b></td>
                             <td> <button type="submit" onclick="window.location.href='/info/puntori/<?php echo $id ?>'" class="btndefault"><i class="fas fa-cog"></i> Manage </button></td>
                             <td> <button type="submit" onclick="window.location.href='/edito/puntorin/<?php echo $id ?>'" class="btndefaultgreen"><i class="fas fa-edit"></i> Edit </button></td>
							 <td> <button type="submit" onclick="window.location.href='/puna?delete=<?php echo $id ?>'" class="btndefaultred"><i class="fas fa-trash"></i> Delete </button></td>

					<?php }}   ?>


					 

					 
	


				      			  
					 