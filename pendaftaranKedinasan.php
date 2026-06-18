<?php
// PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik jalur Kedinasan
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor khusus untuk kelas anak
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $sk = null, $sponsor = null) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->skIkatanDinas = $sk;
        $this->instansiSponsor = $sponsor;
    }

    // Getter untuk properti spesifik
    public function getSkIkatanDinas() { return $this->skIkatanDinas; }
    public function getInstansiSponsor() { return $this->instansiSponsor; }

    // Implementasi Abstract Method 1: Hitung Total Biaya (Contoh: Jalur kedinasan dibayari penuh oleh sponsor/instansi alias gratis)
    public function hitungTotalBiaya() {
        return 0; // Rp 0,- (Ditanggung Instansi)
    }

    // Implementasi Abstract Method 2: Tampilkan Info Jalur
    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan (Ikatan Dinas) | No SK: " . $this->skIkatanDinas . " | Instansi: " . $this->instansiSponsor;
    }

    // Metode Query Spesifik untuk Jalur Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarKedinasan = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarKedinasan[] = new PendaftaranKedinasan(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['sk_ikatan_dinas'],
                $row['instansi_sponsor']
            );
        }
        return $daftarKedinasan;
    }
}
?>