<?php
   // Edit upload location here
   $destination_path = getcwd()."/../leadsheets/";
   //$destination_path = "/leadsheets".DIRECTORY_SEPARATOR;
   $result = 0;
   
   if (file_exists(getcwd()."/../leadsheets/temporary")) {
       unlink(getcwd()."/../leadsheets/temporary");
   }
   
   $target_path = $destination_path . basename( $_FILES['url']['name']);

   if(@move_uploaded_file($_FILES['url']['tmp_name'],  getcwd()."/../leadsheets/temporary")) {
      $result = 1;
   }
   
    
  
   sleep(1);
?>

<script language="javascript" type="text/javascript">window.top.window.stopUrlUpload(<?php echo $result; ?>);</script>   

