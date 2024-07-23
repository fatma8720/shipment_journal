<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipments Index</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Shipments List</h1>

        <a href="{{ route('shipments.create') }}" class="btn btn-primary mb-3">Create New Shipment</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Code</th>
                    <th>Shipper</th>
                    <th>Image</th>
                    <th>Weight</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Created On</th>
                    <th>Updated On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shipments as $shipment)
                <tr>
                    <td>{{ $shipment->code }}</td>
                    <td>{{ $shipment->shipper }}</td>
                    <td>
                        @if($shipment->image)
                         <img src="{{ asset('storage/' . $shipment->image) }}" alt="Image" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $shipment->weight }}</td>
                    <td>{{ $shipment->description }}</td>
                    <td>${{ $shipment->price }}</td>
                    <td>
                        <form action="{{ route('shipments.changeStatus', $shipment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <select name="status" class="form-control form-control-sm" onchange="this.form.submit()" {{ $shipment->status == 'Done' ? 'disabled' : '' }}>
                                <option value="Pending" {{ $shipment->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Progress" {{ $shipment->status == 'Progress' ? 'selected' : '' }}>Progress</option>
                                <option value="Done" {{ $shipment->status == 'Done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </form>
                    </td>
                    <td>{{ $shipment->created_at }}</td>
                    <td>{{ $shipment->updated_at }}</td>
                    <td>
                        <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ url('/') }}" class="btn btn-secondary">Back to Home</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
