<?php
   // Edit upload location here
   $destination_path = getcwd()."/../slides/";
   //$destination_path = "/slides".DIRECTORY_SEPARATOR;
   $result = 0;
   
   if (file_exists(getcwd()."/../slides/temporary")) {
       unlink(getcwd()."/../slides/temporary");
   }
   
   $target_path = $destination_path . basename( $_FILES['slideUrl']['name']);

   if(@move_uploaded_file($_FILES['slidesUrl']['tmp_name'],  getcwd()."/../slides/temporary")) {
      $result = 1;
   }
   
    
  
   sleep(1);
?>

<script language="javascript" type="text/javascript">window.top.window.stopSlidesUrlUpload(<?php echo $result; ?>);</script>   
