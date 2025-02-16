<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        select, input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <button><a href="{{ route('dashboard') }}">Back to Dashboard</a></button>
    <h2>Add New Data</h2>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('machineEntries.store') }}" method="POST">
        @csrf

        <!-- Machines Dropdown -->
        <label for="machine_id">Machine:</label>
        <select name="machine_id" required>
            <option value="">Select a Machine</option>
            @foreach($machines as $machine)
                <option value="{{ $machine->id }}">{{ $machine->machines }}</option>
            @endforeach
        </select>
        <label for="name">Machine Name:</label>
        <select name="name" required>
            <option value="">Select a Machine</option>
            @foreach($machines as $machine)
                <option value="{{ $machine->machines }}">{{ $machine->machines }}</option>
            @endforeach
        </select>
        <label for="echantillon_cfa">Echantillon CFA:</label>
        <input type="number" name="echantillon_cfa" required>
        <label for="refus_machine">Refus Machine:</label>
        <input type="number" name="refus_machine" required>
        <label for="refus_prototype">Refus Prototype:</label>
        <input type="number" name="refus_prototype" value="0" required>
        <label for="matricule">Matricule:</label>
        <input type="number" name="matricule" value="0" required>
        <label for="refus_mc">Refus MC:</label>
        <input type="number" name="refus_mc" value="0" required>
        <label for="production">Production:</label>
        <input type="number" name="production" value="0" required>
        <label for="nb_reg">NB Reg:</label>
        <input type="number" name="nb_reg" value="0" required>
        <label for="maint">Maint:</label>
        <input type="number" name="maint" value="0" required>
        <label for="pcl">PCL:</label>
        <input type="number" name="pcl" value="0" required>
        <label for="refus_mc2">Refus MC2:</label>
        <input type="number" name="refus_mc2" value="0" required>
        <label for="production2">Production2:</label>
        <input type="number" name="production2" value="0" required>
        <label for="nb_reg2">NB Reg2:</label>
        <input type="number" name="nb_reg2" value="0" required>
        <label for="maint2">Maint2:</label>
        <input type="number" name="maint2" value="0" required>
        <label for="pcl2">PCL2:</label>
        <input type="number" name="pcl2" value="0" required>
        <label for="refus_mc3">Refus MC3:</label>
        <input type="number" name="refus_mc3" value="0" required>
        <label for="production3">Production3:</label>
        <input type="number" name="production3" value="0" required>
        <label for="nb_reg3">NB Reg3:</label>
        <input type="number" name="nb_reg3" value="0" required>
        <label for="maint3">Maint3:</label>
        <input type="number" name="maint3" value="0" required>
        <label for="pcl3">PCL3:</label>
        <input type="number" name="pcl3" value="0" required>
        <label for="refus_mc4">Refus MC4:</label>
        <input type="number" name="refus_mc4" value="0" required>
        <label for="production4">Production4:</label>
        <input type="number" name="production4" value="0" required>
        <label for="nb_reg4">NB Reg4:</label>
        <input type="number" name="nb_reg4" value="0" required>
        <label for="maint4">Maint4:</label>
        <input type="number" name="maint4" value="0" required>
        <label for="pcl4">PCL4:</label>
        <input type="number" name="pcl4" value="0" required>
        <label for="nb_carte_kanban">NB Carte Kanban:</label>
        <input type="number" name="nb_carte_kanban" value="0" required>
        <label for="nb_heures">NB Heures:</label>
        <input type="number" name="nb_heures" value="0" required>
        <label for="group">Group:</label>
        <select name="Group" required>
            <option value="S">Group S</option>
            <option value="M">Group M</option>
            <option value="N">Group N</option>
        </select>
        <input type="submit" value="Add Data">
    </form>
</body>
</html>