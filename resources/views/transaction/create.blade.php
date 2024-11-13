<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Transaksi</title>
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

        table {
            width: 100%;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Tambah Transaksi</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="transactionForm" action="{{ route('transaction.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nama_kasir">Nama Kasir:</label>
                                <input type="text" class="form-control @error('nama_kasir') is-invalid @enderror" id="nama_kasir" name="nama_kasir" placeholder="Enter Nama Kasir" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tanggal_transaksi">Tanggal Transaksi:</label>
                                <input type="datetime-local" class="form-control @error('tanggal_transaksi') is-invalid @enderror" id="tanggal_transaksi" name="tanggal_transaksi" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Detail Produk:</label>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Jumlah Pembelian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="item_details">
                                        <tr>
                                            <td>
                                                <select class="form-control" id="product_id" name="items[0][id]" required>
                                                    @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" name="items[0][quantity]" class="form-control" required /></td>
                                            <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-success mt-3" id="add_item_btn">Add Item</button>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">Submit</button>
                            <button type="button" id="resetBtn" onclick="resetForm()" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let itemIndex = 1;

        document.getElementById('add_item_btn').addEventListener('click', function() {
            const table = document.getElementById('item_details');
            const newRow = table.insertRow();

            newRow.innerHTML = `
                <td>
                    <select class="form-control" name="items[${itemIndex}][id]" required>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control" required /></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
            `;
            itemIndex++;
        });

        function removeRow(button) {
            button.closest('tr').remove();
        }

        function resetForm() {
            document.getElementById("transactionForm").reset();
        }
    </script>
</body>
</html>
