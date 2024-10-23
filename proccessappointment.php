<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("file_exceptions.php");

$petType = $_POST['petType'];
$service = $_POST['service'];
$appointmentDate = $_POST['appointmentDate'];
$ownerName = preg_replace('/\t|\R/', ' ', $_POST['ownerName']);
$document_root = $_SERVER['DOCUMENT_ROOT'];
$date = date('H:i, jS F Y');

$outputstring = "$date\t$petType\t$service\t$appointmentDate\t$ownerName\n";

try {
    $appointmentsFile = "$document_root/../appointments/appointments.txt"; // Adjust path if necessary
    if (!($fp = @fopen($appointmentsFile, 'ab'))) {
        throw new fileOpenException();
    }

    if (!flock($fp, LOCK_EX)) {
        throw new fileLockException();
    }

    if (!fwrite($fp, $outputstring, strlen($outputstring))) {
        throw new fileWriteException();
    }

    flock($fp, LOCK_UN);
    fclose($fp);
    echo "<p>Appointment recorded. Thank you!</p>";
    echo "<p>Your appointment is as follows:</p>";
    echo "Pet Type: " . htmlspecialchars($petType) . "<br />";
    echo "Service Requested: " . htmlspecialchars($service) . "<br />";
    echo "Appointment Date: " . htmlspecialchars($appointmentDate) . "<br />";
    echo "Owner Name: " . htmlspecialchars($ownerName) . "<br />";
} catch (fileOpenException $foe) {
    echo "<p><strong>Appointments file could not be opened.<br/>
          Please contact our webmaster for help.</strong></p>";
} catch (Exception $e) {
    echo "<p><strong>Your appointment could not be processed at this time.<br/>
          Please try again later.</strong></p>";
}
?>

