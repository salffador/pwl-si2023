<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8; 
            color: #333; 
        }

        .container {
            max-width: 800px;
            margin-top: 40px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background-color: #ffffff;
            padding: 30px;
        }

        .form-group label {
            font-weight: bold;
            color: #2c3e50;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-warning {
            background-color: #f39c12;
            border: none;
        }

        .btn-primary:hover, .btn-warning:hover {
            opacity: 0.9;
        }

        .form-control {
            border-radius: 5px;
        }

        h3 {
            color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Add New Supplier</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="supplierForm" action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">SUPPLIER NAME</label>
                                <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" placeholder="Enter Supplier Name">
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">SUPPLIER ADDRESS</label>
                                <input type="text" class="form-control @error('supplier_address') is-invalid @enderror" name="supplier_address" placeholder="Enter Supplier Address">
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PIC SUPPLIER</label>
                                <input type="text" class="form-control @error('pic_supplier') is-invalid @enderror" name="pic_supplier" placeholder="Enter PIC Supplier">
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PIC NUMBER</label>
                                <input type="text" class="form-control @error('pic_number') is-invalid @enderror" name="pic_number" placeholder="Enter PIC Number">
                            </div>
                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="button" id="resetBtn" onclick="resetForm()" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function resetForm() {
            document.getElementById("supplierForm").reset();
        }
    </script>
</body>
</html>
