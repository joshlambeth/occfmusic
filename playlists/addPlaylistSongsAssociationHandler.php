<?php

require_once('playlistSongsFunctions.php');
addPlaylistSongsAssociation($_POST['playlistId'], $_POST['songsId']);
echo complete;


?>
