<?php
require_once("../../occfConnect.php");

function addPlaylist($playlistTitle, $playlistDescription, $playlistCreator) {
    $query = "INSERT INTO playlist (playlist_title, playlist_description, playlist_creator) VALUES ('$playlistTitle', '$playlistDescription', '$playlistCreator')";

    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function deletePlaylist($id) {
    $query = "DELETE FROM playlist WHERE playlist_key='$id' ";
    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function hidePlaylist() {

} 

function editPlaylist($id, $playlistTitle, $playlistDescription, $playlistCreator  ) {
    $query = "UPDATE playlist SET playlist_title='$playlistTitle', playlist_description='$playlistDescription, playlist_creator=$playlistCreator WHERE playlist_key='$id'";

    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

}

function getAllPlaylists() {
    $query = 'SELECT * FROM playlist ORDER BY playlist_title';

    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

    while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
    return $resultArray;

}
?>
