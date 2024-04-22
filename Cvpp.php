<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'faculty_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['signin'])) {
    // Sign-in logic
    $client_number = $_POST['client_number'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM clients WHERE client_number = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $client_number, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Modified to include JavaScript for redirection
        echo "<script>
                alert('Login successful!');
                window.location.href = 'Display.php';
              </script>";

    } else {
        echo "<script>
                alert('Incorrect client number or password.');
                window.location.href = 'CVP.php';
              </script>";
    }
    $stmt->close();
} elseif (isset($_POST['signup'])) {
    // Sign-up logic
    $client_number = $_POST['client_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if client number or email already exists
    $sql = "SELECT * FROM clients WHERE client_number = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $client_number, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
        alert('client number or email already exists.');
        window.location.href = 'CVP.php';
        </script>";
    } else {
        // Insert new client
        $sql = "INSERT INTO clients (client_number, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $client_number, $email, $password);
        if ($stmt->execute()) {
            echo "<script>alert('Sign-up successful!');
            window.location.href = 'CVP.php';
            </script>";
            // Redirect to a dashboard or another page
        } else {
            echo "<script>alert('Sign-up failed.');
            window.location.href = 'CVP.php';
            </script>";
        }
    }
    $stmt->close();
}

$conn->close();
?>
