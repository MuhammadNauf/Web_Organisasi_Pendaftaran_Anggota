<?php
class Library
{
    public function __construct()
    {
        $host = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "pabmbugm2021";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    public function login($username)
    {
        $query = $this->db->prepare("SELECT * FROM akun WHERE username=?");
        $query->bindParam(1, $username);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function registerUser($username, $password)
    {
        // Hash the password using password_hash
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO akun (username, password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $passwordHash);
        
        if ($stmt->execute()) {
            return $this->login($username); // Mengambil user ID baru
        } else {
            return false;
        }
    }

    
    /*
    public function add_data($nama_siswa, $kelas, $alamat)
    {
        $data = $this->db->prepare('INSERT INTO tb_siswa (nama_siswa,kelas,alamat) VALUES (?, ?, ?)');
        
        $data->bindParam(1, $nama_siswa);
        $data->bindParam(2, $kelas);
        $data->bindParam(3, $alamat);
 
        $data->execute();
        return $data->rowCount();
    }
    */
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM form");
        $query->execute();
        return $query->fetchAll();
    }
 
    public function get_by_id($id)
    {
        $query = $this->db->prepare("SELECT * FROM form WHERE id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }
 
    public function update($id, $nim, $nama_lengkap, $nama_panggilan, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $golongan_darah, $tinggi_badan, $berat_badan, $hobi, $riwayat_penyakit, $alergi, $jenjang_studi, $fakultas, $prodi, $asal_sma, $nama_ortu, $no_ortu, $alamat_ortu, $no_telp, $email, $alamat, $jenis_tempat, $jam_malam, $id_line, $id_facebook, $id_instagram, $id_twitter, $bidang_tari, $bidang_musik, $organisasi, $pernah_mb, $unit_sebelumnya, $section, $kemampuan_alat, $interview)
    {
        $query = $this->db->prepare('UPDATE form SET nim=?, nama_lengkap=?, nama_panggilan=?, tempat_lahir=?, tanggal_lahir=?, jenis_kelamin=?, agama=?, golongan_darah=?, tinggi_badan=?, berat_badan=?, hobi=?, riwayat_penyakit=?, alergi=?, jenjang_studi=?, fakultas=?, prodi=?, asal_sma=?, nama_ortu=?, no_ortu=?, alamat_ortu=?, no_telp=?, email=?, alamat=?, jenis_tempat=?, jam_malam=?, id_line=?, id_facebook=?, id_instagram=?, id_twitter=?, bidang_tari=?, bidang_musik=?, organisasi=?, pernah_mb=?, unit_sebelumnya=?, section=?, kemampuan_alat=?, interview=? WHERE id=?');

        $query->bindParam(1, $nim);
        $query->bindParam(2, $nama_lengkap);
        $query->bindParam(3, $nama_panggilan);
        $query->bindParam(4, $tempat_lahir);
        $query->bindParam(5, $tanggal_lahir);
        $query->bindParam(6, $jenis_kelamin);
        $query->bindParam(7, $agama);
        $query->bindParam(8, $golongan_darah);
        $query->bindParam(9, $tinggi_badan);
        $query->bindParam(10, $berat_badan);
        $query->bindParam(11, $hobi);
        $query->bindParam(12, $riwayat_penyakit);
        $query->bindParam(13, $alergi);
        $query->bindParam(14, $jenjang_studi);
        $query->bindParam(15, $fakultas);
        $query->bindParam(16, $prodi);
        $query->bindParam(17, $asal_sma);
        $query->bindParam(18, $nama_ortu);
        $query->bindParam(19, $no_ortu);
        $query->bindParam(20, $alamat_ortu);
        $query->bindParam(21, $no_telp);
        $query->bindParam(22, $email);
        $query->bindParam(23, $alamat);
        $query->bindParam(24, $jenis_tempat);
        $query->bindParam(25, $jam_malam);
        $query->bindParam(26, $id_line);
        $query->bindParam(27, $id_facebook);
        $query->bindParam(28, $id_instagram);
        $query->bindParam(29, $id_twitter);
        $query->bindParam(30, $bidang_tari);
        $query->bindParam(31, $bidang_musik);
        $query->bindParam(32, $organisasi);
        $query->bindParam(33, $pernah_mb);
        $query->bindParam(34, $unit_sebelumnya);
        $query->bindParam(35, $section);
        $query->bindParam(36, $kemampuan_alat);
        $query->bindParam(37, $interview);
        $query->bindParam(38, $id);

        $query->execute();
        return $query->rowCount();
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM form WHERE id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->rowCount();
    }
}
?>