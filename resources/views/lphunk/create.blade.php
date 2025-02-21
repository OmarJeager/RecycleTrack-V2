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
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #ff2f00;
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
            background-color: orangered;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #4a2188;
        }
        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        /* Animation for table rows */
        tr {
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        tr:nth-child(even) {
            animation-delay: 0.2s;
        }

        tr:nth-child(odd) {
            animation-delay: 0.4s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <img src="{{ asset('logo.png') }}"  alt="Avatar" class="image">
    <h1>Welcome LP Hunk Area</h1>
    <h2>Fill the form below to create a new LP Hunk:</h2>
    @php
    $currentTime = now()->format('H:i'); // Get current time in HH:MM format

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
            <th>NB Heures</th>
        </thead>
        <tbody>
            <form action="{{ route('lphunkuser.store') }}" method="post">
                @csrf
                <input type="hidden" name="name_mc" value="{{Auth::user()->name}}" required>
                <input type="hidden" name="group" value="{{ $group }}">
                @foreach ($machines as $m )
                <input type="hidden" name="name[]" value="{{$m->machines}}">
                <td><input type="hidden" name="machine_id[]" value="{{ $m->id }}"></td>
                <td><input type="hidden" name="date[]" value="{{ \Carbon\Carbon::now()->toDateString() }}"></td>
                <tr>
                    <td>{{ $m->machines }}</td>
                    <td><input type="number" name="matricule[]" value="0"></td>
                    <td><input type="number" name="echantillon_cfa[]" value="0"></td>
                    <td><input type="number" name="refus_machine[]" value="0"></td>
                    <td><input type="number" name="refus_prototype[]" value="0"></td>
                    <td><input type="number" name="refus_mc[]" value="0"></td>
                    <td><input type="number" name="production[]" value="0"></td>
                    <td><input type="number" name="nb_reg[]" value="0"></td>
                    <td><input type="number" name="maint[]" value="0"></td>
                    <td><input type="number" name="pcl[]" value="0"></td>
                    <td><input type="number" name="refus_mc2[]" value="0"></td>
                    <td><input type="number" name="production2[]" value="0"></td>
                    <td><input type="number" name="nb_reg2[]" value="0"></td>
                    <td><input type="number" name="maint2[]" value="0"></td>
                    <td><input type="number" name="pcl2[]" value="0"></td>
                    <td><input type="number" name="refus_mc3[]" value="0"></td>
                    <td><input type="number" name="production3[]" value="0"></td>
                    <td><input type="number" name="nb_reg3[]" value="0"></td>
                    <td><input type="number" name="maint3[]" value="0"></td>
                    <td><input type="number" name="pcl3[]" value="0"></td>
                    <td><input type="number" name="refus_mc4[]" value="0"></td>
                    <td><input type="number" name="production4[]" value="0"></td>
                    <td><input type="number" name="nb_reg4[]" value="0"></td>
                    <td><input type="number" name="maint4[]" value="0"></td>
                    <td><input type="number" name="pcl4[]" value="0"></td>
                    <td><input type="number" name="nb_carte_kan[]" value="0"></td>
                    <td><input type="number" name="nb_heures[]" value="0"></td>
                </tr>
                @endforeach
                <button type="submit">Save</button>
            </form>
        </tbody>
    </table>
    <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">
            back to dashboard
        </a>
    </div>
</body>
</html>
