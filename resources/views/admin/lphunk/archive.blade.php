@php
$groupedMachines = $machines->groupBy('date'); // Group machines by date
@endphp
@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .container {
            margin-bottom: 20px;
        }
        button a {
            text-decoration: none;
            color: white;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Archive LP Hunk Area</h1>
    <h1>Date: {{ Carbon::now() }}</h1>
    <button><a href="{{ route('admin.dashboard') }}">Back to Dashboard</a></button>

    @foreach ($groupedMachines as $date => $machinesForDate)
        <h2>Data for: {{ $date }}</h2>

        @php
            $groupedByGroup = $machinesForDate->groupBy('group');
        @endphp

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
                            <th colspan="3">Scrapr</th>
                            <th colspan="26">Production</th>
                        </tr>
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
                            <td>{{ $m->nb_carte_kan}}</td>
                            <td>{{ $m->nb_heures }}</td>
                            <td>{{ $m->date }}</td>
                            <td>WK{{ \Carbon\Carbon::parse($m->date)->format('W') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endforeach
    @endforeach
</body>
</html>
