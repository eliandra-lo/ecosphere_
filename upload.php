<?php
// Check if a file was uploaded
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Set the target directory for the uploaded file
    $targetDir = 'uploads/';  // Ensure this directory exists and is writable
    $targetFile = $targetDir . basename($file['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Allow certain file formats (adjust as necessary)
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Check if the file type is allowed
    if (in_array($fileType, $allowedTypes)) {
        // Try to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            // Get the full URL to the file
            $fileUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/Ecosphere/' . $targetFile;
            // Return the URL of the uploaded file
            echo json_encode(['link' => $fileUrl]);
        } else {
            echo json_encode(['error' => 'Error uploading the file.']);
        }
    } else {
        echo json_encode(['error' => 'Invalid file type.']);
    }
} else {
    echo json_encode(['error' => 'No file uploaded.']);
}
?>
