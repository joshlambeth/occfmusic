<?php
   // Edit upload location here
   $destination_path = getcwd()."/../mp3s/";
   //$destination_path = "/mp3s".DIRECTORY_SEPARATOR;
   $result = 0;
   
   if (file_exists(getcwd()."/../mp3s/temporary")) {
       unlink(getcwd()."/../mp3s/temporary");
   }
   
   $target_path = $destination_path . basename( $_FILES['mp3Url']['name']);

   if(@move_uploaded_file($_FILES['mp3Url']['tmp_name'],  getcwd()."/../mp3s/temporary")) {
      $result = 1;
   }
   
    
  
   sleep(1);
?>

<script language="javascript" type="text/javascript">window.top.window.stopMp3UrlUpload(<?php echo $result; ?>);</script>   
