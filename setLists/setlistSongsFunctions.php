<?php
require_once("../../occfConnect.php");

function addSetlistSongsAssociation($setlistId, $songsId) {
    $query="INSERT INTO set_list_songs_assoc (set_list_key, songs_key) VALUES ('$setlistId', '$songsId')";
    $result = mysql_query($query);

    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

}

function getSongsFromSetlist($setlistId) {
    
    $query='select songs.* from songs where songs.songs_key = any (select set_list_songs_assoc.songs_key from set_list_songs_assoc where set_list_songs_assoc.set_list_key="' . $setlistId . '")'; 

    $result = mysql_query($query);

    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
    while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
    return $resultArray;
}



function deleteSongsFromSetlist($setlistId) {
    $query = "DELETE FROM set_list_songs_assoc WHERE set_list_key='" . $setlistId . "'";
    
    $result = mysql_query($query);
    
    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
    
}



?>