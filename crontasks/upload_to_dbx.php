<?php
include('../includes/dbconnection.php');
// Replace with your access token
$access_token = 'ACCESS_TOKEN';

// Replace with the file path
$file_path = 'FILE_PATH';

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://content.dropboxapi.com/2/files/upload',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => file_get_contents($file_path),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $access_token,
        'Content-Type: application/octet-stream',
        'Dropbox-API-Arg: {"path":"/backups/' . basename($file_path) . '","mode":"add","autorename":true,"mute":false}'
    ),
));

// Execute cURL request
$response = curl_exec($curl);
$err = curl_error($curl);

// Close cURL session
curl_close($curl);

// Check for errors
if ($err) {
    echo 'cURL Error #:' . $err;
} else {
    $data = json_decode($response, true);
    // The uploaded file's metadata is returned in $data
    var_dump($data);
}

?>
