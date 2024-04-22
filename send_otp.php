<?php
session_start();

// Assuming you have a function to send emails
function send_otp_email($email, $otp) {
    // Implement email sending logic here
}

// Generate OTP
$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;

// Send OTP to user's email
$email = $_POST['email'];
send_otp_email($email, $otp);

echo 'success';
?>
