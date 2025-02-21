@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Production Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        button {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button a {
            color: white;
            text-decoration: none;
        }
        .container {
            margin-bottom: 30px;
        }
        .container h4 {
            font-size: 20px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        th {
            background-color: #6a4caf;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
            cursor: pointer;
        }
        .filter-container {
            margin-bottom: 20px;
        }
        .filter-container input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        .error-message {
            color: red;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Machine Production Data</h1>
    
    <button><a href="{{ route('admin.dashboard') }}">Back to Dashboard</a></button>

    <!-- Date Filter Form -->
    <div class="filter-container">
        <form method="GET" action="">
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" value="{{ request('date') }}">
            <button type="submit">Filter</button>
        </form>
    </div>

    @php
        $selectedDate = request('date'); // Get selected date
        $filteredMachines = collect(); // Default empty collection

        if ($selectedDate) {
            $filteredMachines = $machines->where('date', $selectedDate); // Filter by date
        }
    @endphp

    @if ($selectedDate)
        @if ($filteredMachines->isEmpty())
            <p class="error-message">No data found for this day: {{ $selectedDate }}</p>
        @else
            @php
                $weekNumber = 'W' . Carbon::parse($selectedDate)->format('W');
                $groupedByGroup = $filteredMachines->groupBy('group');
            @endphp

            <h2>Data for: {{ $selectedDate }} ({{ $weekNumber }})</h2>

            @foreach ($groupedByGroup as $group => $machinesForGroup)
                <h3>Group: {{ $group }}</h3>

                @php
                    $groupedByNameMc = $machinesForGroup->groupBy('name_mc');
                @endphp

                @foreach ($groupedByNameMc as $name_mc => $machinesForNameMc)
                    <div class="container">
                        <h4>ContreMaitre: {{ $name_mc }}</h4>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Machines</th>
                                <th>Matricule</th>
                                <th>Echantillon CFA</th>
                                <th>Refus Machine</th>
                                <th>Refus Prototype</th>
                                <th>Refus Mc</th>
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
                                <th>NB carte kan</th>
                                <th>NB heures</th>
                                <th>Date</th>
                                <th>Week Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($machinesForNameMc as $m)
                            <tr>
                                <td>{{ $m->name }}</td>
                                <td>{{ $m->matricule }}</td>
                                <td>{{ $m->echantillon_cfa }}</td>
                                <td>{{ $m->refus_machine }}</td>
                                <td>{{ $m->refus_prototype }}</td>
                                <td>{{ $m->refus_mc }}</td>
                                <td>{{ $m->production }}</td>
                                <td>{{ $m->nb_reg }}</td>
                                <td>{{ $m->maint }}</td>
                                <td>{{ $m->pcl }}</td>
                                <td>{{ $m->refus_mc2 }}</td>
                                <td>{{ $m->production2 }}</td>
                                <td>{{ $m->nb_reg2 }}</td>
                                <td>{{ $m->maint2 }}</td>
                                <td>{{ $m->pcl2 }}</td>
                                <td>{{ $m->refus_mc3 }}</td>
                                <td>{{ $m->production3 }}</td>
                                <td>{{ $m->nb_reg3 }}</td>
                                <td>{{ $m->maint3 }}</td>
                                <td>{{ $m->pcl3 }}</td>
                                <td>{{ $m->refus_mc4 }}</td>
                                <td>{{ $m->production4 }}</td>
                                <td>{{ $m->nb_reg4 }}</td>
                                <td>{{ $m->maint4 }}</td>
                                <td>{{ $m->pcl4 }}</td>
                                <td>{{ $m->nb_carte_kan }}</td>
                                <td>{{ $m->nb_heures }}</td>
                                <td>{{ $m->date }}</td>
                                <td>{{ 'W' . Carbon::parse($m->date)->format('W') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            @endforeach
        @endif
    @endif
</body>
</html>
