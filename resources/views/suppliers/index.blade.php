<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Suppliers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Mengatur lebar kolom Actions agar tombol tidak menjorok ke kanan */
        th:nth-child(6), td:nth-child(6) {
            width: 150px; /* Sesuaikan ukuran sesuai kebutuhan */
        }

        /* Untuk merapikan tombol ke kiri dalam kolom Actions */
        td .btn {
            margin-right: 5px; /* Tambahkan margin jika perlu */
            display: inline-block;
        }
    </style>
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Supplier List</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                   <a href="{{ route('suppliers.create') }}" class="btn btn-md btn-success mb-3">ADD SUPPLIER</a>
                   <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama Supplier</th>
                            <th scope="col">Alamat Supplier</th>
                            <th scope="col">PIC Supplier</th>
                            <th scope="col">No. HP PIC Supplier</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->id}}</td>
                                <td>{{ $supplier->supplier_name }}</td>
                                <td>{{ $supplier->alamat_supplier }}</td>
                                <td>{{ $supplier->pic_supplier }}</td>
                                <td>{{ $supplier->no_hp_pic_supplier }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Are you sure?');" action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                                        <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                            <tr>
                                <td colspan="5" class="text-center">No suppliers available.</td>
                            </tr>
                          @endforelse
                      </tbody>
                   </table>
                   {{ $suppliers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Message with SweetAlert
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
            title: "Failed!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
         });
    @endif
</script>
    
</body>
</html>
