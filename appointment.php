<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment</title>
</head>
<body>
    <h1>Book an Appointment</h1>
    <form action="processappointment.php" method="post">
        <label for="petType">Pet Type:</label>
        <input type="text" name="petType" required><br>
        <label for="service">Service:</label>
        <input type="text" name="service" required><br>
        <label for="appointmentDate">Appointment Date:</label>
        <input type="date" name="appointmentDate" required><br>
        <label for="ownerName">Owner Name:</label>
        <input type="text" name="ownerName" required><br>
        <input type="submit" value="Book Appointment">
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




