<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Surat Keterangan Hasil Belajar</title>
        <style>
            @page {
                margin: 50px 50px;
            }

            body {
                font-family: "Times New Roman", serif;
                font-size: 14px;
            }

            /* Kop Surat */
            .kop-surat {
                text-align: center;
                margin-bottom: 20px;
            }

            .kop-surat img {
                width: 100%;
                height: auto;
            }

            /* Konten */
            .header {
                text-align: center;
                font-size: 16px;
                font-weight: bold;
                margin-top: 20px;
            }

            .sub-header {
                text-align: center;
                font-size: 14px;
                margin-bottom: 20px;
            }

            .content {
                text-align: justify;
                margin-bottom: 20px;
            }

            /* Tabel - Menyesuaikan lebar konten dan di tengah */
            .table-container {
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .table {
                width: auto;
                border-collapse: collapse;
                margin: 10px auto;
                /* Ini akan membuat tabel benar-benar center */
            }


            .table td {
                padding: 8px 15px;
                border: 1px solid black;
                white-space: nowrap;
                /* Supaya konten tidak terlalu melebar */
            }

            /* Footer */
            .footer {
                margin-top: 30px;
                text-align: right;
            }

            /* Tanda Tangan */
            .signatures {
                margin-top: 50px;
                width: 100%;
                text-align: center;
            }

            .signatures table {
                width: 100%;
                margin-top: 10px;
            }

            .signatures td {
                width: 50%;
                text-align: center;
                vertical-align: top;
            }

            .signatures img {
                width: 120px;
                height: auto;
                margin-top: 5px;
            }
        </style>
    </head>

    <body>

        <!-- Kop Surat -->
        <div class="kop-surat">
            <img src="{{ public_path('img/Contoh-Kop-Surat-Sekolah.jpg') }}" alt="Kop Surat">
        </div>

        <div class="header">
            SURAT KETERANGAN HASIL BELAJAR
        </div>
        <div class="sub-header">
            Nomor: 312312
        </div>

        <div class="content">
            Yang bertanda tangan di bawah ini, <strong>Bapak John Doe</strong>, selaku Wali Kelas <strong>XII IPA
                1</strong> di <strong>SMAN 99 JAKARTA</strong>, dengan ini menerangkan bahwa:
        </div>

        <!-- Tabel Informasi Siswa -->
        <div class="table-container">
            <table class="table">
                <tr>
                    <td>Nama Siswa</td>
                    <td> Jane Doe</td>
                </tr>
                <tr>
                    <td>Nomor Induk (NISN)</td>
                    <td> 1234567890</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td> XII IPA 1</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td> Ganjil</td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td> 2024/2025</td>
                </tr>
            </table>
        </div>

        <p>
            Demikian surat keterangan ini diberikan untuk dapat digunakan sebagaimana mestinya.
        </p>

        <div class="footer">
            Jakarta, {{ now()->format('d F Y') }}
        </div>

        <!-- Tanda Tangan -->
        <div class="signatures">
            <table>
                <tr>
                    <td>Wali Kelas XII IPA 1</td>
                    <td>Kepala Sekolah SMAN 99 JAKARTA</td>
                </tr>
                <tr>
                    <td><img src="{{ public_path('img/ttd.jpeg') }}" alt="Tanda Tangan Wali"></td>
                    <td><img src="{{ public_path('img/ttd.jpeg') }}" alt="Stempel Sekolah"></td>
                </tr>
                <tr>
                    <td><strong>Bapak John Doe</strong></td>
                    <td><strong>Ibu Mary Smith</strong></td>
                </tr>
            </table>
        </div>

    </body>

</html>
