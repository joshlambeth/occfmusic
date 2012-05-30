<?php

require_once('contactInstrumentFunctions.php');
echo json_encode(getInstrumentsFromContact($_POST['contactId']));
?>
