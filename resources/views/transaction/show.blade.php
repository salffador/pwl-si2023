<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f2f6;
            color: #333;
            transition: background 0.3s, color 0.3s;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        h3 {
            color: #2980b9;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        p {
            margin: 0 0 10px;
            font-size: 16px;
        }

        hr {
            border-top: 1px solid #bdc3c7;
        }

        code {
            color: #e74c3c;
            font-size: 18px;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <h3>Detail Transaksi</h3>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4>Nama Kasir: {{ $transaction->nama_kasir }}</h4>
                        <hr>
                        <p><strong>Tanggal Transaksi:</strong> {{ $transaction->tanggal_transaksi }}</p>
                    </div>
                </div>

                @foreach ($transactionDetails as $product)
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <p><strong>Nama Produk:</strong> {{ $product['product_name'] }}</p>
                        <hr>
                        <p><strong>Kategori Produk:</strong> {{ $product['product_category_name'] }}</p>
                        <hr>
                        <p><strong>Harga:</strong> <code>RP {{ number_format($product['product_price'], 2, ',', '.') }}</code></p>
                        <hr>
                        <p><strong>Jumlah Pembelian:</strong> {{ $product['jumlah_pembelian'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <p><strong>Total Harga:</strong></p>
                        <p><code>RP {{ number_format($transaction->total_harga, 2, ',', '.') }}</code></p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <p><strong>Catatan:</strong></p>
                        <p>Anda dapat menghubungi admin jika ada pertanyaan lebih lanjut mengenai transaksi ini.</p>
                        <a href="{{ route('transaction.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
