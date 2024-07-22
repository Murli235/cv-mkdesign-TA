<!DOCTYPE html>
<html>

    <head>
        <title>Reminder Pembayaran Pemesanan</title>
    </head>

    <body>
        <h1>Reminder Pembayaran Pemesanan</h1>
        <p>Terima kasih telah melakukan pemesanan. Klik link berikut untuk melihat detail pemesanan Anda : <a
                href="{{ route('finishPemesanan.index', $pemesanan) }}">Detail Pemesanan</a>
        </p>
    </body>

</html>
