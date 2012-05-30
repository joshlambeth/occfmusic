<?php

require_once('setlistSongsFunctions.php');
deleteSongsFromSetlist($_POST['setlistId']);
echo "complete";

?>
