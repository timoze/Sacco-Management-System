<?php
$dirname = Dirname(__DIR__);
$dirpath =  str_replace('badili_group','DB_Backup', $dirname);
// Define database credentials
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../php_functions/email.php');
$mail_configs = mail_configs();

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set the backup file name
//$backup_file = $database . "_" . date("Y-m-d-H-i-s") . ".sql";
$backup_filename = $database . "_" . date("Y-m-d-H-i-s") . ".sql";
$backup_file = $dirpath. "/".$backup_filename;
$zipFilename = $dirpath. "/".$database . "_" . date("Y-m-d-H-i-s") . ".zip";

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


$file = file_get_contents($backup_file);
$compressed = gzcompress($file);

file_put_contents($backup_file . '.gz', $compressed);


// create a new ZipArchive object
$zip = new ZipArchive();

// open the zip file for writing
if ($zip->open($zipFilename, ZipArchive::CREATE) !== TRUE) {
    die ('Error opening zip archive');
}

// add a file to the zip archive
$fileName = basename($backup_file);
$zip->addFile($backup_file, $fileName);

// close the zip archive
$zip->close();

echo 'SQL file compressed successfully!';

// Close the database connection
mysqli_close($connection);

$path_tobackup = $backup_file. '.gz';

$path_to_zip_backup = $zipFilename;

$email_to = array('timothy.arusei@gmail.com');
$mail_subject = "Badili Sacco DB Backup";
$mail_message = "Dear User, <br> See the attached document DB Backup " . date("Y-m-d-H-i-s");
sendBackupEmail($mail_subject, $mail_message, $email_to , $mail_configs, $path_to_zip_backup);

?>
