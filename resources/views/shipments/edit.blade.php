<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Shipment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Shipment</h1>
        <form action="{{ route('shipments.update', $shipment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" id="code" name="code" class="form-control" value="{{ old('code', $shipment->code) }}" required>
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="shipper">Shipper:</label>
                <input type="text" id="shipper" name="shipper" class="form-control" value="{{ old('shipper', $shipment->shipper) }}" required>
                @error('shipper')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control">
                @if($shipment->image)
                    <img src="{{ asset('storage/' . $shipment->image) }}" alt="Image" width="100">
                @endif
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="number" id="weight" name="weight" class="form-control" step="0.01" value="{{ old('weight', $shipment->weight) }}" required>
                @error('weight')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $shipment->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" 
                        @if ($shipment->status == 'Done') disabled @endif>
                    <option value="Pending" {{ old('status', $shipment->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Progress" {{ old('status', $shipment->status) == 'Progress' ? 'selected' : '' }}>Progress</option>
                    <option value="Done" {{ old('status', $shipment->status) == 'Done' ? 'selected' : '' }}>Done</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('shipments.index') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
