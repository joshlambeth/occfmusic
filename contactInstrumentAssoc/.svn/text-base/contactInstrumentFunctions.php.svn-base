<?php
require_once("../../occfConnect.php");

function addContactInstrumentAssociation($contactId, $instrumentId) {
    $query="INSERT INTO contact_instrument_assoc (contact_key, instrument_key) VALUES ('$contactId', '$instrumentId')";
    $result = mysql_query($query);

    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

}

function getInstrumentsFromContact($contactId) {
    //$query="SELECT instrument.* FROM contact, instrument, contact_instrument_assoc WHERE contact_instrument_assoc.contact_key='$contactId' AND contact_instrument_assoc.instrument_key=instrument.instrument_key ORDER BY instrument.instrument_name";
    $query='select instrument.* from instrument where instrument.instrument_key = any (select contact_instrument_assoc.instrument_key from contact_instrument_assoc where contact_instrument_assoc.contact_key="' . $contactId . '")'; 

    $result = mysql_query($query);

    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
    while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
    return $resultArray;
}



function getContactsFromInstrument($instrumentId) {
    $query="SELECT contact FROM contact, instrument, contact_instrument_assoc WHERE contact_instrument_assoc.instrument_key='$instrumentId' AND contact_instrument_assoc.contact_key=contact.contact_key ORDER BY contact.contact_first_name";
    
    $result = mysql_query($query);

    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
    while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
    return $resultArray;

}

function deleteInstrumentsFromContact($contactId) {
    $query = "DELETE FROM contact_instrument_assoc WHERE contact_key='" . $contactId . "'";
    
    $result = mysql_query($query);
    
    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
    
}

function deleteContactsFromInstrument($instrumentId) {

}

?>