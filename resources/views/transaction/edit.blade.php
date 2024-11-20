<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        table th, table td {
            text-align: center;
            padding: 10px;
            vertical-align: middle;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        table tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
        }
        table tbody tr:nth-child(even) {
            background-color: #e9ecef;
        }
        #add_item_btn {
            margin-top: 10px;
        }
        .btn-remove {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-remove:hover {
            background-color: #c82333;
        }
        .btn-update {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-update:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <h3 class="text-center mb-4">Edit Transaksi</h3>
            <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_kasir" class="form-label">Nama Kasir:</label>
                    <input type="text" class="form-control" id="nama_kasir" name="nama_kasir" value="{{ $transaction->nama_kasir }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi:</label>
                    <input type="datetime-local" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ $transaction->tanggal_transaksi }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email_pembeli">Email Pembeli:</label>
                    <input type="email" class="form-control @error('email_pembeli') is-invalid @enderror" id="email_pembeli" name="email_pembeli" placeholder="Enter Email Pembeli" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Detail Produk:</label>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah Pembelian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="item_details">
                            @foreach($transactionDetails as $detail)
                            <tr>
                                <td>
                                    <select class="form-control" id="product_id" name="items[{{$loop->index}}][id]" required>
                                        <option value="{{ $detail->product_id }}">{{ $detail->product_name }}</option>
                                    </select>
                                </td>
                                <td><input type="number" class="form-control" name="items[{{$loop->index}}][quantity]" value="{{$detail->jumlah_pembelian}}" required/></td>
                                <td><button type="button" class="btn-remove" onclick="removeRow(this)">Remove</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" id="add_item_btn" class="btn btn-primary">+ Add Item</button>
                </div>

                <button type="submit" class="btn btn-update">Update Transaksi</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let itemIndex = document.getElementById('item_details').rows.length;

        document.getElementById('add_item_btn').addEventListener('click', function() {
            const table = document.getElementById('item_details');
            const newRow = table.insertRow();

            newRow.innerHTML = `
                <td>
                    <select class="form-control" name="items[${itemIndex}][id]" required>
                        @foreach ($products as $product )
                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" class="form-control" name="items[${itemIndex}][quantity]" required/></td>
                <td><button type="button" class="btn-remove" onclick="removeRow(this)">Remove</button></td>
            `;
            itemIndex++;
        });

        function removeRow(button) {
            button.closest('tr').remove();
        }
    </script>
</body>
</html>
