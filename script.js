document.addEventListener('DOMContentLoaded', function() {
    const statusForm = document.getElementById('status-form');
    const statusList = document.getElementById('status-list');
    const currentTimeDateDiv = document.getElementById('current-time-date');

    // Load existing statuses
    loadStatuses();

    // Event listener for form submission
    if (statusForm) {
        statusForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const facultyName = document.getElementById('faculty-name').value;
            const statusUpdate = document.getElementById('status-update').value;
            const currentTime = new Date().toLocaleTimeString();
            const currentDate = new Date().toLocaleDateString();

            // Save the status update with time and date
            saveStatus(facultyName, statusUpdate, currentTime, currentDate);

            // Clear the form
            statusForm.reset();

            // Alert user of successful update
            alert("New update successfully recorded");
        });
    }

    // Display current time and date
    if (currentTimeDateDiv) {
        currentTimeDateDiv.addEventListener('click', function() {
            const currentTime = new Date().toLocaleTimeString();
            const currentDate = new Date().toLocaleDateString();
            alert("Current time & date: " + currentTime + ", " + currentDate);
            // Update the input field with the current time and date
            document.getElementById('current-time-date').value = currentTime + ", " + currentDate;
        });
    }

    function loadStatuses() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "display_status.php", true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Parse the response text into JSON
                const statuses = JSON.parse(xhr.responseText);
    
                // Filter out entries older than 5 hours
                const filteredStatuses = statuses.filter(status => {
                    const statusDate = new Date(status.date + ' ' + status.time);
                    const currentDate = new Date();
                    const diffInHours = (currentDate - statusDate) / (1000 * 60 * 60);
                    return diffInHours <= 5; // Keep entries within the last 5 hours
                });
    
                // Sort the filtered statuses by date and time in descending order
                filteredStatuses.sort((a, b) => {
                    const dateA = new Date(a.date + ' ' + a.time);
                    const dateB = new Date(b.date + ' ' + b.time);
                    return dateB - dateA; // Sort in descending order
                });
    
                // Generate HTML for the filtered and sorted statuses
                let statusListHTML = '';
                filteredStatuses.forEach(status => {
                    statusListHTML += `<p>${status.name}: ${status.update} - ${status.date} ${status.time}</p>`;
                });
    
                // Update the status list in the DOM
                statusList.innerHTML = statusListHTML;
            }
        };
        xhr.send();
    }
     

    function saveStatus(name, update, time, date) {
        const xhr = new XMLHttpRequest();
        const params = `name=${name}&update=${update}&time=${time}&date=${date}`;
        xhr.open("POST", "save_status.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                loadStatuses(); // Refresh status list after saving
            }
        };
        xhr.send(params);
    }
});
