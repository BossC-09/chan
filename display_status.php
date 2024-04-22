<?php
include 'db_connection.php';

// Retrieve data from the database
$sql = "SELECT * FROM faculty_statuses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Convert MySQL date and time to readable format
        $time = date("h:i A", strtotime($row["time"]));
        $date = date("F j, Y", strtotime($row["date"]));
        
        echo "<div class='status-item'><strong>" . $row["name"] . ":</strong> " . $row["update_status"] . "<br>Time: " . $time . "<br>Date: " . $date . "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
