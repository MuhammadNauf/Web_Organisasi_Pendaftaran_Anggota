<?php 
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
    $status_update = $lib->update($id,$nim,$nama_lengkap,$nama_panggilan,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$agama,$golongan_darah,$tinggi_badan,$berat_badan,$hobi,$riwayat_penyakit,$alergi,$jenjang_studi,$fakultas,$prodi,$asal_sma,$nama_ortu,$no_ortu,$alamat_ortu,$no_telp,$email,$alamat,$jenis_tempat,$jam_malam,$id_line,$id_facebook,$id_instagram,$id_twitter,$bidang_tari,$bidang_musik,$organisasi,$pernah_mb,$unit_sebelumnya,$section,$kemampuan_alat,$interview);
    if($status_update)
    {
        header('Location:admin.php');
    }
}
?>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=1200">>
        <link rel="icon" type="image/png" href="img/mb_logo.png">
        <title>PAB MB UGM 2021</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
        <style> 
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
            .form-group {
                margin-bottom: 1px;
            }
        </style>
    </head>
    <body style="padding-top: 70px; font-family: 'Poppins';">
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
            <div class="card-header bg-secondary text-white flex-row d-inline-flex">
                <form class="form-inline" style="margin-bottom: 0px;">
                    <div class="input-group">
                        <label class="my-1 mr-2" for="inlineFormInputName2">Link: </label>
                        <input style="width: 350px" type="text" id="linkdata" name="inlineFormInputName2" readonly class="form-control" value="pab.mbugm.org/view.php?id=<?php echo $data_siswa['id']; ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" onclick="copytext()" id="button-addon2">Copy</button>
                        </div>
                    </div>
                </form>
                <!-- <a style="margin-right: 5px;" class="btn btn-outline-light btn-lg ml-auto" type="button" onclick="savepdf()" role="button"><i class="fas fa-pencil-alt "></i>Download PDF</a> -->
                <a style="margin-right: 5px;" class="btn btn-outline-light btn-lg ml-auto" type="button" onclick="savejpeg()" role="button"><i class="fas fa-pencil-alt "></i>Download JPEG</a>
                <script type="text/javascript">
                    // function savepdf(){
                    //     var node = document.getElementById('printable');
                    //     domtoimage.toJpeg(node, { quality: 0.95 })
                    //         .then(function (dataUrl) {
                    //             var img = new Image();
                    //             img.src = dataUrl;
                    //             var imgHeight = img.height;
                    //             var imgWidth = img.width;
                    //             var width = imgWidth*(imgHeight/297);
                    //             var borderlr = ((210-55.56)/2);
                    //             console.log(imgHeight);
                    //             var doc = new jsPDF('p','mm','a4');
                    //             doc.addImage(img,'JPEG',borderlr,0,width,297);
                    //             doc.save('<?php echo $data_siswa["id"]; echo " - "; echo $data_siswa["nama_lengkap"]; echo ".pdf";?>');
                    //         })
                    //         .catch(function (error) {
                    //             console.error('oops, something went wrong!', error);
                    //     });
                    // }
                    function savejpeg(){
                        var node = document.getElementById('printable');
                        domtoimage.toJpeg(node, { quality: 0.95 })
                        .then(function (dataUrl) {
                            var link = document.createElement('a');
                            link.download = '<?php echo $data_siswa["id"]; echo " - "; echo $data_siswa["nama_lengkap"]; echo ".jpeg";?>';
                            link.href = dataUrl;
                            link.click();
                        });
                    }
                    function copytext() {
                        var copyText = document.getElementById("linkdata");
                        copyText.select();
                        copyText.setSelectionRange(0, 99999); /*For mobile devices*/
                        document.execCommand("copy");
                    }
                </script>
            </div>
            <div class="card-body" id="printable" style="background-color: white;">
            <form method="" action="">
                <div class="container">
                    <div class="row d-flex" style="margin-bottom: 15px; border-style: solid; border-width: 1px; border-color:silver">
                        <div class="col-sm-3 align-self-center">
                            <img src="img/pab_logo.png" alt="logopab" style="max-width: 100%; max-height: 500px" >
                        </div>
                        <div class="col-sm-6 align-self-center">
                            <h1 style="text-align: center; padding-bottom: 20px;">Data Pendaftaran</h1>
                            <hr class="mb-4 mt-1">
                            <h3 style="text-align: right;font-weight: 400;"><?php echo $data_siswa['nama_lengkap']; ?></h3>
                            <h3 style="text-align: right;font-weight: 400;"><?php echo $data_siswa['nim']; ?></h3>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" style="font-size: 14px;text-align: right" readonly class="form-control-plaintext" value="<?php echo $data_siswa['interview']; ?>" name="f-interview" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 align-self-center">
                            <img src="<?php echo $data_siswa['pas_foto']; ?>" alt="pasfoto" style="max-height: 385px; max-width: 100%;" >
                        </div>
                    </div>
                    <div class="row" style="padding: 15px; border-style: solid; border-width: 1px; border-color:silver">
                        <div class="col" style="padding-right: 40px;">
                            <h5>Data Diri</h5>
                            <hr class="mb-2 mt-1">
                            <div class="form-group row bg-light">
                                <label for="f-namalengkap2" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-8">
                                <input type="text" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['nama_lengkap']; ?>" name="f-namalengkap2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-namapanggilan" class="col-sm-4 col-form-label">Nama Panggilan</label>
                                <div class="col-sm-8">
                                <input type="text" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['nama_panggilan']; ?>" name="f-namapanggilan">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-jeniskelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                <input type="text" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['jenis_kelamin']; ?>" name="f-jeniskelamin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-agama" class="col-sm-4 col-form-label">Agama</label>
                                <div class="col-sm-8">
                                <input type="text" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['agama']; ?>" name="f-agama">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-tempatlahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                <input type="text" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['tempat_lahir']; ?>" name="f-tempatlahir">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-tanggallahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                <input type="date" readonly  class="form-control-plaintext" name="f-tanggallahir" value="<?php echo $data_siswa['tanggal_lahir']; ?>">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-hobi" class="col-sm-4 col-form-label">Hobi dan Kesukaan</label>
                                <div class="col-sm-8">
                                <textarea type="text" readonly id="formHobi" rows="1" class="form-control-plaintext" name="f-hobi"><?php echo $data_siswa['hobi']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-tinggibadan" class="col-sm-4 col-form-label">Tinggi Badan (cm)</label>
                                <div class="col-sm-8">
                                <input type="number" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['tinggi_badan']; ?>" name="f-tinggibadan">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-beratbadan" class="col-sm-4 col-form-label">Berat Badan (kg)</label>
                                <div class="col-sm-8">
                                <input type="number" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['berat_badan']; ?>" name="f-beratbadan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-goldar" class="col-sm-4 col-form-label">Golongan Darah</label>
                                <div class="col-sm-8">
                                <input type="text" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['golongan_darah']; ?>" name="f-goldar">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-penyakit" class="col-sm-4 col-form-label">Riwayat Penyakit</label>
                                <div class="col-sm-8">
                                <input type="text" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['riwayat_penyakit']; ?>" name="f-penyakit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-alergi" class="col-sm-4 col-form-label">Alergi</label>
                                <div class="col-sm-8">
                                <input type="text" readonly  class="form-control-plaintext" value="<?php echo $data_siswa['alergi']; ?>" name="f-alergi">
                                </div>
                            </div>
                            <h5 class="mt-4">Kontak</h5>
                            <hr class="mb-2 mt-1">
                            <div class="form-group row bg-light">
                                <label for="f-telp" class="col-sm-4 col-form-label">Nomor Telepon/WhatsApp</label>
                                <div class="col-sm-8">
                                <input type="number" readonly class="form-control-plaintext" value="<?php echo $data_siswa['no_telp']; ?>" name="f-telp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-email" class="col-sm-4 col-form-label">Alamat E-mail</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['email']; ?>" name="f-email">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-alamat" class="col-sm-4 col-form-label">Alamat Asal</label>
                                <div class="col-sm-8">
                                <textarea class="form-control-plaintext" id="formAlamat" rows="1" readonly name="f-alamat"><?php echo $data_siswa['alamat']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-alamat" class="col-sm-4 col-form-label">Alamat Jogja</label>
                                <div class="col-sm-8">
                                <textarea class="form-control-plaintext" id="formJammalam" rows="1" readonly name="f-jammalam"><?php echo $data_siswa['jam_malam']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-jenistempattinggal" class="col-sm-4 col-form-label">Jenis Tempat Tinggal</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['jenis_tempat']; ?>" name="f-jenistempattinggal">
                                </div>
                            </div>
                            <!--<div class="form-group row bg-light">-->
                            <!--    <label for="f-jammalam" class="col-sm-4 col-form-label">Jam Malam?</label>-->
                            <!--    <div class="col-sm-8">-->
                            <!--    <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['jam_malam']; ?>" name="f-jammalam">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="form-group row bg-light">
                                <label for="f-idline" class="col-sm-4 col-form-label">ID Line</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['id_line']; ?>" name="f-idline">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-idig" class="col-sm-4 col-form-label">ID Instagram</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['id_instagram']; ?>" name="f-idig">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-idfb" class="col-sm-4 col-form-label">ID Facebook</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['id_facebook']; ?>" name="f-idfb">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-idtwitter" class="col-sm-4 col-form-label">ID Twitter</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['id_twitter']; ?>" name="f-idtwitter">
                                </div>
                            </div>
                            <h5 class="mt-4">Data Orangtua/Wali</h5>
                            <hr class="mb-2 mt-1">
                            <div class="form-group row bg-light">
                                <label for="f-namawali" class="col-sm-4 col-form-label">Nama Orangtua/Wali</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['nama_ortu']; ?>" name="f-namawali">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-nomorwali" class="col-sm-4 col-form-label">Nomor Telepon Orangtua/Wali</label>
                                <div class="col-sm-8">
                                <input type="number" readonly class="form-control-plaintext" value="<?php echo $data_siswa['no_ortu']; ?>" name="f-nomorwali">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-alamatortu" class="col-sm-4 col-form-label">Alamat Orangtua/Wali</label>
                                <div class="col-sm-8">
                                <textarea type="text" readonly class="form-control-plaintext" rows="1" id="formAlamatortu" name="f-alamatortu"><?php echo $data_siswa['alamat_ortu']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Data Akademik</h5>
                            <hr class="mb-2 mt-1">
                            <img src="<?php echo $data_siswa['foto_ktm']; ?>" alt="ktm" style="max-height: 330px; max-width: 100%; padding-bottom: 5px" >
                            <div class="form-group row bg-light">
                                <label for="f-nim2" class="col-sm-4 col-form-label">NIM</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['nim']; ?>" name="f-nim2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-jenjangstudi" class="col-sm-4 col-form-label">Jenjang Studi</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['jenjang_studi']; ?>" name="f-jenjangstudi">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-fakultas" class="col-sm-4 col-form-label">Fakultas</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['fakultas']; ?>" name="f-fakultas">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-prodi" class="col-sm-4 col-form-label">Program Studi</label>
                                <div class="col-sm-8">
                                <textarea type="text" readonly class="form-control-plaintext" rows="1" id="formProdi" name="f-prodi"><?php echo $data_siswa['prodi']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-sma" class="col-sm-4 col-form-label">Nama Asal Sekolah (SMA/SMK)</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['asal_sma']; ?>" name="f-sma">
                                </div>
                            </div>
                            <h5 class="mt-4">Informasi Tambahan</h5>
                            <hr class="mb-2 mt-1">
                            <div class="form-group row bg-light">
                                <label for="f-musik" class="col-sm-4 col-form-label">Pengalaman Bidang Musik</label>
                                <div class="col-sm-8">
                                <textarea type="text" readonly class="form-control-plaintext" id="formMusik" rows="1" name="f-musik"><?php echo $data_siswa['bidang_musik']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-tari" class="col-sm-4 col-form-label">Pengalaman Bidang Tari</label>
                                <div class="col-sm-8">
                                <textarea type="text" readonly class="form-control-plaintext" id="formTari" rows="1" name="f-tari"><?php echo $data_siswa['bidang_tari']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-organisasi" class="col-sm-4 col-form-label">Pengalaman Bidang Organisasi</label>
                                <div class="col-sm-8">
                                <textarea type="text" readonly class="form-control-plaintext" id="formOrganisasi" rows="1" name="f-organisasi"><?php echo $data_siswa['organisasi']; ?></textarea>
                                </div>
                            </div>
                            <h5 class="mt-4">Pengalaman Marching Band</h5>
                            <hr class="mb-2 mt-1">
                            <div class="form-group row bg-light">
                                <label for="f-pernahmb" class="col-sm-4 col-form-label">Pernah ikut Marching Band sebelumnya?</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['pernah_mb']; ?>" name="f-pernahmb">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-pernahmb2" class="col-sm-4 col-form-label">Unit Sebelumnya</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['unit_sebelumnya']; ?>" name="f-pernahmb2">
                                </div>
                            </div>
                            <div class="form-group row bg-light">
                                <label for="f-pernahmb3" class="col-sm-4 col-form-label">Section</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['section']; ?>" name="f-pernahmb3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f-kemampuanalat" class="col-sm-4 col-form-label">Kemampuan Alat Musik</label>
                                <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $data_siswa['kemampuan_alat']; ?>" name="f-kemampuanalat">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $data_siswa['id']; ?>"/>
                
                
                
                


                </div>
            </form>
            </div>
        </div>
    </div>
    
    
    
    
    
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
    <!--<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg==" crossorigin="anonymous"></script>
    
    <script>
        jQuery.fn.extend({
            autoHeight: function () {
                 function autoHeight_(element) {
                    return jQuery(element).css({
                        'height': 'auto',
                        'overflow-y': 'hidden'
                      }).height(element.scrollHeight);
                    }
                    return this.each(function () {
                      autoHeight_(this).on('input', function () {
                        autoHeight_(this);
                      });
                    });
                  }
                });
        $('#formHobi').autoHeight();
        $('#formProdi').autoHeight(); 
        $('#formAlamat').autoHeight(); 
        $('#formAlamatortu').autoHeight();
        $('#formMusik').autoHeight();
        $('#formTari').autoHeight(); 
        $('#formOrganisasi').autoHeight();
        $('#formJammalam').autoHeight(); 
    </script>
    
    </body>
</html>