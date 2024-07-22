<!DOCTYPE html>
<html>

    <head>
        <title>Reminder Pembayaran Survei</title>
    </head>

    <body>
        <h1>Reminder Pembayaran Survei</h1>
        <p>Terima kasih telah melakukan request survei. Klik link berikut untuk melukan pembayaran request survei
            Anda :
            <a href="{{ route('detailSurvei.index', $survei) }}">Detail Request Survei</a>
        </p>
    </body>

</html>
