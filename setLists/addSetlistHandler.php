<?php
require_once('setlistFunctions.php');
addSetlist($_POST['setlistName'], $_POST['setlistCreator']);
echo 'complete';

?>