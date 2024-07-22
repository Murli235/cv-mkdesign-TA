<!DOCTYPE html>
<html>

    <head>
        <title>Request Survei Berhasil</title>
    </head>

    <body>
        <h1>Request Survei Berhasil</h1>
        <p>Terima kasih telah melakukan request survei. Klik link berikut untuk melihat detail request survei
            Anda :
            <a href="{{ route('detailSurvei.index', $survei) }}">Detail Request Survei</a>
        </p>
    </body>

</html>
