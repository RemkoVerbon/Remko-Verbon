<?php

// configure
$from = 'Remko Verbon <info@remkoverbon.nl>'; 
$sendTo = 'Remko Verbon <info@remkoverbon.nl>';
$subject = 'Nieuw bericht via Remko Verbon';
$fields = array('name' => 'Naam', 'surname' => 'Achternaam', 'phone' => 'Telefoon', 'email' => 'Email', 'message' => 'Bericht'); // array variable name => Text to appear in email
$okMessage = 'Het contactformulier is succesvol verzonden!';
$errorMessage = 'Er is iets fout gegaan, probeer het nog een keer.';

// let's do the sending

try
{
    $emailText = "Nieuw Bericht via Remko Verbon:\n--------------------------------------------------\n";

    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    mail($sendTo, $subject, $emailText, "From: " . $from);

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    
    header('Content-Type: application/json');
    
    echo $encoded;
}
else {
    echo $responseArray['message'];
}
