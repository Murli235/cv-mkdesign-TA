<!DOCTYPE html>
<html>

    <head>
        <title>Pengingat Pembayaran Pesanan</title>
    </head>

    <body>
        <h1>Pengingat Pembayaran Pesanan</h1>
        <p>Hai {{ $pemesanan->name }},</p>
        <p>Anda memiliki pesanan dengan detail berikut:</p>
        <p>Proyek: {{ $pemesanan->projectName }}</p>
        <p>Jumlah Tingkat: {{ $pemesanan->jumlah_tingkat }}</p>
        <p>Luas Bangunan: {{ $pemesanan->luas_bangunan }}</p>
        <p>Desain Tipe: {{ $pemesanan->designType }}</p>
        <p>Biaya: {{ $pemesanan->cost }}</p>
        <p>Status: {{ $pemesanan->status }}</p>
        <p>Mohon segera lakukan pembayaran untuk melanjutkan proses pesanan Anda.</p>
    </body>

</html>
