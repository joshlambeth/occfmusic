<?php

require_once('contactInstrumentFunctions.php');
addContactInstrumentAssociation($_POST['contactId'], $_POST['instrumentId']);
echo complete;


?>
