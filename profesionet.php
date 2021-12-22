<?php
include 'db.php';
include 'templates/default/header.php';

?>


<div class="alert alert-danger"><i class="fa fa-times-circle fa-1x"></i> Ju lutem jepini nj&euml; informacion!</div>
<div id="container">
  <div id="page">
  <div id="title">
    <h1 style="font-family:'Rubik',sans-serif;border-bottom:solid 1px #e6e6e6;padding: 3px;">Lista e Profesioneve</h1><br>
    <div class="opa" >
			<table width="100%">
            
            
			<tr>
<?php 

if(isset($_SESSION['msg1']) && isset($_SESSION['msg1']) !="")
{ 
echo '<div id="infobox"><strong>' . $_SESSION['msg1'] . '</strong><br />' . $_SESSION['msg2'] . '</div>';
unset($_SESSION['msg1']); 
unset($_SESSION['msg2']); 
} 



?>


                <div class="wtfuck" >
            <?php
                  if(isset($_POST['submit'])) {
                  
                  $prof_title = mysqli_real_escape_string($connection,$_POST['prof_title']);
                  
                  if($prof_title == "" || empty($prof_title)) {
                      
                    $_SESSION['msg1'] = "Kolona duhet te mbushet!";
  $_SESSION['msg2'] = "Ju lutem!!.";

	header('Location: /profesioni');
exit;

                  } else {
                  
                  $query = "INSERT INTO profesionet(prof_title) VALUE('$prof_title')";
                  $opa = mysqli_query($connection,$query);
                  
                  
                   if(!$opa) {
                       
                       
                       die("Mysql Error" . mysqli_error($connection));
                   }

   $_SESSION['msg1'] = "Profesioni eshte shtuar me sukses!";
  $_SESSION['msg2'] = "The profesion has been succesfully add!!.";

	header('Location: /profesioni');
exit;

                  
                  }
                  }
                  ?>
                  
				<form action="" method="post">              
		&nbsp;&nbsp;&nbsp;
            <label for="prof_title"><strong>Shto Profesionin</strong></label> 
            <input class="text" style="width: 30%;" type="text" placeholder="Profesioni" name="prof_title">
            &nbsp;&nbsp;&nbsp;
            <button type="submit" name="submit" class="btndefaultred"><i class="fas fa-plus"></i>Shto Profesionin</button>
       
   
   
    
    
</form>
</br> </br>
				
            <?php 
            
             if(isset($_GET['edit'])) {
             
             $ida_edit = mysqli_real_escape_string($connection,$_GET['edit']);
                             
             include 'update_prof.php';
             }
             ?>
              </div>
              <br>
              <br>

<table width="98%" cellspacing="0" cellpadding="5" class="data_list">
             <thead>
            <tr>
                <th width="35px" style="font-size:13px;">Id</th>
                 <th style="text-align:left;">Emri i Profesioneve</th>
                  <th style="text-align:left;"></th>
                  <th style="text-align:left;"></th>
                 
                 
                 
			</tr></thead>
            
            
            <tbody>
            
            
            <?php 
            
            $query = "SELECT * FROM profesionet";
            $profes = mysqli_query($connection,$query);
            
            while($rows = mysqli_fetch_assoc($profes)) {
            
                $prof_id = $rows['prof_id'];
                $prof_title = $rows['prof_title'];

            
               ?>
               
            
            
            <tr> 
                             <td style="text-align:center;"><b><?php echo $prof_id ?></b></td>
							 <td style="text-align:left;"><b><?php echo $prof_title ?></b></td>
<td><a href='/profesioni/edit/<?php echo $prof_id ?>'>Edit</a></td>
                             <td><a href='/profesioni/fshije/<?php echo $prof_id ?>'>Delete</a></td>
                             
                            
                        </tr>
                        
            <?php  } ?>   

             <?php 
             if(isset($_GET['delete'])) {
             
             $ida = mysqli_real_escape_string($connection,$_GET['delete']);
             
             
            $query = "DELETE FROM profesionet WHERE prof_id='$ida'"; 
            $deletes = mysqli_query($connection,$query);
            header('Location: /profesioni', true);
            
            
             }
             ?>            
                        
            </tbody>
            
            </div>
            
            
            </div>

 
 
         </tr>   
		</table>
         </div>
          </div>
           </div>
           
           
