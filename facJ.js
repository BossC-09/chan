const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

$('.sign-up-form').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
     url: 'send_otp.php',
     type: 'post',
     data: $(this).serialize(),
     success: function(response) {
       if (response === 'success') {
         $('.sign-up-form').hide();
         $('.otp-verification-form').show();
       } else {
         alert('Sign-up failed. Please try again.');
       }
     }
  });
 });
 
 $('.otp-verification-form').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
     url: 'verify_otp.php',
     type: 'post',
     data: $(this).serialize(),
     success: function(response) {
       if (response === 'success') {
         alert('OTP verified successfully.');
         window.location.href = 'faculty.php';
       } else {
         alert('Invalid OTP. Please try again.');
       }
     }
  });
 }); 