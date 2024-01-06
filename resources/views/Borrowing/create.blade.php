<!-- resources/views/borrowing/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Borrowing</title>
</head>
<body>
    <h1>Tambah Data Borrowing</h1>
    <form action="{{ route('borrowings.store') }}" method="post">
        @csrf
        <label for="id_book" class="form-label">Nama Book</label>
        <select name="id_book" id="id_book" class="form-select">
            <option value="" selected disabled>Pilih Book</option>
            @foreach ($books as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>
        <br>
        <label for="id_borrower" class="form-label">Nama Borrower</label>
        <select name="id_borrower" id="id_borrower" class="form-select">
            <option value="" selected disabled>Pilih Borrower</option>
            @foreach ($borrowers as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        <br>
        <label for="tanggal_pinjam">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required onchange="calculateReturnDate()">
        <br>
        <label for="tanggal_kembali">Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali" readonly required>
        <br>
        <button type="submit">Simpan</button>
    </form>

    <!-- Div untuk menampilkan data yang dipilih -->
    <div id="selected-data">
        <h2>Data yang Dipilih</h2>
        <p>Nama Book: <span id="selected-book"></span></p>
        <p>Nama Borrower: <span id="selected-borrower"></span></p>
        <p>Tanggal Pinjam: <span id="selected-pinjam"></span></p>
        <p>Tanggal Kembali: <span id="selected-kembali"></span></p>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
    @endif
    
    <script>
        function calculateReturnDate() {
            // Get the selected borrowing date
            const borrowingDate = new Date(document.getElementById('tanggal_pinjam').value);

            // Calculate the return date as 7 days from the borrowing date
            const returnDate = new Date(borrowingDate);
            returnDate.setDate(returnDate.getDate() + 7);

            // Format the return date as "YYYY-MM-DD"
            const formattedReturnDate = returnDate.toISOString().split('T')[0];

            // Set the value of the return date input
            document.getElementById('tanggal_kembali').value = formattedReturnDate;

            // Tampilkan data yang dipilih
            document.getElementById('selected-book').innerText = document.getElementById('id_book').options[document.getElementById('id_book').selectedIndex].text;
            document.getElementById('selected-borrower').innerText = document.getElementById('id_borrower').options[document.getElementById('id_borrower').selectedIndex].text;
            document.getElementById('selected-pinjam').innerText = document.getElementById('tanggal_pinjam').value;
            document.getElementById('selected-kembali').innerText = formattedReturnDate;
        }
    </script>
</body>
</html>
