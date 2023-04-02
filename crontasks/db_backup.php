<?php

// Define database credentials
include('../includes/dbconnection.php');
include('../php_functions/functions.php');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set the backup file name
$backup_file = $database . "_" . date("Y-m-d-H-i-s") . ".sql";

// Get the list of tables in the database
$tables = array();
$result = mysqli_query($connection, "SHOW TABLES");
while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

// Initialize the backup string
$backup = "";

// Loop through each table in the database
foreach ($tables as $table) {
    // Get the structure of the table
    $result = mysqli_query($connection, "SHOW CREATE TABLE $table");
    while ($row = mysqli_fetch_row($result)) {
        $backup .= "\n\n" . $row[1] . ";\n\n";
    }

    // Get the data in the table
    $result = mysqli_query($connection, "SELECT * FROM $table");
    $num_rows = mysqli_num_rows($result);
    $num_fields = mysqli_num_fields($result);
    for ($i = 0; $i < $num_rows; $i++) {
        $row = mysqli_fetch_row($result);
        $backup .= "INSERT INTO $table VALUES(";
        for ($j = 0; $j < $num_fields; $j++) {
            $row[$j] = addslashes($row[$j]);
            $row[$j] = str_replace("\n", "\\n", $row[$j]);
            if (isset($row[$j])) {
                $backup .= '"' . $row[$j] . '"';
            } else {
                $backup .= 'NULL';
            }
            if ($j < ($num_fields - 1)) {
                $backup .= ',';
            }
        }
        $backup .= ");\n";
    }
}

// Write the backup to a file
$handle = fopen($backup_file, "w+");
fwrite($handle, $backup);
fclose($handle);




// Close the database connection
mysqli_close($connection);


// Replace with your access token
$access_token = ACCESS_TOKEN;


//$dir_name = dirname(__FILE__);
//$dir_name = __DIR__;
// Replace with the file path
$file_path = $backup_file;

/*// Initialize cURL
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
        'Dropbox-API-Arg: {"path":"/	
            backups_badili/' . basename($file_path) . '/","mode":"add","autorename":true,"mute":false}'
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
    print $file_path;
    
}*/


///$path = 'test_php_upload.txt';
$fp = fopen($file_path, 'rb');
$size = filesize($file_path);

$cheaders = array('Authorization: Bearer '.$access_token,
                  'Content-Type: application/octet-stream',
                  'Dropbox-API-Arg: {"path":"/backup/'.$file_path.'", "mode":"add"}');

$ch = curl_init('https://content.dropboxapi.com/2/files/upload');
curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
curl_setopt($ch, CURLOPT_PUT, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_INFILE, $fp);
curl_setopt($ch, CURLOPT_INFILESIZE, $size);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

echo $response;
curl_close($ch);
fclose($fp);

?>
