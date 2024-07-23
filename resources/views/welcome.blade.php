<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            color: #007bff; 
            text-align: center;
            margin-top: 8rem;
            margin-bottom: 6rem;
        }
        body {
            background-color: #f8f9fa; 
        }
        .card {
            background-color: #ffffff; 
            border: 1px solid #dee2e6;
            border-radius: .375rem; 
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15); 
        }
        .card-title {
            color: #007bff; 
        }
        .btn-primary {
            background-color: #007bff; 
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; 
            border-color: #004085; 
        }
        .container {
            margin-top: 2rem;
        }
        .card-body {
            padding: 2rem;
        }
        .row {
            margin: 0;
        }
        .col-md-6 {
            padding: 1rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Code Challenge</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Shipments List</h5>
                        <p class="card-text">View and manage all shipments.</p>
                        <a href="{{ route('shipments.index') }}" class="btn btn-primary">Go to Shipments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Journals</h5>
                        <p class="card-text">View and manage all journals.</p>
                        <a href="{{ route('journals.index') }}" class="btn btn-primary">Go to Journals</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
