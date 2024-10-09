<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            transition: background-color 0.3s, color 0.3s;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .table {
            margin-bottom: 0; /* Menghilangkan margin bawah pada tabel */
        }
        .table tbody tr:hover {
            background-color: #e9ecef; /* Efek hover pada baris tabel */
        }
        .text-header {
            font-size: 2rem;
            font-weight: bold;
            color: #495057; /* Warna teks default */
            text-align: center;
            margin-bottom: 20px;
        }
        .dark-mode .text-header {
            color: white; /* Mengubah warna teks header menjadi putih di mode gelap */
        }
        .table th {
            background-color: #007bff;
            color: #fff;
        }
        .table img {
            max-width: 120px;
            border-radius: 5px;
        }
        .btn {
            transition: background-color 0.3s, transform 0.3s;
            padding: 10px 15px; /* Memperbesar tombol */
            font-size: 0.9rem; /* Memperbesar ukuran font tombol */
        }
        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        /* Gaya untuk mode gelap */
        .dark-mode {
            background-color: #343a40; /* Background gelap */
            color: #e9ecef; /* Warna teks terang */
        }
        .dark-mode .card {
            background-color: #495057; /* Background card gelap */
            border-color: #6c757d; /* Border card yang lebih gelap */
        }
        .dark-mode .card .text-dark {
            color: black !important; /* Memastikan teks di dalam card tetap hitam */
        }
        .dark-mode .table th {
            background-color: #007bff; /* Header tabel tetap biru */
            color: #fff; /* Teks header tetap putih */
        }
        .dark-mode .table tbody tr:hover {
            background-color: #6c757d; /* Efek hover pada tabel di mode gelap */
        }
        .dark-mode .btn {
            background-color: #6c757d; /* Tombol abu-abu di mode gelap */
            color: #fff; /* Teks tombol putih */
        }
        .dark-mode .btn:hover {
            background-color: #5a6268; /* Tombol hover di mode gelap */
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-header">Product Management</h3>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <a href="{{ route('products.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                </div>

                <!-- Toggle button for dark mode -->
                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" id="modeSwitch">
                    <label class="form-check-label" for="modeSwitch">dark mode</label>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td class="text-center">
                                <img src="{{ asset('/storage/images/'.$product->image) }}" class="img-fluid">
                            </td>
                            <td class="text-dark">{{ $product->title }}</td> <!-- Tambahkan kelas text-dark -->
                            <td class="text-dark">{{ $product->product_category_name }}</td> <!-- Tambahkan kelas text-dark -->
                            <td class="text-dark">{{ "Rp " . number_format($product->price, 2, ',', '.') }}</td> <!-- Tambahkan kelas text-dark -->
                            <td class="text-dark">{{ $product->stock }}</td> <!-- Tambahkan kelas text-dark -->
                            <td class="text-center">
                                <form onsubmit="return confirm('Are you sure you want to delete this product?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm me-2">
                                        <i class="fas fa-eye"></i> Show
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="alert alert-warning">No products available.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Sweetalert message
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "Success",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // Toggle dark mode
        const modeSwitch = document.getElementById('modeSwitch');
        modeSwitch.addEventListener('change', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
