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
            background-color: orangered;
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
            background-color: red;
        }
        .alert {
            padding: 15px;
            background-color: orangered;
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

        /* Highlight row on click */
        .highlight {
            background-color:orangered !important;
        }
        @import url('https://fonts.googleapis.com/css?family=Roboto:700');

        #container {
            color: #999;
            text-transform: uppercase;
            font-size: 36px;
            font-weight: bold;
            padding-top: 200px;
            position: fixed;
            width: 100%;
            bottom: 0; /* Align to the bottom */
            left: 0; /* Align to the left */
            display: block;
        }

        #flip {
            height: 50px;
            overflow: hidden;
        }

        #flip > div > div {
            color: #fff;
            padding: 4px 12px;
            height: 45px;
            margin-bottom: 45px;
            display: inline-block;
        }

        #flip div:first-child {
            animation: show 5s linear infinite;
        }

        #flip div div {
            background: #42c58a;
        }

        #flip div:first-child div {
            background: #4ec7f3;
        }

        #flip div:last-child div {
            background: #DC143C;
        }

        @keyframes show {
            0% { margin-top: -270px; }
            5% { margin-top: -180px; }
            33% { margin-top: -180px; }
            38% { margin-top: -90px; }
            66% { margin-top: -90px; }
            71% { margin-top: 0px; }
            99.99% { margin-top: 0px; }
            100% { margin-top: -270px; }
        }

        p {
            position: fixed;
            width: 100%;
            bottom: 30px;
            font-size: 12px;
            color: #999;
            margin-top: 200px;
        }
    </style>
</head>
<body>
    <div id=container>
        Aptiv 
        <div id=flip>
          <div><div>ALWAYS DO THE </div></div>
          <div><div>RIGHT THINGS</div></div>
          <div><div>THE RIGHT WAY</div></div>
        </div>
        SR
      </div>
      
    <div class="logo-container">
        <!-- First image (default) -->
        <img src="{{ asset('logo.png') }}" alt="Aptiv Image" class="first">

        <!-- Second image (hover image) -->
        <img src="{{ asset('aptiv.png') }}" alt="Aptiv Image" class="second">
    </div>
    <h1 style="text-align: center; margin-top: 0;">Welcome To Contre Maitre Interface</h1>
    <h1>Cutting Area G2</h1>
    <h3>Fill in the form below to record the daily production of the Cutting Area:</h3>
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
            <th>fill</th>
            <th>scrap pic</th>
            <th>terminal</th>
        </thead>
        <tbody>
            <form action="{{ route('composotwouser.store') }}" method="post">
                @csrf
                <input type="hidden" name="namecm" value="{{Auth::user()->name}}">
                <input type="hidden" name="group" value="{{ $group }}">
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
                    <td><input type="number" name="totalscrapemachine[]" value="0" readonly></td>
                    <td><input type="number" name="fill[]" value="0" readonly></td>
                    <td><input type="number" name="scrappic[]" value="0" readonly></td>
                    <td><input type="number" name="terminal[]" value="0" readonly></td>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const echantilliondecfaInputs = document.querySelectorAll('input[name="echantilliondecfa[]"]');
                            const echantilliondereglageInputs = document.querySelectorAll('input[name="echantilliondereglage[]"]');
                            const refusmachineInputs = document.querySelectorAll('input[name="refusmachine[]"]');
                            const refusqualiteInputs = document.querySelectorAll('input[name="refusqualite[]"]');
                            const refusprototypeInputs = document.querySelectorAll('input[name="refusprototype[]"]');
                            const totalscrapemachineInputs = document.querySelectorAll('input[name="totalscrapemachine[]"]');
                            const fillInputs = document.querySelectorAll('input[name="fill[]"]');
                            const scrappicInputs = document.querySelectorAll('input[name="scrappic[]"]');
                            const terminalInputs = document.querySelectorAll('input[name="terminal[]"]');
                            const metalInputs = document.querySelectorAll('input[name="metal[]"]');

                            function calculateScrapAndFill() {
                                for (let i = 0; i < fillInputs.length; i++) {
                                    const echantilliondecfa = parseFloat(echantilliondecfaInputs[i].value) || 0;
                                    const echantilliondereglage = parseFloat(echantilliondereglageInputs[i].value) || 0;
                                    const refusmachine = parseFloat(refusmachineInputs[i].value) || 0;
                                    const refusqualite = parseFloat(refusqualiteInputs[i].value) || 0;
                                    const refusprototype = parseFloat(refusprototypeInputs[i].value) || 0;
                                    const metal = parseFloat(metalInputs[i].value) || 0;

                                    const totalscrapemachine = echantilliondecfa + echantilliondereglage + refusmachine + refusqualite + refusprototype;
                                    totalscrapemachineInputs[i].value = totalscrapemachine;

                                    fillInputs[i].value = totalscrapemachine;
                                    scrappicInputs[i].value = refusprototype;
                                    terminalInputs[i].value = metal;
                                }
                            }

                            const inputs = [...echantilliondecfaInputs, ...echantilliondereglageInputs, ...refusmachineInputs, ...refusqualiteInputs, ...refusprototypeInputs, ...metalInputs];
                            inputs.forEach(input => input.addEventListener('input', calculateScrapAndFill));

                            calculateScrapAndFill();
                        });
                    </script>
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
