<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "pabmbugm2021";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //if (isset($_POST['verif_check'])) {
            $stmt = $conn->prepare("INSERT INTO form 
            (ip, waktu_daftar, interview, nim, nama_lengkap, nama_panggilan, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, pas_foto,	foto_ktm, golongan_darah, tinggi_badan, berat_badan, hobi, riwayat_penyakit, alergi, jenjang_studi, fakultas, prodi, asal_sma, nama_ortu, no_ortu, alamat_ortu, no_telp, email, alamat, jenis_tempat,	jam_malam, id_line, id_facebook, id_instagram,	id_twitter,	bidang_tari, bidang_musik, organisasi, pernah_mb, unit_sebelumnya, section, kemampuan_alat)
            VALUES 
            (:ip, :waktu_daftar, :interview, :nim, :nama_lengkap, :nama_panggilan, :tempat_lahir, :tanggal_lahir, :jenis_kelamin, :agama, :pas_foto, :foto_ktm, :golongan_darah, :tinggi_badan, :berat_badan, :hobi, :riwayat_penyakit, :alergi, :jenjang_studi, :fakultas, :prodi, :asal_sma, :nama_ortu, :no_ortu, :alamat_ortu, :no_telp, :email, :alamat, :jenis_tempat, :jam_malam, :id_line, :id_facebook,	:id_instagram, :id_twitter, :bidang_tari, :bidang_musik, :organisasi, :pernah_mb, :unit_sebelumnya, :section, :kemampuan_alat)");
            $stmt->bindParam(':ip', $ip);
            $stmt->bindParam(':waktu_daftar', $waktu_daftar);
            $stmt->bindParam(':interview', $interview);
            $stmt->bindParam(':nim', $nim);
            $stmt->bindParam(':nama_lengkap', $nama_lengkap);
            $stmt->bindParam(':nama_panggilan', $nama_panggilan);
            $stmt->bindParam(':tempat_lahir', $tempat_lahir);
            $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
            $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
            $stmt->bindParam(':agama', $agama);
            $stmt->bindParam(':pas_foto', $pas_foto);
            $stmt->bindParam(':foto_ktm', $foto_ktm);
            $stmt->bindParam(':golongan_darah', $golongan_darah);
            $stmt->bindParam(':tinggi_badan', $tinggi_badan);
            $stmt->bindParam(':berat_badan', $berat_badan);
            $stmt->bindParam(':hobi', $hobi);
            $stmt->bindParam(':riwayat_penyakit', $riwayat_penyakit);
            $stmt->bindParam(':alergi', $alergi);
            $stmt->bindParam(':jenjang_studi', $jenjang_studi);
            $stmt->bindParam(':fakultas', $fakultas);
            $stmt->bindParam(':prodi', $prodi);
            $stmt->bindParam(':asal_sma', $asal_sma);
            $stmt->bindParam(':nama_ortu', $nama_ortu);
            $stmt->bindParam(':no_ortu', $no_ortu);
            $stmt->bindParam(':alamat_ortu', $alamat_ortu);
            $stmt->bindParam(':no_telp', $no_telp);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':alamat', $alamat);
            $stmt->bindParam(':jenis_tempat', $jenis_tempat);
            $stmt->bindParam(':jam_malam', $jam_malam);
            $stmt->bindParam(':id_line', $id_line);
            $stmt->bindParam(':id_facebook', $id_facebook);
            $stmt->bindParam(':id_instagram', $id_instagram);
            $stmt->bindParam(':id_twitter', $id_twitter);
            $stmt->bindParam(':bidang_tari', $bidang_tari);
            $stmt->bindParam(':bidang_musik', $bidang_musik);
            $stmt->bindParam(':organisasi', $organisasi);
            $stmt->bindParam(':pernah_mb', $pernah_mb);
            $stmt->bindParam(':unit_sebelumnya', $unit_sebelumnya);
            $stmt->bindParam(':section', $section);
            $stmt->bindParam(':kemampuan_alat', $kemampuan_alat);


            $ip = getenv('HTTP_CLIENT_IP')?:
            getenv('HTTP_X_FORWARDED_FOR')?:
            getenv('HTTP_X_FORWARDED')?:
            getenv('HTTP_FORWARDED_FOR')?:
            getenv('HTTP_FORWARDED')?:
            getenv('REMOTE_ADDR');

            $hari= $_POST[ 'f-hariinterview' ] ?? '';
            $pukul= ' ';
            $sesi= $_POST[ 'f-sesiinterview' ] ?? '';
            $interview= $hari.$pukul.$sesi; 

            date_default_timezone_set('Asia/Jakarta');
            $waktu_daftar = date("Y-m-d H:i:s");    
            $nim = $_POST[ 'f-nim2' ] ?? '';                       
            $nama_lengkap= $_POST[ 'f-namalengkap2' ] ?? '';                 
            $nama_panggilan= $_POST[ 'f-namapanggilan' ] ?? '';                
            $tempat_lahir= $_POST[ 'f-tempatlahir' ] ?? '';   
            $tanggal_lahir = $_POST[ 'f-tanggallahir' ] ?? ''; 
            $jenis_kelamin= $_POST[ 'f-jeniskelamin' ] ?? '';                  
            $agama= $_POST[ 'f-agama' ] ?? '';         

            $extpaspoto = strtolower(end(explode('.', $_FILES['f-paspoto']['name'] ?? '')));
            $namapaspoto = 'uploads/paspoto/' . date("dmY_Hi") . ' - ' . $nama_lengkap;
            $pas_foto = $namapaspoto . '.' . $extpaspoto;
            $extktm = strtolower(end(explode('.', $_FILES['f-ktm']['name'] ?? '')));
            $namafotoktm = 'uploads/ktm/' . date("dmY_Hi") . ' - ' . $nama_lengkap;     
            $foto_ktm = $namafotoktm . '.' . $extktm;

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
            $jam_malam= $_POST[ 'f-jammalam' ] ?? '';
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

            $stmt->execute();
            echo "pabmbugmformberhasil";



            //upload file di server//
            date_default_timezone_set('Asia/Jakarta');
            if(isset($_FILES['f-paspoto'])){
                $errors= array();
                $file_name = $_FILES['f-paspoto']['name'];
                $file_size =$_FILES['f-paspoto']['size'];
                $file_tmp = $_FILES['f-paspoto']['tmp_name'];
                $file_type = $_FILES['f-paspoto']['type'];
                $file_ext = strtolower(end(explode('.',$file_name)));
                $new_file_name = date("dmY_Hi") . ' - ' . $nama_lengkap . '.' . $file_ext;
                $extensions= array("jpeg","jpg","png");       
                if(in_array($file_ext,$extensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }           
                if($file_size > 2097152){
                    $errors[]='File size must be excately 2 MB';
                }         
                if(empty($errors)==true){
                    move_uploaded_file($file_tmp, 'uploads/paspoto/' . $new_file_name);
                    echo "Success paspoto";
                }else{
                    print_r($errors);
                }
            }
            if(isset($_FILES['f-ktm'])){
                $errors1= array();
                $file_name1 = $_FILES['f-ktm']['name'];
                $file_size1 =$_FILES['f-ktm']['size'];
                $file_tmp1 = $_FILES['f-ktm']['tmp_name'];
                $file_type1 = $_FILES['f-ktm']['type'];
                $file_ext1 = strtolower(end(explode('.',$file_name1)));
                $new_file_name1 = date("dmY_Hi") . ' - ' . $nama_lengkap . '.' . $file_ext1;
                $extensions1 = array("jpeg","jpg","png");       
                if(in_array($file_ext1,$extensions1)=== false){
                    $errors1[]="extension not allowed, please choose a JPEG or PNG file.";
                }           
                if($file_size > 2097152){
                    $errors1[]='File size must be excately 2 MB';
                }         
                if(empty($errors1)==true){
                    move_uploaded_file($file_tmp1, 'uploads/ktm/' . $new_file_name1);
                    echo "Success ktm";
                }else{
                    print_r($errors1);
                }
            }
        
        //}  
    } 
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    $conn = null;
?>