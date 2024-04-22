<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Faculty Status</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        <video autoplay loop muted plays-inline class="vid">
            <source src="img/bkg_animation.mp4" type="video/mp4">
        </video>

        <nav>
            <img src="img/puplogo.png" class="logo">
            <ul>
                <li><a href="index.html"  >Home</a></li>
                <li><a href="signinportal.html">Sign-in</a></li>
                <li><a href="Contact.html">Contact</a></li>
                <li><a href="About.html">About</a></li>
            </ul>
        </nav>
    <h1>Update Faculty Status</h1>
    <form id="status-form">
        <label for="faculty-name">Faculty Name:</label>
        <input type="text" id="faculty-name" name="faculty-name" required>
        <label for="status-update">Status Update:</label>
        <select id="status-update" name="status-update" required>
            <option value="">Select Status</option>
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
            <option value="on-field">On Field</option>
            <option value="on-leave">On Leave</option>
        </select>
        <div>
            <label for="current-time-date">Current Time & Date:</label>
            <input type="button" id="current-time-date" value="Get Current Time & Date">
        </div>
        <button type="submit">UPDATE</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
