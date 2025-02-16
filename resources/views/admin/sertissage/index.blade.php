<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            animation: fadeIn 1s ease-in;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #ddd;
            transform: scale(1.02);
            transition: 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="3">Scrapr</th>
                <th colspan="26">Production</th>
            </tr>
            <tr>
                <th>Machines</th>
                <th>Echantillon CFA</th>
                <th>Refus Machine</th>
                <th>Refus Prototype</th>
                <th>Matricule</th>
                <th>Refus Mc</th>
                <th>Production</th>
                <th>NB Reg </th>
                <th>Maint </th>
                <th>PCL</th>
                <th>Refus MC </th>
                <th>Production</th>
                <th>NB Reg </th>
                <th>Maint </th>
                <th>PCL</th>
                <th>Refus MC </th>
                <th>Production</th>
                <th>NB Reg </th>
                <th>Maint </th> 
                <th>PCL</th>
                <th>Refus MC </th>
                <th>Production</th>
                <th>NB Reg </th>
                <th>Maint </th>
                <th>PCL</th>
                <th>NB carte kan </th>
                <th>NB heures </th>
                <th>Group</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($machines as $m)
            <tr>
                <td>{{ $m->name }}</td>
                <td>{{ $m->echantillon_cfa }}</td>
                <td>{{ $m->refus_machine }}</td>
                <td>{{ $m->refus_prototype }}</td>
                <td>{{ $m->matricule }}</td>
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
                <td>{{ $m->nb_carte_kanban }}</td>
                <td>{{ $m->nb_heures }}</td>
                <td>{{ $m->Group }}</td>
                <td>{{ $m->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
