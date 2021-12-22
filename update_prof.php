<form action="" method="post">              
		&nbsp;&nbsp;&nbsp;
            <label for="prof_title"><strong>Edito Profesionin</strong></label>
<?php 
             if(isset($_GET['edit'])) {
             
             $ida_edit = mysqli_real_escape_string($connection,$_GET['edit']);
             
             
            $query = "SELECT * FROM profesionet WHERE prof_id='$ida_edit'"; 
            $boom = mysqli_query($connection,$query);
            $numri = mysqli_num_rows($boom);

            if($numri !== 1){

             $_SESSION['msg1'] = "Kjo ID nuk ekizston na vjen keq!";
             $_SESSION['msg2'] = "Ida qe keni shkruar nuk ekziston!!!!";

	header('Location: /profesioni');
    exit;

             
}

            while($rows = mysqli_fetch_assoc($boom)) {
                
                           $prof_title = $rows['prof_title'];
                          
             ?>            


            
            <input class="text" style="width: 30%;" value="<?php if(isset($prof_title)){echo $prof_title; }?>" type="text" placeholder="Profesioni" name="prof_edit">
             <?php }} ?>
             
             <?php 
             
             if(isset($_POST['boom'])){
             
             $prof_title = mysqli_real_escape_string($connection,$_POST['prof_edit']);
             
             
             $query = "UPDATE profesionet SET prof_title='$prof_title' WHERE prof_id='$ida_edit'";
             $update = mysqli_query($connection,$query);
             if(!$update){
                 
                 die("Mysql Error" . mysqli_error($connection));
                 
             }

                $_SESSION['msg1'] = "Profesioni eshte edituar me sukses!";
  $_SESSION['msg2'] = "The profesion has been succesfully editu!!.";

	header('Location: /profesioni');
exit;


             }
             
             
             
             ?>
             
                         &nbsp;&nbsp;&nbsp;
            <button type="submit" name="boom" class="btndefaultred"><i class="fas fa-edit"></i>Edito Profesionin</button>
       
   
   
    
    
</form>