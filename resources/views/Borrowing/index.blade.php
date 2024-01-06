<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Borrowing Perpustakaan</title>
    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Data Borrowing</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Data Borrowing Perpustakaan</h1>
        <a href="{{ route('borrowings.create') }}" class="btn btn-primary mb-3">Tambah Data Borrowing</a>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Book</th>
                    <th>Nama Borrower</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Harus Kembali</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowing as $item)
                    <tr>
                        <td>{{ $item->book ? $item->book->title : 'Judul Tidak Ditemukan' }}</td>
                        <td>{{ $item->borrower ? $item->borrower->nama : 'Borrower Tidak Ditemukan' }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tanggal_kembali }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and Popper.js (if needed) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
