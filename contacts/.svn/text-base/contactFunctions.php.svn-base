<?php
require_once("../../occfConnect.php");

function addContact($firstName, $lastName, $primaryPhone, $alternatePhone, $address, $city, $state, $zip, $primaryEmail, $alternateEmail, $availability, $visible) {
    if (strcmp($visible, "true")) {
        $visibility = 1;
    }
    else {
        $visibility = 0;
    }
    $query =  "INSERT INTO contact (contact_first_name, contact_last_name, contact_primary_phone, contact_alternate_phone, contact_address, contact_city, contact_state, contact_zip, contact_primary_email, contact_alternate_email, contact_availability, contact_visible) VALUES ('$firstName', '$lastName', '$primaryPhone', '$alternatePhone', '$address', '$city', '$state', '$zip', '$primaryEmail', '$alternateEmail', '$availability', '$visibility')";
    //die($query);
    $result = mysql_query($query);

    if (!$result) {
		 $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function deleteContact($id) {
    $query = "DELETE FROM contact WHERE contact_key='$id' ";
    $result = mysql_query($query);

    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }
}


function hideContact() {

} 

function editContact($id, $firstName, $lastName, $primaryPhone, $alternatePhone, $address, $city, $state, $zip, $primaryEmail, $alternateEmail, $availability, $visible ) {
    $query ="UPDATE contact SET contact_first_name='$firstName', contact_last_name='$lastName', contact_primary_phone='$primaryPhone', contact_alternate_phone='$alternatePhone', contact_address='$address', contact_city='$city', contact_state='$state', contact_zip = '$zip', contact_primary_email='$primaryEmail', contact_alternate_email='$alternateEmail', contact_availability='$availability', contact_visible='$visible' WHERE contact_key='$id'";

    $result = mysql_query($query);

	if (!$result ) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

}

function getAllContacts() {
	 $query = 'SELECT * FROM contact ORDER BY contact_first_name';

    $result = mysql_query($query);

	if (!$result) {
	    $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }

    while(($resultArray[] = mysql_fetch_assoc($result)) || array_pop($resultArray));
    return $resultArray;

}

function getContactFromId($id) {
    $query = "SELECT * FROM contact WHERE contact_key = '" . $id .  "'";
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