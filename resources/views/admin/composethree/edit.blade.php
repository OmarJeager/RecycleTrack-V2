<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cutting G1 Machine</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .edit-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .edit-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .edit-button i {
            margin-right: 5px;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Cutting Area G3</h1>
        <form action="{{ route('coupethree.update', $sertissage->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="machines" value="{{ old('name', $sertissage->machines) }}" required>
            @if ($errors->has('machines'))
                <span class="text-danger">{{ $errors->first('machines') }}</span>
            @endif
            <button type="submit" class="edit-button">
                <i class="fas fa-edit"></i> Edit
            </button>
        </form>
    </div>
</body>
</html>