<?php
require_once("../../occfConnect.php");

function addInstrument($instrumentName) {
    $query = "INSERT INTO instrument (instrument_name) VALUES ('$instrumentName')";

    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function deleteInstrument($id) {
    $query = "DELETE FROM instrument WHERE instrument_key='$id' ";
    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function hideInstrument() {

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

function getAllInstruments() {
    $query = 'SELECT * FROM instrument ORDER BY instrument_name';

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
