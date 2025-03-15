<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contre Maitre Interface</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            padding: 20px;
            margin: 0;
            transition: background-color 0.3s ease, color 0.3s ease;
            position: relative; /* Required for absolute positioning of child elements */
        }

        body.dark-mode {
            background-color: #333;
            color: #f4f7f6;
        }

        h1, h3 {
            text-align: center;
            margin-top: 0;
        }

        /* Dark Mode Toggle */
        .dark-mode-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            cursor: pointer;
            font-size: 24px;
            z-index: 1000;
        }

        /* Logo Container Styles */
        .logo-container {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 150px;
            height: auto;
            z-index: 100;
        }

        .logo-container img {
            width: 150px;
            height: auto;
            transition: opacity 0.3s ease-in-out;
        }

        .logo-container img.second {
            opacity: 0;
        }

        .logo-container:hover .first {
            opacity: 0;
        }

        .logo-container:hover .second {
            opacity: 1;
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Developeby Logo Styles */
        .developeby-container {
            position: absolute; /* Absolute position to scroll normally */
            top: 20px; /* Distance from the top */
            right: 20px; /* Distance from the right */
            width: 250px;
            height: 250px;
            z-index: 1000; /* Ensure it stays above other elements */
        }

        .developeby-container img {
            width: 100%;
            height: auto;
            transition: opacity 0.5s ease-in-out;
        }

        .developeby-container:hover img {
            opacity: 0; /* Hide the logo on hover */
        }

        .developeby-container:hover::after {
            content: "Welcome";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: bold;
            color: #007BFF; /* Blue color for light mode */
            opacity: 1;
            animation: fadeInText 0.5s ease forwards;
        }

        body.dark-mode .developeby-container:hover::after {
            color: #00ff88; /* Light green color for dark mode */
        }

        @keyframes fadeInText {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 2px solid blue;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        body.dark-mode th {
            background-color: #0056b3; /* Darker blue for dark mode */
        }

        /* Make thead sticky when scrolling down */
        thead th {
            position: sticky;
            top: 0; /* Stick to the top of the viewport */
            z-index: 2;
            background-color: #007BFF;
            color: white;
        }

        body.dark-mode thead th {
            background-color: #0056b3; /* Darker blue for dark mode */
        }

        /* Sticky First Column */
        .sticky-col {
            position: -webkit-sticky;
            position: sticky;
            left: 0;
            background-color: #f4f7f6;
            z-index: 1;
        }

        body.dark-mode .sticky-col {
            background-color: #444; /* Darker background for dark mode */
            color: #f4f7f6; /* Light text for dark mode */
        }

        /* Input Styles */
        input[type="number"], input[type="text"], select {
            width: 100px;
            padding: 8px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        body.dark-mode input[type="number"], 
        body.dark-mode input[type="text"], 
        body.dark-mode select {
            background-color: #444;
            color: #f4f7f6;
            border-color: #555;
        }

        /* Button Styles */
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #883b21;
        }

        .btn-large {
            display: inline-block;
            padding: 15px 30px;
            font-size: 20px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-large:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Fixed Save Button Styles */
        .fixed-save-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000; /* Ensure it stays above other elements */
            padding: 15px 30px;
            font-size: 20px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .fixed-save-button:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Alert Styles */
        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        /* Responsive Table for Small Screens */
        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            thead th {
                top: 0;
            }

            .sticky-col {
                left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Dark Mode Toggle -->
    <div class="dark-mode-toggle" onclick="toggleDarkMode()">🌙</div>

    <!-- Logo and Images -->
    <div class="logo-container">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="first">
        <img src="{{ asset('aptiv.png') }}" alt="Aptiv" class="second">
    </div>

    <!-- Developeby Logo -->
    <div class="developeby-container">
        <img src="{{ asset('developeby.png') }}" alt="Developed By">
    </div>

    <!-- Page Heading -->
    <h1>Welcome To Contre Maitre Interface</h1>
    <h1>Crimping Area</h1>
    <h3>Fill in the form below to record the daily production of the crimping area:</h3>

    <!-- PHP Logic for Shift Group -->
    @php
        use Carbon\Carbon;
        $currentTime = Carbon::now()->format('H:i');
        if ($currentTime >= '06:00' && $currentTime <= '14:00') {
            $group = 'M'; // Morning Shift
        } elseif ($currentTime >= '14:01' && $currentTime <= '22:00') {
            $group = 'S'; // Second Shift
        } else {
            $group = 'N'; // Night Shift
        }
    @endphp

    <!-- Success Alert -->
    @if (session('success'))
        <div class="alert alert-success" style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <table border="1">
        <thead>
            <tr>
                <th class="sticky-col">Machines</th>
                <th colspan="4">Scrap</th>
                <th colspan="5">2H</th>
                <th colspan="5">4H</th>
                <th colspan="5">6H</th>
                <th colspan="7">8H</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th class="sticky-col">Machines</th>
                <th>Matricule</th>
                <th>Echantillon CFA</th>
                <th>Refus Machine</th>
                <th>Refus Prototype</th>
                <th>Refus MC</th>
                <th>Production</th>
                <th>NB Reg</th>
                <th>Maint</th>
                <th>PCL</th>
                <th>Refus MC</th>
                <th>Production</th>
                <th>NB Reg</th>
                <th>Maint</th>
                <th>PCL</th>
                <th>Refus MC</th>
                <th>Production</th>
                <th>NB Reg</th>
                <th>Maint</th>
                <th>PCL</th>
                <th>Refus MC</th>
                <th>Production</th>
                <th>NB Reg</th>
                <th>Maint</th>
                <th>PCL</th>
                <th>NB Carte Kan</th>
                <th>NB Heures</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{ route('sertissage.store') }}" method="post">
                @csrf
                <input type="hidden" name="name_mc" value="{{ Auth::user()->name }}" required>
                @foreach ($machines as $m)
                    <input type="hidden" name="name[]" value="{{ $m->machines }}">
                    <input type="hidden" name="machine_id[]" value="{{ $m->id }}">
                    <input type="hidden" name="date[]" value="{{ \Carbon\Carbon::now()->toDateString() }}">
                    <input type="hidden" name="group" value="{{ $group }}">
                    <tr class="machine-row">
                        <td class="sticky-col">{{ $m->machines }}</td>
                        <td><input type="number" name="matricule[]" step="any"></td>
                        <td><input type="number" name="echantillon_cfa[]" step="any"></td>
                        <td><input type="number" name="refus_machine[]" step="any"></td>
                        <td><input type="number" name="refus_prototype[]" step="any"></td>
                        <td><input type="number" name="refus_mc[]" step="any"></td>
                        <td><input type="number" name="production[]" step="any"></td>
                        <td><input type="number" name="nb_reg[]" step="any"></td>
                        <td><input type="number" name="maint[]" step="any"></td>
                        <td><input type="number" name="pcl[]" step="any"></td>
                        <td><input type="number" name="refus_mc2[]" step="any"></td>
                        <td><input type="number" name="production2[]" step="any"></td>
                        <td><input type="number" name="nb_reg2[]" step="any"></td>
                        <td><input type="number" name="maint2[]" step="any"></td>
                        <td><input type="number" name="pcl2[]" step="any"></td>
                        <td><input type="number" name="refus_mc3[]" step="any"></td>
                        <td><input type="number" name="production3[]" step="any"></td>
                        <td><input type="number" name="nb_reg3[]" step="any"></td>
                        <td><input type="number" name="maint3[]" step="any"></td>
                        <td><input type="number" name="pcl3[]" step="any"></td>
                        <td><input type="number" name="refus_mc4[]" step="any"></td>
                        <td><input type="number" name="production4[]" step="any"></td>
                        <td><input type="number" name="nb_reg4[]" step="any"></td>
                        <td><input type="number" name="maint4[]" step="any"></td>
                        <td><input type="number" name="pcl4[]" step="any"></td>
                        <td><input type="number" name="nb_carte_kan[]" step="any"></td>
                        <td><input type="number" name="nb_heures[]" step="any"></td>
                    </tr>
                @endforeach
                <button type="submit" class="btn-large fixed-save-button">Save</button>
            </form>
        </tbody>
    </table>

    <!-- Buttons -->
    <a href="{{ route('admin.sertissage') }}" class="btn-large">Display Data</a>
    <a href="{{ route('dashboard') }}" class="btn-large">Back to Dashboard</a>

    <!-- JavaScript for Dark Mode and Row Highlight -->
    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.machine-row');
            rows.forEach(row => {
                row.addEventListener('click', function() {
                    rows.forEach(r => r.classList.remove('highlight'));
                    this.classList.add('highlight');
                });
            });
        });
    </script>
</body>
</html>