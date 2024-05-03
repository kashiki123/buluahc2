<?php
// Include your database configuration file
include_once ('../../../config.php');

// Function to sanitize user input
// Function to sanitize user input
function sanitizeInput($input)
{
    // Remove all HTML tags
    return strip_tags(trim($input));
}


$primary_id = sanitizeInput($_POST['primary_id']);
$method = sanitizeInput($_POST['method']);
$status = sanitizeInput($_POST['status']);
$description = sanitizeInput($_POST['description']);
$diagnosis = sanitizeInput($_POST['diagnosis']);
$medicine = sanitizeInput($_POST['medicine']);

try {
    // Start a transaction
    $conn->begin_transaction();

    $consultationUpdateSql = "UPDATE fp_consultation SET method=?, status=?, description=?, diagnosis=?, medicine=? WHERE id=?";
    $consultationStmt = $conn->prepare($consultationUpdateSql);
    $consultationStmt->bind_param("sssssi", $method, $status, $description, $diagnosis, $medicine, $primary_id);

    // Execute the update statement
    $consultationUpdateSuccess = $consultationStmt->execute();

    if ($consultationUpdateSuccess) {
        // Commit the transaction if the update is successful
        $conn->commit();
        echo 'Success';
    } else {
        // Rollback the transaction if the update fails
        $conn->rollback();
        throw new Exception('Error updating data');
    }

    // Close the prepared statement
    $consultationStmt->close();

    // Close the database connection
    $conn->close();
} catch (Exception $e) {
    // Handle exceptions (e.g., log the error and provide a user-friendly message)
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Error: ' . $e->getMessage();
}
?>