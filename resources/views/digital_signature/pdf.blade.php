<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Signature PDF</title>
</head>
<body>
    <h1>Digital Signature untuk Mahasiswa</h1>
    <p>Nama: {{ $mahasiswa->nama }}</p>
    <p>Prodi: {{ $mahasiswa->prodi }}</p>
    <p>Status: {{ $mahasiswa->status }}</p>
    <div>{!! $qrCode !!}</div>
</body>
</html>
