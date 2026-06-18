<?php
// PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik jalur Prestasi
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor khusus untuk kelas anak
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $jenis = null, $tingkat = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenis;
        $this->tingkatPrestasi = $tingkat;
    }

    // Getter untuk properti spesifik
    public function getJenisPrestasi() { return $this->jenisPrestasi; }
    public function getTingkatPrestasi() { return $this->tingkatPrestasi; }

    // Implementasi Abstract Method 1: Hitung Total Biaya (Contoh simulasi: potongan 50% untuk tingkat Internasional/Nasional)
    public function hitungTotalBiaya() {
        if ($this->tingkatPrestasi == 'Internasional' || $this->tingkatPrestasi == 'Nasional') {
            return $this->biayaPendaftaranDasar * 0.5; // Diskon 50%
        }
        return $this->biayaPendaftaranDasar * 0.8; // Diskon 20% untuk tingkat Provinsi/Lainnya
    }

    // Implementasi Abstract Method 2: Tampilkan Info Jalur
    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Prestasi | Jenis: " . $this->jenisPrestasi . " | Tingkat: " . $this->tingkatPrestasi;
    }

    // Metode Query Spesifik untuk Jalur Prestasi
    public static function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarPrestasi = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarPrestasi[] = new PendaftaranPrestasi(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['jenis_prestasi'],
                $row['tingkat_prestasi']
            );
        }
        return $daftarPrestasi;
    }
}
?>