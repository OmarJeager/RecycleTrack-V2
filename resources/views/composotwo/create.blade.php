<style>
    /* General Body Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7f6;
        color: #333;
        padding: 20px;
    }
    
    /* Table Container */
    .table-container {
        overflow-x: auto;
        overflow-y: auto; /* Allow vertical scrolling */
        position: relative;
        max-height: 500px; /* Set maximum height for scrolling */
    }
    
    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    
    /* Table Header (Sticky) */
    th, td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }
    
    th {
        background-color: orangered;
        color: white;
        position: sticky;
        top: 0;
        z-index: 2;
    }
    
    th:first-child, td:first-child {
        position: sticky;
        left: 0;
        background-color: #f4f7f6;
        z-index: 1;
    }
    
    /* Form Input Fields */
    input[type="number"], input[type="text"], select {
        width: 100px;
        padding: 8px;
        margin: 5px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
    
    /* Button Styling */
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
    
    /* Success Alert */
    .alert {
        padding: 15px;
        background-color: orangered;
        color: white;
        margin-bottom: 20px;
        border-radius: 5px;
    }
    
    /* Highlight Row on Click */
    .highlight {
        background-color: orangered !important;
    }
    
    /* Logo Container Styling */
    .logo-container {
        position: relative;
        width: 150px;
        height: auto;
    }
    
    .logo-container img {
        position: absolute;
        width: 150px;
        height: auto;
        transition: opacity 0.3s ease-in-out;
    }
    
    /* Second Image (Hover) */
    .logo-container img.second {
        opacity: 0;
    }
    
    .logo-container:hover .first {
        opacity: 0;
    }
    
    .logo-container:hover .second {
        opacity: 1;
    }
    
    /* Flip Text Animation */
    #container {
           background-color: #f4f7f6;      color: #333;      padding: 20px;  }   padding-top: 200px;
        position: fixed;
        width: 100%;
        bottom: 0;
       .table-container {   display: block;
        position: relative;
    
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
    
    /* Footer Text */
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
        <h1>Cutting Area G</h1>
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
    
        <div class="table-container">
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
                            <td><input type="number" name="objnbreg[]" step="any"></td>
                            <td><input type="number" name="nbreg[]" step="any"></td>
                            <td><input type="number" name="production[]" step="any"></td>
                            <td><input type="number" name="dpndebobine[]" step="any"></td>
                            <td><input type="number" name="mp[]" step="any"></td>
                            <td><input type="number" name="tempsmort[]" step="any"></td>
                            <td><input type="number" name="mce[]" step="any"></td>
                            <td><input type="number" name="reglage[]" step="any"></td>
                            <td><input type="number" name="process[]" step="any"></td>
                            <td><input type="number" name="nbdeafaut[]" step="any"></td>
                            <td><input type="number" name="nbheures[]" step="any"></td>
                            <td><input type="number" name="metal[]" step="any"></td>
                            <td><input type="number" name="echantilliondecfa[]" step="any"></td>
                            <td><input type="number" name="echantilliondereglage[]" step="any"></td>
                            <td><input type="number" name="refusmachine[]" step="any"></td>
                            <td><input type="number" name="refusqualite[]" step="any"></td>
                            <td><input type="number" name="refusprototype[]" step="any"></td>
                            <td><input type="number" name="totalscrapemachine[]" step="any" readonly></td>
                            <td><input type="number" name="fill[]" step="any" readonly></td>
                            <td><input type="number" name="scrappic[]" step="any" readonly></td>
                            <td><input type="number" name="terminal[]" step="any" readonly></td>
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
                        <button type="submit" class="btn-large" style="padding: 15px 30px; font-size: 18px;">Save</button>
                    </form>
                </tbody>
            </table>
        </div>
        </div>
        <a href="{{ route('composetwo.index') }}" class="btn-large">Display Data</a>
        <a href="{{ route('admin.create') }}" class="btn-large">Back to Dashboard</a>
        <style>
            .btn-large {
                padding: 10px 20px;
                background-color: orangered;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.3s ease;
                text-decoration: none; /* Remove underline */
                display: inline-block;
            }
    
            .btn-large:hover {
                background-color: red;
                transform: scale(1.05);
            }
        </style>
    </body>
    </html>
    