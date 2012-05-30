<?php
require_once("../../occfConnect.php");

function addSetlist($setlistName, $setlistCreator) {
    $query = "INSERT INTO set_list (set_list_name, set_list_creator) VALUES ('$setlistName', '$setlistCreator')";

    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function deleteSetlist($id) {
    $query = "DELETE FROM set_list WHERE set_list_key='$id' ";
    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function hideSetlist() {

} 

function editInstrument($id, $instrumentName ) {
    $query = "UPDATE instrument SET instrument_name='$instrumentName' WHERE instrument_key='$id'";

    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

}

function getAllSetlists() {
    $query = 'SELECT * FROM set_list ORDER BY set_list_name';

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
