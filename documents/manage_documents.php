<?php 

function upload_document($file) {
    // Get file information
    $filename = $file['name'];
    $path = '/uploads/' . $filename;
    $version = 1;
    
    // Check if the file already exists in the database
    $existing_doc = get_document_by_filename($filename);
    
    if ($existing_doc) {
        // If the file already exists, increment the version number
        $version = $existing_doc['version'] + 1;
        $path = $existing_doc['path'];
    } else {
        // If the file is new, move it to the uploads directory
        move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path);
    }
    
    // Add the document to the database
    $db = get_db();
    $stmt = $db->prepare('INSERT INTO documents (filename, path, version) VALUES (?, ?, ?)');
    $stmt->bind_param('ssi', $filename, $path, $version);
    $stmt->execute();
    $document_id = $stmt->insert_id;
    $stmt->close();
    
    return $document_id;
}

function view_document($document_id)
{
    $document = get_document_by_id($document_id);

    if ($document) {
        // Set the content type
        header('Content-Type: application/pdf');

        // Output the file contents
        readfile($_SERVER['DOCUMENT_ROOT'] . $document['path']);

        //    // Get the metadata for the document
        $metadata = get_metadata_by_document_id($document_id);

        if ($metadata) {
            // Output the metadata
            foreach ($metadata as $meta) {
                echo $meta['metadata_key'] . ': ' . $meta['metadata_value'] . '<br>';
            }
        }
    } else {
        echo 'Document not found';
    }
}
function edit_metadata($document_id, $metadata)
{
    // Delete the existing metadata for the document
    delete_metadata_by_document_id($document_id);

    // Add the new metadata to the database
    $db = get_db();
    $stmt = $db->prepare('INSERT INTO metadata (document_id, metadata_key, metadata_value) VALUES (?, ?, ?)');

    foreach ($metadata as $key => $value) {
        $stmt->bind_param('iss', $document_id, $key, $value);
        $stmt->execute();
    }

    $stmt->close();
}

function create_version($document_id)
{
    $document = get_document_by_id($document_id);
    if ($document) {
        // Copy the file to a new location
        $new_path = '/uploads/' . $document['filename'] . '-v' . ($document['version'] + 1);
        copy($_SERVER['DOCUMENT_ROOT'] . $document['path'], $_SERVER['DOCUMENT_ROOT'] . $new_path);

        // Update the document information in the database
        $db = get_db();
        $stmt = $db->prepare('UPDATE documents SET path = ?, version = ? WHERE id = ?');
        $stmt->bind_param('sii', $new_path, ($document['version'] + 1), $document_id);
        $stmt->execute();
        $stmt->close();

        return true;
    } else {
        return false;
    }
}    
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>

<ul>
    <?php foreach ($documents as $doc): ?>
        <li>
            <a href="view.php?id=<?php echo $doc['id']; ?>"><?php echo $doc['filename']; ?></a>
            <a href="edit_metadata.php?id=<?php echo $doc['id']; ?>">Edit Metadata</a>
        </li>
    <?php endforeach; ?>
</ul>
