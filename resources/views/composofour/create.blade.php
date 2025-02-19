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
            background-color: #218838;
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

    @if (session('success'))
        <div class="alert alert-success" style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <th>Machines</th>
            <th>Matricule</th>
            <th>Obj/NB reg</th>
            <th>nb reg</th>
            <th>production</th>
            <th>dpn de bobine </th>
            <th>mp</th>
            <th>temps mort </th>
            <th>mce</th>
            <th>reglage</th>
            <th>process</th>
            <th>nb defanut</th>
            <th>nb heures </th>
            <th>metal</th>
            <th>echanttion de cfa</th>
            <th>echantillon de raglage </th>
            <th>refus machine </th>
            <th>refus de qualite</th>
            <th> refus prototype </th>
            <th>total scrap machine </th>
        </thead>
        <tbody>
            <form action="{{ route('usercomposofour.store') }}" method="post">
                @csrf
                <input type="text" name="namecm" placeholder="contre maitre name">
                <select name="group" required>
                    <option value="">Choice ur group</option>
                    <option value="M">M</option>
                    <option value="S">S</option>
                    <option value="N">N</option>
                </select>
                @foreach ($machines as $m )
                <input type="hidden" name="name[]" value="{{$m->machines}}">
                <td><input type="hidden" name="machine_id[]" value="{{ $m->id }}"></td>
                <td><input type="hidden" name="date[]" value="{{ \Carbon\Carbon::now()->toDateString() }}"></td>
                <tr>
                    <td>{{ $m->machines }}</td>
                    <td><input type="number" name="matricule[]" value="0"></td>
                    <td><input type="number" name="objnbreg[]" value="0"></td>
                    <td><input type="number" name="nbreg[]" value="0"></td>
                    <td><input type="number" name="production[]" value="0"></td>
                    <td><input type="number" name="dpndebobine[]" value="0"></td>
                    <td><input type="number" name="mp[]" value="0"></td>
                    <td><input type="number" name="tempsmort[]" value="0"></td>
                    <td><input type="number" name="mce[]" value="0"></td>
                    <td><input type="number" name="reglage[]" value="0"></td>
                    <td><input type="number" name="process[]" value="0"></td>
                    <td><input type="number" name="nbdeafaut[]" value="0"></td>
                    <td><input type="number" name="nbheures[]" value="0"></td>
                    <td><input type="number" name="metal[]" value="0"></td>
                    <td><input type="number" name="echantilliondecfa[]" value="0"></td>
                    <td><input type="number" name="echantilliondereglage[]" value="0"></td>
                    <td><input type="number" name="refusmachine[]" value="0"></td>
                    <td><input type="number" name="refusqualite[]" value="0"></td>
                    <td><input type="number" name="refusprototype[]" value="0"></td>
                    <td><input type="number" name="totalscrapemachine[]" value="0"></td>

                </tr>
                @endforeach
                <input type="number" name="fill" value="0">
                <input type="number" name="scrappic" value="0">
                <input type="text" name="terminal" value="0">
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
