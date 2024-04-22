<?php
session_start();
// Database connection
$conn = new mysqli('localhost', 'root', '', 'faculty_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['signin'])) {
    // Sign-in logic
    $faculty_number = $_POST['faculty_number'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM facultys WHERE faculty_number = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $faculty_number, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Modified to include JavaScript for redirection
        echo "<script>
                alert('Login successful!');
                window.location.href = 'Update.php';
              </script>";

    } else {
        echo "<script>
                alert('Incorrect faculty number or password.');
                window.location.href = 'faculty.php';
              </script>";
    }
    $stmt->close();
} elseif (isset($_POST['signup'])) {
    // Sign-up logic
    $faculty_number = $_POST['faculty_number'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if faculty number or email already exists
    $sql = "SELECT * FROM facultys WHERE faculty_number = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $faculty_number, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
        alert('faculty number or email already exists.');
        window.location.href = 'faculty.php';
        </script>";
    } else {
        // Insert new faculty
        $sql = "INSERT INTO facultys (faculty_number, fullname, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $faculty_number, $fullname, $email, $password);
        if ($stmt->execute()) {
            echo "<script>alert('Sign-up successful!');
            window.location.href = 'faculty.php';
            </script>";
            // Redirect to a dashboard or another page
        } else {
            echo "<script>alert('Sign-up failed.');
            window.location.href = 'faculty.php';
            </script>";
        }
    }
    $stmt->close();
}


if (isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    if ($otp === $_SESSION['otp']) {
        echo "<script>alert('OTP verified successfully.');
        window.location.href = 'faculty.php';
        </script>";
    } else {
        echo "<script>alert('Invalid OTP. Please try again.');
        window.location.href = 'faculty.php';
        </script>";
    }
}

$conn->close();
?>
