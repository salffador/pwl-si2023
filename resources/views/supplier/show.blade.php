<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin-top: 40px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body img {
            border-radius: 10px;
            object-fit: cover;
        }

        h3 {
            color: #2980b9;
            font-weight: bold;
        }

        p {
            font-size: 1.1rem;
        }

        hr {
            border-top: 2px solid #ddd;
        }

    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <h3>Supplier Details</h3>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/images/' . $supplier->image) }}" class="rounded w-100">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $supplier->supplier_name }}</h3>
                        <hr>
                        <p><strong>Address:</strong> {{ $supplier->supplier_address }}</p>
                        <hr>
                        <p><strong>PIC Supplier:</strong> {{ $supplier->pic_supplier }}</p>
                        <hr>
                        <p><strong>PIC Number:</strong> {{ $supplier->pic_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
