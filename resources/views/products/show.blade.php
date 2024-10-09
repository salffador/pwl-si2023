<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #dfe6e9;
            color: #333;
            transition: background 0.3s, color 0.3s;
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            background-color: #ffffff;
        }
        .card:hover {
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            color: #2c3e50;
        }
        h3 {
            color: #2980b9;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        img {
            border-radius: 10px;
            transition: transform 0.3s;
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }
        img:hover {
            transform: scale(1.05);
        }
        p {
            color: #34495e;
        }
        hr {
            border-top: 1px solid #bdc3c7;
        }
        code {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <h3>Show Product</h3>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/images/' . $product->image) }}" class="rounded">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $product->title }}</h3>
                        <hr>
                        <p>Category : {{ $product->product_category_name }}</p>
                        <hr>
                        <p>Supplier : {{ $product->supplier_name }}</p>
                        <hr>
                        <p>
                            <code>RP {{ number_format($product->price, 2, ',', '.') }}</code>
                        </p>
                        <hr>
                        <p>{!! $product->description !!}</p>
                        <p>Stock : {{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
