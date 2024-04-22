<?php
include 'db_connection.php';

// Get form data
$name = $_POST['name'];
$update = $_POST['update'];
$time = $_POST['time'];
$date = $_POST['date'];

// Convert date and time to MySQL format
$time = date("H:i:s", strtotime($time));
$date = date("Y-m-d", strtotime($date));

// Insert data into the database
$sql = "INSERT INTO faculty_statuses (name, update_status, time, date) VALUES ('$name', '$update', '$time', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Recorded successful!');
    window.location.href = 'Display.php';
  </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
