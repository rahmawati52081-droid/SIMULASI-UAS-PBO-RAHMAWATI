<?php
// index.php

// 1. Load semua file yang dibutuhkan
require_once 'database.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 2. Inisialisasi koneksi database
$database = new Database();
$db = $database->getConnection();

// 3. Ambil data secara dinamis menggunakan metode query spesifik dari tiap kelas anak
$dataReguler   = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftaran Mahasiswa Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; }
        h1 { text-align: center; color: #333; }
        h2 { color: #2c3e50; margin-top: 40px; border-bottom: 2px solid #2c3e50; padding-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #2c3e50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .text-center { text-align: center; }
        .price { font-weight: bold; color: #27ae60; }
    </style>
</head>
<body>

    <h1>SISTEM INFORMASI PENDAFTARAN MAHASISWA BARU</h1>
    <p class="text-center">Riwayat Data Calon Mahasiswa - Simulasi UAS PBO Rahmawati</p>

    <h2>1. Jalur Reguler</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Informasi Spesifik Jalur (Polimorfisme)</th>
                <th>Total Biaya Akhir (Polimorfisme)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataReguler)): ?>
                <tr><td colspan="7" class="text-center">Tidak ada data jalur Reguler.</td></tr>
            <?php else: ?>
                <?php foreach ($dataReguler as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getIdPendaftaran(); ?></td>
                        <td><?= $mhs->getNamaCalon(); ?></td>
                        <td><?= $mhs->getAsalSekolah(); ?></td>
                        <td><?= $mhs->getNilaiUjian(); ?></td>
                        <td>Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                        <td><em><?= $mhs->tampilkanInfoJalur(); ?></em></td>
                        <td class="price">Rp <?= number_format($mhs->hitungTotalBiaya(), 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <h2>2. Jalur Prestasi (Potongan Rp50.000)</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Informasi Spesifik Jalur (Polimorfisme)</th>
                <th>Total Biaya Akhir (Polimorfisme)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataPrestasi)): ?>
                <tr><td colspan="7" class="text-center">Tidak ada data jalur Prestasi.</td></tr>
            <?php else: ?>
                <?php foreach ($dataPrestasi as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getIdPendaftaran(); ?></td>
                        <td><?= $mhs->getNamaCalon(); ?></td>
                        <td><?= $mhs->getAsalSekolah(); ?></td>
                        <td><?= $mhs->getNilaiUjian(); ?></td>
                        <td>Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                        <td><em><?= $mhs->tampilkanInfoJalur(); ?></em></td>
                        <td class="price">Rp <?= number_format($mhs->hitungTotalBiaya(), 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <h2>3. Jalur Kedinasan (Surcharge Administrasi 25%)</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Biaya Dasar</th>
                <th>Informasi Spesifik Jalur (Polimorfisme)</th>
                <th>Total Biaya Akhir (Polimorfisme)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataKedinasan)): ?>
                <tr><td colspan="7" class="text-center">Tidak ada data jalur Kedinasan.</td></tr>
            <?php else: ?>
                <?php foreach ($dataKedinasan as $mhs): ?>
                    <tr>
                        <td><?= $mhs->getIdPendaftaran(); ?></td>
                        <td><?= $mhs->getNamaCalon(); ?></td>
                        <td><?= $mhs->getAsalSekolah(); ?></td>
                        <td><?= $mhs->getNilaiUjian(); ?></td>
                        <td>Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 2, ',', '.'); ?></td>
                        <td><em><?= $mhs->tampilkanInfoJalur(); ?></em></td>
                        <td class="price">Rp <?= number_format($mhs->hitungTotalBiaya(), 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>