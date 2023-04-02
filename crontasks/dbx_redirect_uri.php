<?php
include('../includes/dbconnection.php');
include('../php_functions/functions.php');

// Replace with your client ID
$client_id = CLIENT_ID;

// Replace with your client secret
$client_secret = CLIENT_SECRET;

// Replace with your redirect URI
$redirect_uri = 'http://localhost/badili_group/crontasks/dbx_redirect_uri.php';

// Replace with the authorization code that was sent to your redirect URI
$authorization_code = $_GET['code'];

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.provider.com/oauth/token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => http_build_query(array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'code' => $authorization_code,
        'grant_type' => 'authorization_code'
    )),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
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
    // The access token is returned in $data['access_token']
    var_dump($data);
    $access_tokn = $data['access_token'];
    mysqli_query($connection, "UPDATE company_details SET dbx_access_token='$access_tokn' ");
}

?>
