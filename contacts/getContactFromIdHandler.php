<?php

require_once('contactFunctions.php');
//echo $_POST['id'];
echo json_encode(getContactFromId($_POST['id']));

?>
