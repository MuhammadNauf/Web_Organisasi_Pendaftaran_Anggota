<?php 
session_start();
include('library.php'); // Include file library.php for database interaction
$lib = new Library();   // Create instance of Library class

if (isset($_POST['create'])) { 
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    // Check if username and password are not empty
    if (empty($username) || empty($password)) {
        die('Username dan password harus diisi!');
    }

    // Check if username already exists in the database
    $userExists = $lib->login($username); // Use login method to check if username exists

    if ($userExists) {
        die('Username sudah terdaftar! Silakan gunakan username lain.');
    } else {
        // Hash the password with bcrypt
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Save new admin to the database
        $register = $lib->registerUser($username, $passwordHash); 
        if ($register) {
            // If registration is successful, show popup and redirect to login page
            echo "<script>alert('Akun berhasil dibuat!'); window.location.href = 'login.php';</script>";
            exit;
        } else {
            die('Terjadi kesalahan saat pendaftaran. Silakan coba lagi.');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/mb_logo.png">
    <title>PAB MB UGM 2020 - Register Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body style="padding-top: 75px;">
<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="img/mb_logo.png" alt="logo mb" style="height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <span class="navbar-text">Admin PAB MB UGM 2020</span>
        </div>
    </div>
</nav>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Register Admin Baru</h3>
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                </div>
                <input type="submit" name="create" class="btn btn-primary" value="Register">
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
