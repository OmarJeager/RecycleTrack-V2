<div class="container" style="max-width: 600px; margin-top: 50px;">
    <h1 style="text-align: center; margin-bottom: 30px;">Create Machine</h1>
    <form action="{{ route('torsado.store') }}" method="POST" style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @csrf
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="name" style="font-weight: bold;">Machine Name</label>
            <input type="text" class="form-control" id="name" name="machines" required style="padding: 10px; border-radius: 4px; border: 1px solid #ccc;">
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; border-radius: 4px;">Create Machine</button>
    </form>
</div>
