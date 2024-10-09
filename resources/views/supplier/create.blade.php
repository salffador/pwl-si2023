<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Add New Supplier</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="supplierForm" action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Supplier Image -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            </div>

                            <!-- Supplier Name -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">SUPPLIER NAME</label>
                                <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" placeholder="Enter Supplier Name">
                            </div>

                            <!-- Supplier Address -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">SUPPLIER ADDRESS</label>
                                <input type="text" class="form-control @error('supplier_address') is-invalid @enderror" name="supplier_address" placeholder="Enter Supplier Address">
                            </div>

                            <!-- PIC Supplier -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PIC SUPPLIER</label>
                                <input type="text" class="form-control @error('pic_supplier') is-invalid @enderror" name="pic_supplier" placeholder="Enter PIC Supplier">
                            </div>

                            <!-- PIC Number -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">PIC NUMBER</label>
                                <input type="text" class="form-control @error('pic_number') is-invalid @enderror" name="pic_number" placeholder="Enter PIC Number">
                            </div>

                            <!-- Submit and Reset Buttons -->
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
            document.getElementById("supplierForm").reset(); // Reset all form values
        }
    </script>
</body>
</html>
