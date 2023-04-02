<?php

// Include the Africa's Talking API client library
require_once('vendor/autoload.php');
use AfricasTalking\SDK\AfricasTalking;

// Set up Africa's Talking API client
$username = "YOUR_USERNAME";
$apiKey = "YOUR_API_KEY";
$AT = new AfricasTalking($username, $apiKey);
$sms = $AT->sms();


// Define function to send SMS and update database
function send_sms($phone_number, $message) {
    global $sms, $connection;
    try {
        // Send SMS using Africa's Talking API
        $result = $sms->send([
            'to' => [$phone_number],
            'message' => $message
        ]);
        
        // Update message details in database
        $message_id = $result['SMSMessageData']['Recipients'][0]['messageId'];
        $status = $result['SMSMessageData']['Recipients'][0]['status'];
        $timestamp = date('Y-m-d H:i:s');
        $sql = "INSERT INTO message_details (message_id, phone_number, message_text, status, timestamp) 
                VALUES ('$message_id', '$phone_number', '$message', '$status', '$timestamp')";
        if ($connection->query($sql) === TRUE) {
            echo "SMS sent successfully!";
        } else {
            echo "Error updating database: " . $connection->error;
        }
    } catch (Exception $e) {
        echo 'Error sending SMS: ' . $e->getMessage();
    }
}

// Test send_sms function
send_sms("+254712345678", "Hello, World!");

// Schedule script to run every day at 6am using cron job
// Example cron job command: 0 6 * * * /usr/bin/php /path/to/script.php
?>
