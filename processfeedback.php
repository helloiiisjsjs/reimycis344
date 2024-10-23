<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("file_exceptions.php");

$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$document_root = $_SERVER['DOCUMENT_ROOT'];
$date = date('H:i, jS F Y');

$outputstring = "$date\t$name\t$email\t$feedback\n";

// Open file for appending
try {
    $feedbackFile = "$document_root/../feedback.txt"; // Adjust path if necessary
    if (!($fp = @fopen($feedbackFile, 'ab'))) {
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
    echo "<p>Feedback recorded. Thank you!</p>";
} catch (fileOpenException $foe) {
    echo "<p><strong>Feedback file could not be opened.<br/>
          Please contact our webmaster for help.</strong></p>";
} catch (Exception $e) {
    echo "<p><strong>Your feedback could not be processed at this time.<br/>
          Please try again later.</strong></p>";
}
?>




