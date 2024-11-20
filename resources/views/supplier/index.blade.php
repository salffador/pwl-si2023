<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supplier Management</title>
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
            margin-bottom: 0;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .text-header {
            font-size: 2rem;
            font-weight: bold;
            color: #495057;
            text-align: center;
            margin-bottom: 20px;
        }
        .dark-mode .text-header {
            color: white;
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
            padding: 10px 15px;
            font-size: 0.9rem; 
        }
        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        /* Gaya untuk mode gelap */
        .dark-mode {
            background-color: #000; /* Mengubah latar belakang menjadi hitam */
            color: #e9ecef;
        }
        .dark-mode .card {
            background-color: #212529; /* Warna latar belakang kartu */
            border-color: #6c757d;
        }
        .dark-mode .text-dark {
            color: #e9ecef !important; /* Ganti warna teks untuk dark mode */
        }
        .dark-mode .table th {
            background-color: #007bff;
            color: #fff;
        }
        .dark-mode .table tbody tr:hover {
            background-color: #343a40; /* Warna saat hover di tabel */
        }
        .dark-mode .btn-info {
            background-color: #17a2b8;
            color: #fff;
        }
        .dark-mode .btn-info:hover {
            background-color: #138496;
        }
        .dark-mode .btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .dark-mode .btn-primary:hover {
            background-color: #0056b3;
        }
        .dark-mode .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .dark-mode .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-header">Supplier Management</h3>
        <div class="card">
            <div class="card-body">
                <!-- Perubahan ada di sini -->
                <div class="d-flex justify-content-between mb-4">
                    <a href="{{ route('supplier.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add Supplier
                    </a>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="modeSwitch">
                        <label class="form-check-label" for="modeSwitch">Dark Mode</label>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Supplier Address</th>
                            <th scope="col">PIC Supplier</th>
                            <th scope="col">PIC Number</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suppliers as $supplier)
                        <tr>
                            <td class="text-center">
                                <img src="{{ asset('/storage/images/'.$supplier->image) }}" class="img-fluid">
                            </td>
                            <td class="text-dark">{{ $supplier->supplier_name }}</td>
                            <td class="text-dark">{{ $supplier->supplier_address }}</td>
                            <td class="text-dark">{{ $supplier->pic_supplier }}</td>
                            <td class="text-dark">{{ $supplier->pic_number }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Are you sure you want to delete this supplier?');" action="{{ route('supplier.destroy', $supplier->id) }}" method="POST">
                                    <a href="{{ route('supplier.show', $supplier->id) }}" class="btn btn-info btn-sm me-2">
                                        <i class="fas fa-eye"></i> Show
                                    </a>
                                    <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-primary btn-sm me-2">
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
                                <div class="alert alert-warning">No suppliers available.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="d-flex justify-content-center">
                    {{ $suppliers->links() }}
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
