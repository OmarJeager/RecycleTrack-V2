@php
use Carbon\Carbon;
$groupedMachines = $machines->groupBy('date'); // Group machines by date
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
            animation: fadeIn 1.5s ease-in;
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
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @media (max-width: 768px) {
            table, th, td {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <h1>Date: {{ Carbon::now()->format('Y-m-d') }}</h1>
    <button><a href="{{ route('admin.dashboard') }}">Back to Dashboard</a></button>

    <!-- Date Filter Input -->
    <label for="dateFilter"><strong>Select Date:</strong></label>
    <input type="date" id="dateFilter">
    
    @foreach ($groupedMachines as $date => $machinesForDate)
        @php
            $weekNumber = 'W' . Carbon::parse($date)->format('W'); // Get week number
        @endphp

        <div class="date-section" data-date="{{ $date }}">
            <h2>Data for: {{ $date }} ({{ $weekNumber }})</h2>

            @php
                $groupedByYourwk = $machinesForDate->groupBy('yourwk');
            @endphp

            @foreach ($groupedByYourwk as $yourwk => $machinesForYourwk)
                <h3>WK: {{ $yourwk }}</h3>

                @php
                    $groupedByGroup = $machinesForYourwk->groupBy('group');
                @endphp

                @foreach ($groupedByGroup as $group => $machinesForGroup)
                    <h4>Group: {{ $group }}</h4>

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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                @endforeach
            @endforeach
        </div>
    @endforeach

    <script>
        document.getElementById('dateFilter').addEventListener('input', function () {
            let selectedDate = this.value;
            let sections = document.querySelectorAll('.date-section');

            sections.forEach(section => {
                let sectionDate = section.getAttribute('data-date');
                if (selectedDate === sectionDate || selectedDate === '') {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
