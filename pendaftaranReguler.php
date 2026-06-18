<?php
// PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik jalur Reguler
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor khusus untuk kelas anak
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $prodi = null, $kampus = null) {
        // Memanggil constructor dari abstract class induk (Pendaftaran)
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->pilihanProdi = $prodi;
        $this->lokasiKampus = $kampus;
    }

    // Getter untuk properti spesifik
    public function getPilihanProdi() { return $this->pilihanProdi; }
    public function getLokasiKampus() { return $this->lokasiKampus; }

    // Implementasi Abstract Method 1: Hitung Total Biaya (Reguler tidak ada diskon)
    // Implementasi Overriding Tahap 5
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    // Implementasi Abstract Method 2: Tampilkan Info Jalur
    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Reguler | Program Studi: " . $this->pilihanProdi . " | Kampus: " . $this->lokasiKampus;
    }

    // Metode Query Spesifik untuk Jalur Reguler
    public static function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_school = asal_school, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_kampus 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarReguler = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Membuat objek dari hasil query database
            $daftarReguler[] = new PendaftaranReguler(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['pilihan_prodi'],
                $row['lokasi_kampus']
            );
        }
        return $daftarReguler;
    }
}
?>