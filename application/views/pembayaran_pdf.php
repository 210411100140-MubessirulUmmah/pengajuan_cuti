<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 200mm;
            height: 80mm;
            padding: 10mm;
        }

        .header {
            text-align: center;
            font-size: 16pt;
            font-weight: bold;
        }

        .content {
            margin-top: 10mm;
            font-size: 12pt;
        }

        .footer {
            margin-top: 10mm;
            text-align: center;
            font-size: 14pt;
        }
    </style>
</head>

<body>
<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
    <?php foreach ($cuti as $i) : ?>
        <div class="container">
            <div class="header">
                <p>UNIVERSITAS TRUNOJOYO MADURA</p>
                <p>Struk Pembayaran</p>
            </div>

            <div class="content">
                <p>Tanggal: <?= tgl_indo($i['tgl_diajukan']) ?></p>
                <p>Nomor Cuti: <?= $i['id_cuti'] ?></p>
                <p>Nama: <?= $i['nama_lengkap'] ?></p>
                <p>Prodi: <?= $i['prodi'] ?></p>
                <p>Semester: <?= $i['semester'] ?></p>
                <p>Fakultas: <?= $i['fakultas'] ?></p>
                <p>Perihal Cuti: <?= $i['perihal_cuti'] ?></p>
                <p>Alasan: <?= $i['alasan'] ?></p>
                <p>Mulai: <?= tgl_indo($i['mulai']) ?></p>
                <p>Berakhir: <?= tgl_indo($i['berakhir']) ?></p>
            </div>

            <div class="footer">
                <p>Total Pembayaran: [YOUR_AMOUNT_HERE]</p>
                <!-- You may add a barcode or any additional information here -->
                <img src="https://example.com/barcode" alt="Barcode" width="150" height="50">
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>
