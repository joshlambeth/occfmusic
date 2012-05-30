<?php
require_once("../../occfConnect.php");

function addSong($title, $writer, $performer, $publisher, $copyrightDate, $key, $submittedBy, $notes, $url, $mp3Url, $slidesUrl, $date, $visible) {
    if (strcmp($visible, "true")) {
        $visibility = 1;
    }
    else {
        $visibility = 0;
    }
    $query =  "INSERT INTO songs (songs_title, songs_writer, songs_performer, songs_publisher, songs_copyright_date, songs_key_of, songs_submitted_by, songs_notes, songs_url, songs_mp3_url, songs_slides_url, songs_date, songs_visible) VALUES ('$title', '$writer', '$performer', '$publisher', '$copyrightDate', '$key', '$submittedBy', '$notes', '$url', '$mp3Url', '$slidesUrl', '$date', '$visibility')";
    //die($query);
    $result = mysql_query($query);

    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function deleteSong($id) {
    $query = "DELETE FROM songs WHERE songs_key='$id' ";
    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function hideContact() {

} 

function editSong($id, $title, $performer, $writer, $publisher, $copyrightDate, $key, $submittedBy, $notes, $url, $mp3Url, $slidesUrl, $date, $visible ) {
    $query ="UPDATE songs SET songs_title='$title', songs_writer='$writer', songs_performer='$performer', songs_publisher='$publisher', songs_copyright_date='$copyrightDate', songs_key_of='$key', songs_submitted_by='$submittedBy', songs_notes='$notes', songs_url = '$url', songs_mp3_url='$mp3Url', songs_slides_url='$slidesUrl', songs_date='$date', songs_visible='$visible' WHERE songs_key='$id'";

    $result = mysql_query($query);

	if (!$result ) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

}

function getAllSongs() {
	 $query = 'SELECT * FROM songs ORDER BY songs_title';

    $result = mysql_query($query);

	if (!$result) {
	    $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

    while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
    return $resultArray;

}

function getSongFromId($id) {
    $query = "SELECT * FROM songs WHERE songs_key = '" . $id .  "'";
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