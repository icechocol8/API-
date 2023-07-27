<!DOCTYPE html>
<html>
<head>
    <title>API Demo</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxMYWt7aQNPYoi6LJsZUW4mEnyS35A4ps&libraries=places" defer></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>API Demo</h1>
    <div id="map"></div>

    <script>
        function initMap() {
            // Replace "YOUR_GITHUB_USERNAME" with your GitHub username
            const githubUsername = 'icechocol8';

            // Fetch GitHub user data
            fetch(`https://api.github.com/users/${githubUsername}`)
                .then(response => response.json())
                .then(data => {
                    const latitude = data.location ? parseFloat(data.location.split(',')[0]) : 0;
                    const longitude = data.location ? parseFloat(data.location.split(',')[1]) : 0;

                    // Display GitHub user's location on the map
                    const map = new google.maps.Map(document.getElementById('map'), {
                        center: { lat: latitude, lng: longitude },
                        zoom: 8
                    });

                    const marker = new google.maps.Marker({
                        position: { lat: latitude, lng: longitude },
                        map: map,
                        title: `${githubUsername}'s Location`
                    });
                })
                .catch(error => console.error('Error fetching GitHub data:', error));
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxMYWt7aQNPYoi6LJsZUW4mEnyS35A4ps&callback=initMap"></script>
</body>
</html>
