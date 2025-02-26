<div class="container" style="max-width: 600px; margin-top: 50px;">
    <h1 style="text-align: center; margin-bottom: 30px;">Create Machine</h1>
    <form action="{{ route('composofour.store') }}" method="POST" style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @csrf
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="name" style="font-weight: bold;">Machine Name</label>
            <input type="text" class="form-control" id="name" name="machines" required style="padding: 10px; border-radius: 4px; border: 1px solid #ccc;">
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; border-radius: 4px;">Create Machine</button>
    </form>
</div>
<div style="background-color: red; padding: 20px; border-radius: 8px; margin-top: 20px;">
    <div class="alert alert-warning" role="alert" style="font-size: 18px; color: white;">
        <strong>Warning:</strong> Deleting a machine will remove it from the database permanently, and you will not be able to access its information again.
    </div>
</div>
<div style="display: flex; justify-content: center; margin-top: 30px;">
    <table style="width: 80%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <thead style="background-color: #007bff; color: white;">
            <tr>
                <th style="padding: 10px; text-align: left;">Machine Name</th>
                <th style="padding: 10px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($machines as $machine)
                <tr style="background-color: #f9f9f9; transition: background-color 0.3s;">
                    <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $machine->machines }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ccc;">
                        <a href="{{ route('coupefour.edit', [$machine->id]) }}" style="background-color: #ffc107; color: white; padding: 5px 10px; border-radius: 4px; border: none; cursor: pointer; text-decoration: none; transition: background-color 0.3s;">Edit</a>
                        <form action="{{ route('coupefour.delete', [$machine->id]) }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete('{{ $machine->machines }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 4px; border: none; cursor: pointer; transition: background-color 0.3s;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    table tbody tr:hover {
        background-color: #e9ecef;
    }
    a:hover {
        background-color: #e0a800;
    }
    button:hover {
        background-color: #c82333;
    }
</style>
<script>
    function confirmDelete(machineName) {
        return confirm('Are you sure you want to delete the machine: ' + machineName + '?');
    }
</script>