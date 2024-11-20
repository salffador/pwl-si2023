<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaksi</title>
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
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .text-header {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 40px;
            transition: color 0.3s;
        }

        .btn {
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-dark:hover {
            background-color: #2c3e50;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        table {
            transition: all 0.3s;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .alert-danger {
            margin: 20px 0;
            text-align: center;
        }

        /* Dark Mode Styling */
        .dark-mode {
            background-color: #000;
            color: #f1f2f6;
        }

        .dark-mode .text-header {
            color: #f5f6fa;
        }

        .dark-mode .card {
            background-color: #2f3640;
            border-color: #353b48;
        }

        .dark-mode .table th {
            background-color: #999;
            color: #fff;
        }

        .dark-mode .table tbody tr:hover {
            background-color: #57606f;
        }

        .dark-mode .btn {
            background-color: #57606f;
            color: #fff;
        }

        .dark-mode .btn:hover {
            background-color: #4b4b4b;
        }

        .dark-mode .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .dark-mode .btn-success:hover {
            background-color: #218838;
        }

        /* Custom dark mode for Detail and Delete buttons */
        .dark-mode .btn-dark {
            background-color: #34495e;
            color: #fff;
        }

        .dark-mode .btn-dark:hover {
            background-color: #2c3e50;
        }

        .dark-mode .btn-danger {
            background-color: #e74c3c;
            color: #fff;
        }

        .dark-mode .btn-danger:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-header">Transactions</h3>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <!-- Flex container for ADD TRANSACTION and Dark Mode switch -->
                <div class="d-flex justify-content-between mb-4">
                    <a href="{{ route('transaction.create') }}" class="btn btn-md btn-success">
                        <i class="fas fa-plus"></i> ADD TRANSACTION
                    </a>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="modeSwitch">
                        <label class="form-check-label" for="modeSwitch">Dark Mode</label>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Kasir</th>
                            <th style="width: 20%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->tanggal_transaksi }}</td>
                                <td>{{ $transaction->nama_kasir }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('transaction.destroy', $transaction->id) }}" method="POST">
                                        <a href="{{ route('transaction.show', $transaction->id) }}" class="btn btn-sm btn-dark">
                                            <i class="fas fa-eye"></i> DETAIL
                                        </a>
                                        <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> EDIT
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> DELETE
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger">Data transaksi belum tersedia.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        const modeSwitch = document.getElementById('modeSwitch');
        modeSwitch.addEventListener('change', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
