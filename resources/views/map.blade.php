<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasar Peta Interaktif</title>

    <!-- Leaflet.js CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwlgebS3bplkEr9NEFBhut66Xo-m4muW4"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 10px;
        }

        #leaflet-map,
        #google-map {
            height: 400px;
            margin: 20px auto;
            max-width: 90%;
        }
    </style>
</head>

<body>
    <h1>Peta Interaktif dengan Laravel</h1>

    <div id="leaflet-map"></div>
    <div id="google-map"></div>

    <script>
        // Leaflet.js Map 
        const leafletMap = L.map('leaflet-map').setView([-8.6509, 115.2194], 13);

        // Menggunakan tile layer CartoDB
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://carto.com/">CartoDB</a> contributors'
        }).addTo(leafletMap);

        // Marker Universitas Udayana
        const markerKampusDenpasar = L.marker([-8.6509, 115.2194]).addTo(leafletMap);
        markerKampusDenpasar.bindPopup("<b>Universitas Udayana</b><br>Denpasar, Bali").on('click', () => {
            leafletMap.setView([-8.6509, 115.2194], 15); // Zoom otomatis ke lokasi
        });

        // Marker SMAN 2 Denpasar
        const marker2 = L.marker([-8.676762, 115.2150421]).addTo(leafletMap);
        marker2.bindPopup("<b>SMAN 2 Denpasar</b>").on('click', () => {
            leafletMap.setView([-8.676762, 115.2150421], 15); // Zoom otomatis ke lokasi
        });

        // Google Maps API Map 
        const googleMapDiv = document.getElementById('google-map');
        const googleMap = new google.maps.Map(googleMapDiv, {
            center: {
                lat: -8.6509,
                lng: 115.2194
            },
            zoom: 13,
        });

        // Marker Universitas Udayana
        const markerGoogle1 = new google.maps.Marker({
            position: {
                lat: -8.6509,
                lng: 115.2194
            },
            map: googleMap,
            title: "Universitas Udayana",
        });
        const window1 = new google.maps.InfoWindow({
            content: "<b>Universitas Udayana</b>",
        });
        markerGoogle1.addListener('click', () => {
            googleMap.setZoom(15); // Zoom otomatis
            window1.open(googleMap, markerGoogle1);
            googleMap.setCenter(markerGoogle1.getPosition());
        });

        // Marker SMAN 2 Denpasar
        const markerGoogle2 = new google.maps.Marker({
            position: {
                lat: -8.676762,
                lng: 115.2150421
            },
            map: googleMap,
            title: "SMAN 2 Denpasar",
        });
        const window2 = new google.maps.InfoWindow({
            content: "<b>SMAN 2 Denpasar</b>",
        });
        markerGoogle2.addListener('click', () => {
            googleMap.setZoom(15); // Zoom otomatis
            window2.open(googleMap, markerGoogle2);
            googleMap.setCenter(markerGoogle2.getPosition());
        });
    </script>
</body>

</html>
