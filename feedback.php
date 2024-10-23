
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
</head>
<body>
    <h1>Customer Feedback</h1>
    <form action="processfeedback.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="feedback">Feedback:</label>
        <textarea name="feedback" required></textarea><br>
        <input type="submit" value="Submit Feedback">
    </form>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="appointment.php">Book Appointment</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="viewappointments.php">View Appointments</a></li>
        </ul>
    </nav>
</body>
</html>



