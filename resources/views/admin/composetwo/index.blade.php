@php
use Carbon\Carbon;

// Get the selected date from the request, default to today if not set
$selectedDate = request('date', Carbon::now()->format('Y-m-d'));

// Filter machines by the selected date using created_at
$filteredMachines = $machines->filter(function($machine) use ($selectedDate) {
    return Carbon::parse($machine->created_at)->format('Y-m-d') === $selectedDate;
});

// Group machines by created_at date and sort in descending order
$groupedMachines = $filteredMachines->groupBy(function($machine) {
    return Carbon::parse($machine->created_at)->format('Y-m-d');
})->sortKeysDesc();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machines Archive</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 20px;
        }
        h1, h2, h3 {
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
        }
        button a {
            color: white;
            text-decoration: none;
        }
        .container {
            margin-bottom: 30px;
        }
        .container h4 {
            font-size: 18px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .error-message {
            color: red;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <img src="{{ asset('developeby.png') }}" alt="Aptiv Image" style="position: absolute; top:0; right: 10px; width: auto; height:400px; transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
    <h1>Cutting Area G2</h1>
    <h1>Date: {{ Carbon::now()->format('Y-m-d') }}</h1>
    <button><a href="{{ route('admin.dashboard') }}">Back to Dashboard</a></button>

    <form method="GET" action="{{ url()->current() }}">
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date" value="{{ $selectedDate }}">
        <button type="submit">Filter</button>
    </form>

    @if ($filteredMachines->isEmpty())
        <p class="error-message">No data found for this day: {{ $selectedDate }}</p>
    @else
        @foreach ($groupedMachines as $date => $machinesForDate)
            <h2>Data for: {{ $date }}</h2>

            @php
                $groupedByGroup = $machinesForDate->groupBy('group');
            @endphp

            @foreach ($groupedByGroup as $group => $groupMachines)
                <div class="container">
                    <h3>Group: {{ $group }}</h3>
                    
                    @php
                        $groupedByNameCm = $groupMachines->groupBy('namecm');
                    @endphp

                    @foreach ($groupedByNameCm as $namecm => $nameCmMachines)
                        <h4>ContreMaitre: {{ $namecm }}</h4>

                        <table>
                            <thead>
                                <tr>
                                    <th colspan="3">Scrapr</th>
                                    <th colspan="23">Production</th>
                                </tr>
                                <tr>
                                    <th>Machines</th>
                                    <th>Matricule</th>
                                    <th>Obj/NB Reg</th>
                                    <th>NB Reg</th>
                                    <th>Production</th>
                                    <th>DPN De Bobine</th>
                                    <th>MP</th>
                                    <th>Temps Mort</th>
                                    <th>MCE</th>
                                    <th>Reglage</th>
                                    <th>Process</th>
                                    <th>NB Defaut</th>
                                    <th>NB Heures</th>
                                    <th>Metal</th>
                                    <th>Echantillion CFA</th>
                                    <th>Echantillion Reglage</th>
                                    <th>Refus Machine</th>
                                    <th>Refus Quantite</th>
                                    <th>Refus Prototype</th>
                                    <th>Total Scrap Machine</th>
                                    <th>Fill</th>
                                    <th>Scrap Proto</th>
                                    <th>Terminal</th>
                                    <th>Date</th>
                                    <th>WK</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nameCmMachines as $m)
                                <tr>
                                    <td>{{ $m->name }}</td>
                                    <td>{{ $m->matricule }}</td>
                                    <td>{{ $m->objnbreg }}</td>
                                    <td>{{ $m->nbreg }}</td>
                                    <td>{{ $m->production }}</td>
                                    <td>{{ $m->dpndebobine }}</td>
                                    <td>{{ $m->mp }}</td>
                                    <td>{{ $m->tempsmort }}</td>
                                    <td>{{ $m->mce }}</td>
                                    <td>{{ $m->reglage }}</td>
                                    <td>{{ $m->process }}</td>
                                    <td>{{ $m->nbdeafaut }}</td>
                                    <td>{{ $m->nbheures }}</td>
                                    <td>{{ $m->metal }}</td>
                                    <td>{{ $m->echantilliondecfa }}</td>
                                    <td>{{ $m->echantilliondereglage }}</td>
                                    <td>{{ $m->refusmachine }}</td>
                                    <td>{{ $m->refusqualite }}</td>
                                    <td>{{ $m->refusprototype }}</td>
                                    <td>{{ $m->totalscrapemachine }}</td>
                                    <td>{{$m->fill}}</td>
                                    <td>{{$m->scrappic}}</td>
                                    <td>{{$m->terminal}}</td>
                                    <td>{{ $m->created_at }}</td>
                                    <td>{{ 'W' . Carbon::parse($m->created_at)->format('W') }}</td> <!-- Week Number -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            @endforeach
        @endforeach
    @endif
</body>
</html>