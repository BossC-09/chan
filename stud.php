<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'faculty_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['signin'])) {
    // Sign-in logic
    $student_number = $_POST['student_number'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE student_number = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $student_number, $password);
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
                alert('Incorrect student number or password.');
                window.location.href = 'student.php';
              </script>";
    }
    $stmt->close();
} elseif (isset($_POST['signup'])) {
    // Sign-up logic
    $student_number = $_POST['student_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if student number or email already exists
    $sql = "SELECT * FROM students WHERE student_number = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $student_number, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
        alert('Student number or email already exists.');
        window.location.href = 'student.php';
        </script>";
    } else {
        // Insert new student
        $sql = "INSERT INTO students (student_number, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $student_number, $email, $password);
        if ($stmt->execute()) {
            echo "<script>alert('Sign-up successful!');
            window.location.href = 'student.php';
            </script>";
            // Redirect to a dashboard or another page
        } else {
            echo "<script>alert('Sign-up failed.');
            window.location.href = 'student.php';
            </script>";
        }
    }
    $stmt->close();
}

$conn->close();
?>
