<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="studC.css" />
    <title>Client & Visitor Portal</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="Cvpp.php" method="post" class="sign-in-form">
            <input type="hidden" name="signin" value="1">
            <h2 class="title">Client & Visitor <b style="color:maroon ;"> <br>Sign-in</b></h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="client Number" name="client_number" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>
          <form action="Cvpp.php" method="post" class="sign-up-form">
            <input type="hidden" name="signup" value="1">
            <h2 class="title">Client & Visitor <b style="color:maroon ;"><br>Sign-up</b></h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="client Number" name="client_number" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <nav>
              <ul>
                  <li><a href="index.html"  >Home</a></li>
                  <li><a href="signinportal.html">Sign-in</a></li>
                  <li><a href="Contact.html">Contact</a></li>
                  <li><a href="About.html">About</a></li>
              </ul>
          </nav>
            <h3>New here ? <br>Feel free to explore the better experience, Register quickly!</h3>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/puplogo.png" class="image"/>
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ? <br>Enjoy and encounter the wonderful website portal!</h3>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/puplogo.png" class="image" />
        </div>
      </div>
    </div>
    <script src="studJ.js"></script>
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>