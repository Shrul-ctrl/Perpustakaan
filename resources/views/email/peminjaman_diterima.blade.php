<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan - Kirim Email</title>
</head>
<body>
    {{-- email/peminjaman_diterima.blade.php --}}
    <h1>Peminjaman Diterima</h1>
    <p>Nama Peminjam: {{$peminjaman->user->name }}</p>
    <p>Buku yang Dipinjam: {{ $peminjaman->buku->judul }}</p>
    <p>Tanggal Pinjam: {{ $peminjaman->tanggal_pinjam }}</p>
    <p>Batas Pengembalian: {{ $peminjaman->batas_pinjam }}</p>
    <!-- Tambahkan detail lain sesuai kebutuhan -->
    </ul>
</body>

</html>