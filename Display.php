<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Faculty Statuses</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="menu">
        <video autoplay loop muted plays-inline class="vid">
            <source src="img/bkg_animation.mp4" type="video/mp4">
        </video>
        <nav>
            <img src="img/puplogo.png" class="logo">
            <ul>
                <li><a href="index.html" >Home</a></li>
                <li><a href="signinportal.html">Sign-in</a></li>
                <li><a href="Contact.html">Contact</a></li>
                <li><a href="About.html">About</a></li>
            </ul>
        </nav>
    <h1>Current Faculty Statuses</h1>
    <div id="status-list"></div>
    <script src="script.js"></script>
    <script>
        // Function to fetch and display the latest statuses
        function fetchStatuses() {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "display_status.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('status-list').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        // Call fetchStatuses initially to load the statuses
        fetchStatuses();

        // Set an interval to fetch the statuses every 5 seconds
        setInterval(fetchStatuses, 5000);
    </script>
</body>
</html>
