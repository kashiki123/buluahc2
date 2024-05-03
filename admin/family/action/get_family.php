<?php
// Include your database configuration file
include_once ('../../../config.php');

$sql = "SELECT *,fp_information.id as id,CONCAT(patients.last_name,' ',patients.first_name) as full_name,nurses.first_name as first_name2,nurses.last_name as last_name2, fp_obstetrical_history.fp_information_id as fp_information_id
FROM fp_information
JOIN patients ON fp_information.patient_id = patients.id
JOIN fp_consultation ON fp_consultation.fp_information_id = fp_information.id
JOIN fp_obstetrical_history ON fp_information.id =  fp_obstetrical_history.fp_information_id
JOIN nurses ON fp_information.nurse_id = nurses.id WHERE fp_information.is_deleted = 0";


$result = $conn->query($sql);

$myData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $myData[] = $row;
    }
}

// Close the database connection
$conn->close();


echo json_encode($myData);
?>