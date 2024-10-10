<?php 
session_start();
include('library.php');
$lib = new Library();
$data_siswa = $lib->show();
$i = 1;

if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
    //redirect to logout.php
    header('Location: logout.php'); //change yoursite.com to the name of you site!!
}else{ //if we haven't expired:
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}

if(isset($_GET['hapus_siswa']))
{
    $id = $_GET['hapus_siswa'];
    $status_hapus = $lib->delete($id);
    if($status_hapus)
    {
        header('Location: admin.php');
    }
}
?>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=1200">>
        <link rel="icon" type="image/png" href="img/mb_logo.png">
        <title>PAB MB UGM 2021</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
<body style="padding-top: 70px;">
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light" style="padding-top: 5px;padding-bottom: 5px;">
        <div class="container">
            <a class="navbar-brand" href="index.html" style=" padding: 0px;">
                <img src="img/mb_logo.png" alt="logo mb" style="height: 40px;">
            </a>
            <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-start ml-lg-2 ml-0">
                <span class="navbar-text py-0 px-lg-2" style="font-weight: 475;font-size: 19px;">Admin</span>
                <span class="navbar-text py-0 px-lg-2" style="font-weight: 350;font-size: 12px;margin-top: -2px;">PAB MB UGM 2021</span>
            </div>
            <div class="collapse navbar-collapse flex-column align-items-start ml-lg-2 ml-0" id="navbarCollapse">
                <ul class="navbar-nav mb-auto mt-0 ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link py-0" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Data Pendaftar</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered" width="60%">
                    <tr>
                        <th>No.</th>
                        <th>Waktu Submit</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>E-mail</th>
                        <th>Jadwal Wawancara</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    foreach($data_siswa as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$i++."</td>";
                        echo "<td>".$row['waktu_daftar']."</td>";
                        echo "<td>".$row['nim']."</td>";
                        echo "<td>".$row['nama_lengkap']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['interview']."</td>";

                        if($_SESSION['user_id'] == 1)
                        {
                            echo "<td><a class='btn btn-success' id='lihat' href='view.php?id=".$row['id']."'>Lihat</a><a class='btn btn-info' id='edit' href='form_edit.php?id=".$row['id']."'>Update</a><a class='btn btn-danger disabled' id='hapus' href='admin.php?hapus_siswa=".$row['id']."'>Hapus</a></td>";
                        }
                        else if($_SESSION['user_id'] == 2)
                        {
                            echo "<td><a class='btn btn-success' id='lihat' href='view.php?id=".$row['id']."'>Lihat</a></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>