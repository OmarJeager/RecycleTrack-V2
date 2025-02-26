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
        .container {
  position: relative;
  width: 50%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  background-color: orangered;
  overflow: hidden;
  width: 100%;
  height: 0;
  transition: .5s ease;
}

.container:hover .overlay {
  bottom: 0;
  height: 100%;
}

.text {
  white-space: nowrap; 
  color: white;
  font-size: 20px;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.btn-large {
            display: inline-block;
            padding: 15px 30px;
            font-size: 20px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-large:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div style="position: absolute; top: 10px; right: 10px;">
        <img src="{{ asset('developeby.png') }}" alt="Aptiv Image" style="width: 250px; height: 250px;" class="mt-2 mb-2 transition transform hover:scale-105">
    </div>
    <div style="text-align: center;">
        <div class="container">
            <img src="{{ asset('logo.png') }}"  alt="Avatar" class="image">
            <div class="overlay">
              <h1 class="text">ALWAYS DO THE RIGHT THINGS,THE RIGHT WAY</h1>
            </div>
          </div>
    </div>
    <h1 style="text-align: center; margin-top: 0;">Welcome To Contre Maitre Interface</h1>
    <h1>Twist Area</h1>
    <h2>Fill the form below to create a new Torsado:</h2>    
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
            <form action="{{ route('userto.storedata') }}" method="post">
                @csrf
                <input type="hidden" name="name_mc" value="{{Auth::user()->name}}" required>
                <input type="hidden" name="group" value="{{ $group }}">
                @foreach ($machines as $m )
                <input type="hidden" name="name[]" value="{{$m->machines}}">
                <td><input type="hidden" name="machine_id[]" value="{{ $m->id }}"></td>
                <td><input type="hidden" name="date[]" value="{{ \Carbon\Carbon::now()->toDateString() }}"></td>
                <tr>
                    <td>{{ $m->machines }}</td>
                    <td><input type="number" name="matricule[]" step="any"></td>
                    <td><input type="number" name="echantillon_cfa[]" step="any"></td>
                    <td><input type="number" name="refus_machine[]" step="any"></td>
                    <td><input type="number" name="refus_prototype[]" step="any"></td>
                    <td><input type="number" name="refus_mc[]" step="any"></td>
                    <td><input type="number" name="production[]" step="any"></td>
                    <td><input type="number" name="nb_reg[]" step="any"></td>
                    <td><input type="number" name="maint[]" step="any"></td>
                    <td><input type="number" name="pcl[]" step="any"></td>
                    <td><input type="number" name="refus_mc2[]" step="any"></td>
                    <td><input type="number" name="production2[]" step="any"></td>
                    <td><input type="number" name="nb_reg2[]" step="any"></td>
                    <td><input type="number" name="maint2[]" step="any"></td>
                    <td><input type="number" name="pcl2[]" step="any"></td>
                    <td><input type="number" name="refus_mc3[]" step="any"></td>
                    <td><input type="number" name="production3[]" step="any"></td>
                    <td><input type="number" name="nb_reg3[]" step="any"></td>
                    <td><input type="number" name="maint3[]" step="any"></td>
                    <td><input type="number" name="pcl3[]" step="any"></td>
                    <td><input type="number" name="refus_mc4[]" step="any"></td>
                    <td><input type="number" name="production4[]" step="any"></td>
                    <td><input type="number" name="nb_reg4[]" step="any"></td>
                    <td><input type="number" name="maint4[]" step="any"></td>
                    <td><input type="number" name="pcl4[]" step="any"></td>
                    <td><input type="number" name="nb_carte_kan[]" step="any"></td>
                    <td><input type="number" name="nb_heures[]" step="any"></td>
                </tr>
                @endforeach
                <button type="submit" class="btn-large">Save</button>
            </form>
        </tbody>
    </table>
    <a href="{{ route('admin.torsado') }}" class="btn-large">Dispaly Data</a>
    <a href="{{ route('dashboard') }}" class="btn-large"> back to dashboard</a>
</body>
</html>
