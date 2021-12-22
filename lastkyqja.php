<?php
include 'db.php';
include 'templates/default/header.php';
session_start();


$klient = $_SESSION['id'];

$rand = 0;



$bini = "SELECT * FROM hyrjet ORDER BY lastid DESC LIMIT 20";
$opa = mysqli_query($connection,$bini);







?>

<div class="alert alert-danger"><i class="fa fa-times-circle fa-1x"></i> Ju lutem jepini nj&euml; informacion!</div>
<div id="container">
  <div id="page">
  <div id="title">
    <h1 style="font-family:'Rubik',sans-serif;border-bottom:solid 1px #e6e6e6;padding: 3px;">Lista e Kyqjeve te Fundit</h1><br>
    <div class="opa" >
			<table width="100%">
            
            
			<tr>

            <table width="98%" cellspacing="0" cellpadding="5" class="data_list">
             <thead>
            <tr>
                <th width="100px" style="font-size:13px;">Id</th>
                 <th style="text-align:left;">Emri dhe Mbiemri</th>
                 <th style="text-align:left;">IP adress</th>
                 <th style="text-align:left;">Koha</th>
                 <th style="text-align:left;">Mesazhi</th>
                 
                 
                 
			</tr></thead>
            
            
            <tbody>


            <?php
            while($shipka = mysqli_fetch_assoc($opa)) {
      
          $rand++;
          $ida = $shipka['lastid'];
          $emri = $shipka['emri'];
          $koha = $shipka['koha'];
          $ip = $shipka['ip'];

           ?>

            

            <tr> 
                             <td style="text-align:center;"><b><?php echo $rand ?></b></td>
							 <td style="text-align:left;"><b><?php echo $emri ?></b></td>
                             <td style="text-align:left;"><b><?php echo $ip ?></b></td>
                             <td style="text-align:left;"><b><?php echo $koha ?></b></td>
                             <td style="text-align:left;"><b>Login</b></td>
                           
                             
                            
                        </tr>

                    <?php }
                    ?>