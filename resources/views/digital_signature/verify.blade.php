<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Digital Signature</title>
</head>
<body>
    <h1>Verifikasi Digital Signature</h1>
    <form action="/digital-signature/verify" method="POST">
        @csrf
        <label for="qr_data">Data QR:</label>
        <textarea name="qr_data" id="qr_data" cols="30" rows="5"></textarea>
        <button type="submit">Verifikasi</button>
    </form>
</body>
</html>
