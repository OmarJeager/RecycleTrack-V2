<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 2px solid blue; /* Set table border color to blue */
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
        input[type="number"], input[type="text"], select {
            width: 100px;
            padding: 8px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
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
        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        /* Container to hold both images */
        .logo-container {
            position: relative;
            width: 150px;
            height: auto;
        }

        /* Style for the images */
        .logo-container img {
            position: absolute;
            width: 150px;
            height: auto;
            transition: opacity 0.3s ease-in-out;
        }

        /* Hide the second image initially */
        .logo-container img.second {
            opacity: 0;
        }

        /* Make first image disappear and second image appear on hover */
        .logo-container:hover .first {
            opacity: 0;
        }

        .logo-container:hover .second {
            opacity: 1;
            animation: fadeIn 0.5s ease forwards;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
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

    </style>
</head>
<body>
    <div style="position: absolute; top: 10px; right: 10px;">
        <img src="{{ asset('developeby.png') }}" alt="Aptiv Image" style="width: 250px; height: 250px;" class="mt-2 mb-2 transition transform hover:scale-105">
    </div>
    <div class="logo-container">
        <!-- First image (default) -->
        <img src="{{ asset('logo.png') }}" alt="Aptiv Image" class="first">

        <!-- Second image (hover image) -->
        <img src="{{ asset('aptiv.png') }}" alt="Aptiv Image" class="second">
    </div>
    <h1 style="text-align: center; margin-top: 0;">Welcome To Contre Maitre Interface</h1>
    <h1>Crimping Area</h1>
    <h3>Fill in the form below to record the daily production of the crimping area:</h3>
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
    @if (session('success'))
        <div class="alert alert-success" style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <th colspan="1"></th>
            <th colspan="4">scrap</th>
            <th colspan="5">2H</th>
            <th colspan="5">4H</th>
            <th colspan="5">6H</th>
            <th colspan="7">8H</th>
        </thead>
        <thead>
            <th>Machines</th>
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
            <th>NB Heures</th>        </thead>
        <tbody>
            <form action="{{ route('lphunkuser.store') }}" method="post">
                @csrf
                <input type="hidden" name="name_mc" value="{{Auth::user()->name}}" required>
                @foreach ($machines as $m )
                <input type="hidden" name="name[]" value="{{$m->machines}}">
                <td><input type="hidden" name="machine_id[]" value="{{ $m->id }}"></td>
                <td><input type="hidden" name="date[]" value="{{ \Carbon\Carbon::now()->toDateString() }}"></td>
                <input type="hidden" name="group" value="{{ $group }}">
                <tr class="machine-row">
                    <td>{{ $m->machines }}</td>
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
                <button type="submit">Save</button>
            </form>
        </tbody>
    </table>
    <div class="mt-4">
        <a href="{{ route('admin.create') }}" class="text-blue-500 hover:underline">
            back to dashboard
        </a>
    </div>

    <script>
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
    <a href="{{ route('admin.lphunk') }}" class="btn-large">Dispaly Data</a>
    <a href="{{ route('dashboard') }}" class="btn-large"> back to dashboard</a>
</body>
</html>
