<!-- filepath: /C:/Eren/Laravel/GestionScrape/resources/views/admin/sertissage/edit.blade.php -->
<div class="container">
    <h1>Update Crimping Machine</h1>
    <form action="{{ route('sertissage.update', $sertissage->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="machines" value="{{ old('name', $sertissage->machines) }}" required>
            @if ($errors->has('machines'))
                <span class="text-danger">{{ $errors->first('machines') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .container:hover {
        transform: scale(1.02);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .text-danger {
        color: #dc3545;
    }
</style>