<!DOCTYPE html>
<html>

    <head>
        <title>Pemesanan Berhasil</title>
    </head>

    <body>
        <h1>Pemesanan Berhasil</h1>
        <p>Terima kasih telah melakukan pemesanan. Klik link berikut untuk melihat detail pemesanan Anda : <a
                href="{{ route('finishPemesanan.index', $pemesanan) }}">Detail Pemesanan</a>
        </p>
    </body>

</html>
