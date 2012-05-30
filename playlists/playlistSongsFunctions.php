<?php
require_once("../../occfConnect.php");

function addPlaylistSongsAssociation($playlistId, $songsId) {
    $query="INSERT INTO playlist_songs_assoc (playlist_key, songs_key) VALUES ('$playlistId', '$songsId')";
    $result = mysql_query($query);

    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

}

function getSongsFromPlaylist($playlistId) {
    
    $query='select songs.* from songs where songs.songs_key = any (select playlist_songs_assoc.songs_key from playlist_songs_assoc where playlist_songs_assoc.playlist_key="' . $playlistId . '")'; 

    $result = mysql_query($query);

    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
    while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
    return $resultArray;
}



function deleteSongsFromPlaylist($playlistId) {
    $query = "DELETE FROM playlist_songs_assoc WHERE playlist_key='" . $playlistId . "'";
    
    $result = mysql_query($query);
    
    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
    
}



?>