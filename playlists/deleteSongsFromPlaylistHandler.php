<?php

require_once('playlistSongsFunctions.php');
deleteSongsFromPlaylist($_POST['playlistId']);
echo "complete";

?>
