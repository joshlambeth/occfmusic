<?php

require_once('setlistSongsFunctions.php');
addSetlistSongsAssociation($_POST['setlistId'], $_POST['songsId']);
echo complete;


?>
