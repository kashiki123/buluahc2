<?php
// Include your database configuration file
include_once ('../../../config.php');

try {
    // Sanitize user input from the POST request
    $patientId = htmlspecialchars($_POST['patient_id']);
    $step = htmlspecialchars($_POST['step']);
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $birthdate = htmlspecialchars($_POST['birthdate']);
    $address = htmlspecialchars($_POST['address']);
    $middleName = htmlspecialchars($_POST['middle_name']);
    $Suffix = htmlspecialchars($_POST['suffix']);
    $Gender = htmlspecialchars($_POST['gender']);
    $Contactno = htmlspecialchars($_POST['contact_no']);
    $Civilstatus = htmlspecialchars($_POST['civil_status']);
    $Serialno = htmlspecialchars($_POST['serial_no']);
    $Religion = htmlspecialchars($_POST['religion']);

    // Calculate age based on birthdate
    $dob = new DateTime($birthdate);
    $now = new DateTime();
    $age = $dob->diff($now)->y;

    // Check if today is the user's birthday
    $today = new DateTime();
    $userBirthday = new DateTime($birthdate);
    $userBirthday->setTime(0, 0); // Set time to midnight for comparison
    if ($today == $userBirthday) {
        // It's the user's birthday, update the age
        $age = $age + 1;
    }

    // Update patient data in the database
    $sql = "UPDATE patients SET step=?, first_name=?, last_name=?, birthdate=?, address=?, middle_name=?, suffix=?, gender=?, contact_no=?, civil_status=?, age=?, religion=?  WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssi", $step, $firstName, $lastName, $birthdate, $address, $middleName, $Suffix, $Gender, $Contactno, $Civilstatus, $age, $Religion, $patientId);

    if ($stmt->execute()) {
        // Successful update
        echo 'Success';
    } else {
        throw new Exception('Error updating patient: ' . $stmt->error);
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    // Handle exceptions (e.g., log the error and provide a user-friendly message)
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Error: ' . $e->getMessage();
}
?>