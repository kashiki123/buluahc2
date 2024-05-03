<?php
// Include your database configuration file
include_once ('../../../config.php');

// Set appropriate response headers
header("Content-Security-Policy: default-src 'self';"); // Set Content Security Policy header to restrict resource loading
header('Content-Type: text/plain'); // Set the content type to plain text
header('X-Content-Type-Options: nosniff'); // Prevent browsers from interpreting files as a different MIME type
header('X-Frame-Options: DENY'); // Prevent clickjacking attacks
header('Referrer-Policy: strict-origin-when-cross-origin'); // Control referrer information sent to other sites
header('X-XSS-Protection: 1; mode=block'); // Enable XSS (Cross-Site Scripting) protection

// Function to sanitize user input
function sanitizeInput($input)
{
    // Remove all HTML tags using preg_replace
    $input = preg_replace("/<[^>]*>/", "", trim($input));
    // Use regular expression to remove potentially harmful characters
    $input = preg_replace("/[^a-zA-Z0-9\s]/", "", $input);
    // Remove SQL injection characters
    $input = preg_replace("/[;#\*--]/", "", $input);
    // Remove Javascript injection characters
    $input = preg_replace("/[<>\"\']/", "", $input);
    // Remove Shell injection characters
    $input = preg_replace("/[|&\$\>\<'`\"]/", "", $input);
    // Remove URL injection characters
    $input = preg_replace("/[&\?=]/", "", $input);
    // Remove File Path injection characters
    $input = preg_replace("/[\/\\\\\.\.]/", "", $input);
    // Remove control characters and whitespace
    $input = preg_replace("/[\x00-\x1F\s]+/", "", $input);
    // Remove script and content characters
    $input = preg_replace("/<script[^>]*>(.*?)<\/script>/is", "", $input);
    return $input;
}

$primary_id = sanitizeInput($_POST['primary_id']);

// Variables for updating fp_information table
$status = sanitizeInput($_POST['status']);
$no_of_children = sanitizeInput($_POST['no_of_children']);
$income = sanitizeInput($_POST['income']);
$plan_to_have_more_children = sanitizeInput($_POST['plan_to_have_more_children']);
$client_type = sanitizeInput($_POST['client_type']);
$reason_for_fp = sanitizeInput($_POST['reason_for_fp']);

// Variables for updating fp_medical_history table
$severe_headaches = sanitizeInput($_POST['severe_headaches']);
$history_stroke_heart_attack_hypertension = sanitizeInput($_POST['history_stroke_heart_attack_hypertension']);
$hematoma_bruising_gum_bleeding = sanitizeInput($_POST['hematoma_bruising_gum_bleeding']);
$breast_cancer_breast_mass = sanitizeInput($_POST['breast_cancer_breast_mass']);
$severe_chest_pain = sanitizeInput($_POST['severe_chest_pain']);
$cough_more_than_14_days = sanitizeInput($_POST['cough_more_than_14_days']);
$vaginal_bleeding = sanitizeInput($_POST['vaginal_bleeding']);
$vaginal_discharge = sanitizeInput($_POST['vaginal_discharge']);
$phenobarbital_rifampicin = sanitizeInput($_POST['phenobarbital_rifampicin']);
$smoker = sanitizeInput($_POST['smoker']);
$jaundice = sanitizeInput($_POST['jaundice']);
$with_disability = sanitizeInput($_POST['with_disability']);

// Variables for updating fp_obstetrical_history table
$no_of_pregnancies = sanitizeInput($_POST['no_of_pregnancies']);
$date_of_last_delivery = sanitizeInput($_POST['date_of_last_delivery']);
$last_period = sanitizeInput($_POST['last_period']);
$type_of_last_delivery = sanitizeInput($_POST['type_of_last_delivery']);
$mens_type = sanitizeInput($_POST['mens_type']);

// // Variables for updating fp_risk_for_sexuality table
// $abnormal_discharge = sanitizeInput($_POST['abnormal_discharge']);
// $genital_sores_ulcers = sanitizeInput($_POST['genital_sores_ulcers']);
// $genital_pain_burning_sensation = sanitizeInput($_POST['genital_pain_burning_sensation']);
// $treatment_for_sti = sanitizeInput($_POST['treatment_for_sti']);
// $hiv_aids_pid = sanitizeInput($_POST['hiv_aids_pid']);

// // Variables for updating fp_risk_for_violence_against_women table
// $unpleasant_relationship = sanitizeInput($_POST['unpleasant_relationship']);
// $partner_does_not_approve = sanitizeInput($_POST['partner_does_not_approve']);
// $domestic_violence = sanitizeInput($_POST['domestic_violence']);

// Variables for updating fp_physical_examination table
$weight = sanitizeInput($_POST['weight']);
$bp = sanitizeInput($_POST['bp']);
$height = sanitizeInput($_POST['height']);
$pulse = sanitizeInput($_POST['pulse']);
$skin = sanitizeInput($_POST['skin']);
$extremities = sanitizeInput($_POST['extremities']);
$conjunctiva = sanitizeInput($_POST['conjunctiva']);
$neck = sanitizeInput($_POST['neck']);
$breast = sanitizeInput($_POST['breast']);
$abdomen = sanitizeInput($_POST['abdomen']);

try {
    // Start a transaction
    $conn->begin_transaction();

    // Update query for fp_information table
    $updateInfoSql = "UPDATE fp_information SET no_of_children=?, income=?, plan_to_have_more_children=?, client_type=?, reason_for_fp=? WHERE id=?";
    $updateInfoStmt = $conn->prepare($updateInfoSql);
    $updateInfoStmt->bind_param("sssssi", $no_of_children, $income, $plan_to_have_more_children, $client_type, $reason_for_fp, $primary_id);

    // Update query for fp_medical_history table
    $updateHistorySql = "UPDATE fp_medical_history SET severe_headaches=?, history_stroke_heart_attack_hypertension=?, hematoma_bruising_gum_bleeding=?, breast_cancer_breast_mass=?, severe_chest_pain=?, cough_more_than_14_days=?, vaginal_bleeding=?, vaginal_discharge=?, phenobarbital_rifampicin=?, smoker=?, with_disability=?, jaundice=? WHERE fp_information_id=?";
    $updateHistoryStmt = $conn->prepare($updateHistorySql);
    $updateHistoryStmt->bind_param("ssssssssssssi", $severe_headaches, $history_stroke_heart_attack_hypertension, $hematoma_bruising_gum_bleeding, $breast_cancer_breast_mass, $severe_chest_pain, $cough_more_than_14_days, $vaginal_bleeding, $vaginal_discharge, $phenobarbital_rifampicin, $smoker, $with_disability, $jaundice, $primary_id);

    // Update Query For fp_consultation
    $updateConsultSql = "UPDATE fp_consultation SET  status=? WHERE fp_information_id=?";
    $updateConsultStmt = $conn->prepare($updateConsultSql);
    $updateConsultStmt->bind_param("si", $status, $primary_id);

    // Update query for fp_obstetrical_history table
    $updateObstetricalSql = "UPDATE fp_obstetrical_history SET no_of_pregnancies=?, date_of_last_delivery=?, last_period=?, type_of_last_delivery=?, mens_type=? WHERE fp_information_id=?";
    $updateObstetricalStmt = $conn->prepare($updateObstetricalSql);
    $updateObstetricalStmt->bind_param("sssssi", $no_of_pregnancies, $date_of_last_delivery, $last_period, $type_of_last_delivery, $mens_type, $primary_id);

    // Update query for fp_risk_for_sexuality table
    // $updateRiskSql = "UPDATE fp_risk_for_sexuality SET abnormal_discharge=?, genital_sores_ulcers=?, genital_pain_burning_sensation=?, treatment_for_sti=?, hiv_aids_pid=? WHERE id=?";
    // $updateRiskStmt = $conn->prepare($updateRiskSql);
    // $updateRiskStmt->bind_param("sssssi", $abnormal_discharge, $genital_sores_ulcers, $genital_pain_burning_sensation, $treatment_for_sti, $hiv_aids_pid, $primary_id);

    // // Update query for fp_risk_for_violence_against_women table
    // $updateViolenceSql = "UPDATE fp_risk_for_violence_against_women SET unpleasant_relationship=?, partner_does_not_approve=?, domestic_violence=? WHERE id=?";
    // $updateViolenceStmt = $conn->prepare($updateViolenceSql);
    // $updateViolenceStmt->bind_param("sssii", $unpleasant_relationship, $partner_does_not_approve, $domestic_violence, $primary_id);

    // Update query for fp_physical_examination table
    $updateExaminationSql = "UPDATE fp_physical_examination SET weight=?, bp=?, height=?, pulse=?, skin=?, extremities=?, conjunctiva=?, neck=?, breast=?, abdomen=? WHERE fp_information_id=?";
    $updateExaminationStmt = $conn->prepare($updateExaminationSql);
    $updateExaminationStmt->bind_param("ssssssssssi", $weight, $bp, $height, $pulse, $skin, $extremities, $conjunctiva, $neck, $breast, $abdomen, $primary_id);

    // Execute the update statements for all six tables
    $updateInfoSuccess = $updateInfoStmt->execute();
    $updateHistorySuccess = $updateHistoryStmt->execute();
    $updateConsultSuccess = $updateConsultStmt->execute();
    $updateExaminationSuccess = $updateExaminationStmt->execute();
    $updateObstetricalSuccess = $updateObstetricalStmt->execute();
    // $updateRiskSuccess = $updateRiskStmt->execute();
    // $updateViolenceSuccess = $updateViolenceStmt->execute();

    if ($updateInfoSuccess && $updateHistorySuccess && $updateConsultSuccess && $updateObstetricalSuccess && $updateExaminationSuccess) {
        // Commit the transaction if all updates are successful
        $conn->commit();
        echo 'Success';
    } else {
        // Rollback the transaction if any update fails
        $conn->rollback();
        throw new Exception('Error updating data');
    }

    // Close the prepared statements
    $updateInfoStmt->close();
    $updateHistoryStmt->close();
    $updateConsultStmt->close();
    $updateObstetricalStmt->close();
    // $updateRiskStmt->close();
    // $updateViolenceStmt->close();
    $updateExaminationStmt->close();

    // Close the database connection
    $conn->close();
} catch (Exception $e) {
    // Handle exceptions (e.g., log the error and provide a user-friendly message)
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Error: ' . $e->getMessage();
}
?>