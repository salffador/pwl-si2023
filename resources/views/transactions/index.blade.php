<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Transaction List</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                   <a href="{{ route('transactions.create') }}" class="btn btn-md btn-success mb-3">ADD TRANSACTION</a>
                   <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Nama Kasir</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Kategori Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->tanggal_transaksi }}</td>
                                <td>{{ $transaction->nama_kasir ?? 'Product not found' }}</td>
                                <td>{{ $transaction->title }}</td>
                                <td>{{ $transaction->product_category_name }}</td>
                                <td>{{ $transaction->price }}</td>
                                <td>{{ $transaction->jumlah_pembelian }}</td>
                                <td>{{ $transaction->total_harga }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Are you sure?');" action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                                        <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                            <tr>
                                <td colspan="6" class="text-center">No transactions available.</td>
                            </tr>
                          @endforelse
                      </tbody>
                   </table>
                   {{ $transactions->links() }}
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
