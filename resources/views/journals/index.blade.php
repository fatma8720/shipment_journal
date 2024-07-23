<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journals Index</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Journals List</h1>
        <a href="{{ url('/') }}" class="btn btn-secondary mb-4">Back to Home</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Shipment ID</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Created On</th>
                    <th>Updated On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($journals as $journal)
                <tr>
                    <td>{{ $journal->shipment_id }}</td>
                    <td>${{ $journal->amount }}</td>
                    <td>{{ $journal->type }}</td>
                    <td>{{ $journal->created_at }}</td>
                    <td>{{ $journal->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
