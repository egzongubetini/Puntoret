<?php

include 'db.php';
include 'templates/default/header.php';





if(isset($_GET['edito'])) {
    


    $ids =  mysqli_real_escape_string($connection, $_GET['edito']);
    
    
    
        
    $opas = "SELECT * FROM puntor WHERE id='$ids'";
    $tom = mysqli_query($connection, $opas);
    
    
    $test = mysqli_num_rows($tom);
    
    
    if($test == 1) {
    
    
    
    $row = mysqli_Fetch_array($tom);
    
        $id = $row['id'];
        $emri = $row['emri'];
        $mbiemri = $row['mbiemri'];
        $rroga = $row['rroga'];
        $aftsia = $row['aftsia'];
        $statusi = $row['statusi'];
        if($statusi == "on"){

          $statu = 'checked';
        
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
    <form method="post" action="/puna">
    <input type="hidden" name="ida" value="<?php echo $id ?>" />
    <img src="templates/default/images/spacer.gif" width="1" height="6" alt="" /><br /><fieldset><table width="100%" border="0" cellpadding="2" cellspacing="2"><tr>
                                     <tr>
                                      <td class="fieldname" style="width:140px;">Emri</td>
                                             <td class="fieldarea"><input type="text" name="emri" class="text" size="10" value="<?php echo $emri ?>" required/>
                                        </td>
                                    </tr><tr>
                                      <td class="fieldname" style="width:140px;">Mbiemri</td>
                                      <td class="fieldarea"><input type="text" name="mbiemri" class="text" size="15" value="<?php echo $mbiemri ?>" required/>
                                        <font color="#666666" size="-2"></font></td>
                                    </tr><tr>
                                      <td class="fieldname" style="width:140px;">Rroga</td>
                                      <td class="fieldarea"><input type="number" name="rroga" class="text"  size="15" value="<?php echo $rroga ?>" required/>
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
                                      
                                      
                                     
                                      <option value="<?php echo $profesioni ?>" <?php if($profesioni == $aftsia){echo 'selected="selected"';}?>  ><?php echo $profesioni ?></option>
                                       <?php } ?>
                                      </select></td>
                                        </td>
                                    </tr>
                                    <td class="fieldname" style="width:140px;">Statusi</td>
                                    <td>	<input type="hidden" name="statusi" value="off"/>
                                    
        <input type="checkbox" name="statusi" id="statusi" <?php if(isset($statu)) {echo $statu;}  ?> value="on">
        <label for="statusi" class="container"> Statusi i Puntorit
        <span class="checkmark"></span>
        </label></td>
    
                                    </table></fieldset><fieldset><table width="100%" border="0" cellpadding="2" cellspacing="2"><tr>
    
                        <div align="center"><input type="submit" name="shipka" value="Edito Puntorin" class="button green" />&nbsp;<input type="button" value="Kthehu mbrapa" onclick="window.location='/puntoret'" class="button red" /></div></form>    </td>
      </tr>
    </table>
    
    <?php } 
    
    
    else {
    
        $_SESSION['msg1'] = "ID nuk u gjend!";
  $_SESSION['msg2'] = "Na vjen keq por kjo id nuk egziston!!.";
	header('Location: /puntoret');
      exit();

    }
    
    
    
    
    
    }


    ?>