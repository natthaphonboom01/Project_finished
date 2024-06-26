<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Elderly</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 100px auto 0;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #2980b9;
        }

        .success {
            background-color: #2ecc71;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .back-button {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background-color: #34495e;
        }

        #map {
            height: 400px;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var initialPosition = [14.9930, 103.1029]; // Initial map position set to Buriram, Thailand

            var map = L.map('map').setView(initialPosition, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var marker = L.marker(initialPosition, { draggable: true }).addTo(map);

            map.on('click', function (e) {
                var clickedLocation = e.latlng;
                marker.setLatLng(clickedLocation);
                document.getElementById('Latitude_position').value = clickedLocation.lat;
                document.getElementById('Longitude_position').value = clickedLocation.lng;
            });

            marker.on('dragend', function (e) {
                var draggedLocation = e.target.getLatLng();
                document.getElementById('Latitude_position').value = draggedLocation.lat;
                document.getElementById('Longitude_position').value = draggedLocation.lng;
            });
        });
    </script>
</head>

<body>
    @include('layout.nav')

    <div class="container">
        <h2>Edit Elderly Information</h2>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('staff-dashboard') }}" class="back-button">Back to Dashboard</a>

        <form action="{{ route('update-elderly', ['id' => $elderly->ID_Elderly]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Name_Elderly">Name:</label>
                <input type="text" id="Name_Elderly" name="Name_Elderly" value="{{ $elderly->Name_Elderly }}" required>
            </div>

            <div class="form-group">
                <label for="Birthday">Birthday:</label>
                <input type="date" id="Birthday" name="Birthday" value="{{ $elderly->Birthday }}" required>
            </div>

            <div class="form-group">
                <label for="Address">Address:</label>
                <textarea id="Address" name="Address" required>{{ $elderly->Address }}</textarea>
            </div>

            <div id="map"></div>

            <div class="form-group">
                <label for="Latitude_position">Latitude Position:</label>
                <input type="text" id="Latitude_position" name="Latitude_position" value="{{ $elderly->Latitude_position }}">
            </div>

            <div class="form-group">
                <label for="Longitude_position">Longitude Position:</label>
                <input type="text" id="Longitude_position" name="Longitude_position" value="{{ $elderly->Longitude_position }}">
            </div>

            <div class="form-group">
                <label for="Phone_Elderly">Phone Number:</label>
                <input type="text" id="Phone_Elderly" name="Phone_Elderly" value="{{ $elderly->Phone_Elderly }}" required>
            </div>

            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
