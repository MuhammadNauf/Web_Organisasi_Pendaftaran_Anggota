<?php 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_start();
include('library.php');
$lib = new Library();

if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
    //redirect to logout.php
    header('Location: logout.php'); //change yoursite.com to the name of you site!!
}
else{ //if we haven't expired:
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}

if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $data_siswa = $lib->get_by_id($id);
}
else
{
    header('Location: admin.php');
}

if(isset($_POST['tombol_update'])){
    $id = $_POST['id'];
    $nim = $_POST[ 'f-nim2' ] ?? '';                       
    $nama_lengkap= $_POST[ 'f-namalengkap2' ] ?? '';                 
    $nama_panggilan= $_POST[ 'f-namapanggilan' ] ?? '';                
    $tempat_lahir= $_POST[ 'f-tempatlahir' ] ?? '';   
    $tanggal_lahir = $_POST[ 'f-tanggallahir' ] ?? ''; 
    $jenis_kelamin= $_POST[ 'f-jeniskelamin' ] ?? '';                  
    $agama= $_POST[ 'f-agama' ] ?? '';
    $golongan_darah= $_POST[ 'f-goldar' ] ?? '';           
    $tinggi_badan= $_POST[ 'f-tinggibadan' ] ?? '';
    $berat_badan= $_POST[ 'f-beratbadan' ] ?? '';
    $hobi = $_POST[ 'f-hobi' ] ?? '';              
    $riwayat_penyakit= $_POST[ 'f-penyakit' ] ?? '';                   
    $alergi= $_POST[ 'f-alergi' ] ?? '';            
    $jenjang_studi= $_POST[ 'f-jenjangstudi' ] ?? '';
    $fakultas = $_POST[ 'f-fakultas' ] ?? '';
    $prodi = $_POST[ 'f-prodi' ] ?? '';              
    $asal_sma= $_POST[ 'f-sma' ] ?? '';                 
    $nama_ortu= $_POST[ 'f-namawali' ] ?? '';              
    $no_ortu= $_POST[ 'f-nomorwali' ] ?? ''; 
    $alamat_ortu = $_POST[ 'f-alamatortu' ] ?? '';
    $no_telp = $_POST[ 'f-telp' ] ?? '';           
    $email= $_POST[ 'f-email' ] ?? '';               
    $alamat= $_POST[ 'f-alamat' ] ?? '';          
    $jenis_tempat= $_POST[ 'f-jenistempattinggal' ] ?? '';
    $jam_malam = $_POST[ 'f-jammalam' ] ?? '';
    $id_line = $_POST[ 'f-idline' ] ?? '';                
    $id_facebook= $_POST[ 'f-idfb' ] ?? '';                
    $id_instagram= $_POST[ 'f-idig' ] ?? '';      
    $id_twitter= $_POST[ 'f-idtwitter' ] ?? '';
    $bidang_tari = $_POST[ 'f-tari' ] ?? '';
    $bidang_musik = $_POST[ 'f-musik' ] ?? '';      
    $organisasi= $_POST[ 'f-organisasi' ] ?? '';                
    $pernah_mb= $_POST[ 'f-pernahmb' ] ?? '';           
    $unit_sebelumnya= $_POST[ 'f-pernahmb2' ] ?? '';  
    $section = $_POST[ 'f-pernahmb3' ] ?? '';
    $kemampuan_alat = $_POST[ 'f-kemampuanalat' ] ?? '';
    $interview = $_POST[ 'f-interview' ] ?? '';
    $status_update = $lib->update($id,$nim,$nama_lengkap,$nama_panggilan,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$agama,$golongan_darah,$tinggi_badan,$berat_badan,$hobi,$riwayat_penyakit,$alergi,$jenjang_studi,$fakultas,$prodi,$asal_sma,$nama_ortu,$no_ortu,$alamat_ortu,$no_telp,$email,$alamat,$jenis_tempat,$jam_malam,$id_line,$id_facebook,$id_instagram,$id_twitter,$bidang_tari,$bidang_musik,$organisasi,$pernah_mb,$unit_sebelumnya,$section,$kemampuan_alat,$interview);
    if($status_update)
    {
        header('Location:admin.php');
    }
}

if(isset($_FILES['f-paspoto']) && !empty($_FILES['f-paspoto'])){
    $file_tmp = $_FILES['f-paspoto']['tmp_name'];
    $new_file_name = $data_siswa['pas_foto'];                
    if(empty($errors)==true){
        move_uploaded_file($file_tmp, '' . $new_file_name);
        print_r("Update paspoto sukses. \r\n");
    }
    else{
        print_r($errors);
    }
}
if(isset($_FILES['f-ktm']) && !empty($_FILES['f-ktm'])){
    $errors1= array();
    $file_tmp1 = $_FILES['f-ktm']['tmp_name'];
    $new_file_name1 = $data_siswa['foto_ktm'];  
    if(empty($errors1)==true){
        move_uploaded_file($file_tmp1, '' . $new_file_name1);
        print_r("Update foto ktm sukses. \r\n");
    }else{
        print_r($errors1);
    }
}

?>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="img/mb_logo.png">
        <title>PAB MB UGM 2021</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body style="padding-top: 70px;">
        <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html" style=" padding: 0px;">
                    <img src="img/mb_logo.png" alt="logo mb" style="height: 40px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-start ml-lg-2 ml-0">
                    <span class="navbar-text py-0 px-lg-2" style="font-weight: 475;font-size: 19px;">Admin</span>
                    <span class="navbar-text py-0 px-lg-2" style="font-weight: 350;font-size: 12px;margin-top: -2px;">PAB MB UGM 2021</span>
                </div>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>        
            </div>    
        </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Update Data Siswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data_siswa['id']; ?>"/>
                
                <div class="form-group row">
                    <label for="f-namalengkap2" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['nama_lengkap']; ?>" name="f-namalengkap2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-namapanggilan" class="col-sm-2 col-form-label">Nama Panggilan</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['nama_panggilan']; ?>" name="f-namapanggilan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['jenis_kelamin']; ?>" name="f-jeniskelamin">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['agama']; ?>" name="f-agama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['tempat_lahir']; ?>" name="f-tempatlahir">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" name="f-tanggallahir" value="<?php echo $data_siswa['tanggal_lahir']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-hobi" class="col-sm-2 col-form-label">Hobi dan Kesukaan</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['hobi']; ?>" name="f-hobi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-tinggibadan" class="col-sm-2 col-form-label">Tinggi Badan (cm)</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?php echo $data_siswa['tinggi_badan']; ?>" name="f-tinggibadan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-beratbadan" class="col-sm-2 col-form-label">Berat Badan (kg)</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?php echo $data_siswa['berat_badan']; ?>" name="f-beratbadan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-goldar" class="col-sm-2 col-form-label">Golongan Darah</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['golongan_darah']; ?>" name="f-goldar">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-penyakit" class="col-sm-2 col-form-label">Riwayat Penyakit</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['riwayat_penyakit']; ?>" name="f-penyakit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-alergi" class="col-sm-2 col-form-label">Alergi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['alergi']; ?>" name="f-alergi">
                    </div>
                </div>
                <hr class="my-4">
                <div class="form-group row">
                    <label for="f-nim2" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['nim']; ?>" name="f-nim2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-jenjangstudi" class="col-sm-2 col-form-label">Jenjang Studi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['jenjang_studi']; ?>" name="f-jenjangstudi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['fakultas']; ?>" name="f-fakultas">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-prodi" class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['prodi']; ?>" name="f-prodi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-sma" class="col-sm-2 col-form-label">Nama Asal Sekolah (SMA/SMK)</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['asal_sma']; ?>" name="f-sma">
                    </div>
                </div>
                <hr class="my-4">
                <div class="form-group row">
                    <label for="f-namawali" class="col-sm-2 col-form-label">Nama Orangtua/Wali</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['nama_ortu']; ?>" name="f-namawali">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-nomorwali" class="col-sm-2 col-form-label">Nomor Telepon Orangtua/Wali</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?php echo $data_siswa['no_ortu']; ?>" name="f-nomorwali">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-alamatortu" class="col-sm-2 col-form-label">Alamat Orangtua/Wali</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['alamat_ortu']; ?>" name="f-alamatortu">
                    </div>
                </div>
                <hr class="my-4">
                <div class="form-group row">
                    <label for="f-telp" class="col-sm-2 col-form-label">Nomor Telepon/WhatsApp</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?php echo $data_siswa['no_telp']; ?>" name="f-telp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-email" class="col-sm-2 col-form-label">Alamat E-mail</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['email']; ?>" name="f-email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-alamat" class="col-sm-2 col-form-label">Alamat Asal</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['alamat']; ?>" name="f-alamat">
                    </div>
                </div>
                <div class="form-group row">
                   <label for="f-jammalam" class="col-sm-2 col-form-label">Alamat Jogja</label>
                   <div class="col-sm-10">
                   <input type="text" class="form-control" value="<?php echo $data_siswa['jam_malam']; ?>" name="f-jammalam">
                   </div>
                </div>
                <div class="form-group row">
                    <label for="f-jenistempattinggal" class="col-sm-2 col-form-label">Jenis Tempat Tinggal</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['jenis_tempat']; ?>" name="f-jenistempattinggal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-idline" class="col-sm-2 col-form-label">ID Line</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['id_line']; ?>" name="f-idline">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-idig" class="col-sm-2 col-form-label">ID Instagram</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['id_instagram']; ?>" name="f-idig">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-idfb" class="col-sm-2 col-form-label">ID Facebook</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['id_facebook']; ?>" name="f-idfb">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-idtwitter" class="col-sm-2 col-form-label">ID Twitter</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['id_twitter']; ?>" name="f-idtwitter">
                    </div>
                </div>
                <hr class="my-4">
                <div class="form-group row">
                    <label for="f-musik" class="col-sm-2 col-form-label">Pengalaman Bidang Musik</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['bidang_musik']; ?>" name="f-musik">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-tari" class="col-sm-2 col-form-label">Pengalaman Bidang Tari</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['bidang_tari']; ?>" name="f-tari">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-organisasi" class="col-sm-2 col-form-label">Pengalaman Bidang Organisasi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['organisasi']; ?>" name="f-organisasi">
                    </div>
                </div>
                <hr class="my-4">
                <div class="form-group row">
                    <label for="f-pernahmb" class="col-sm-2 col-form-label">Pernah ikut Marching Band sebelumnya?</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['pernah_mb']; ?>" name="f-pernahmb">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-pernahmb2" class="col-sm-2 col-form-label">Unit Sebelumnya</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['unit_sebelumnya']; ?>" name="f-pernahmb2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-pernahmb3" class="col-sm-2 col-form-label">Section</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['section']; ?>" name="f-pernahmb3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-kemampuanalat" class="col-sm-2 col-form-label">Kemampuan Alat Musik</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['kemampuan_alat']; ?>" name="f-kemampuanalat">
                    </div>
                </div>
                <hr class="my-4">
                <div class="form-group row">
                    <label for="f-interview" class="col-sm-2 col-form-label">Waktu Wawancara</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $data_siswa['interview']; ?>" name="f-interview">
                    </div>
                </div>
                <hr class="my-4">
                <div class="form-group row">
                    <label for="f-paspoto" class="col-sm-2 col-form-label">Pasfoto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" name="f-paspoto" id="formPaspoto" accept="image/*">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f-ktm" class="col-sm-2 col-form-label">Foto KTM</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" name="f-ktm" id="formKtm" accept="image/*">
                    </div>
                </div>

                    <input type="submit" name="tombol_update" class="btn btn-primary" value="Update">

                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>
</html>