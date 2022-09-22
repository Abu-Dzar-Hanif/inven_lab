<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <title>Inventori</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <main>
        <div class="text-center mt-5 mb-5">
            <h1 class="text-white font-weight-bold">
                INVENTORI LAB KOMPUTER </h1>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card col">
                    <div class="row">
                        <div class="card-boby">
                            <img src="img/global.png" alt="" height="200px">
                        </div>
                        <div class="card-body text-center">
                            <i class="fas fa-laptop-house fa-4x"></i>
                            <p class="text-dark">
                                Selamat Datang Di Aplikasi Inventori Lab Komputer <br>
                                silahkan klik tombol di bawah ini untuk memulai
                            </p>
                            <a href="index.php?p=<?= password_hash('login',PASSWORD_DEFAULT)?>"
                                class="btn btn-primary">Mulai <i class="fas fa-sign-in-alt"></i></a>
                        </div>
                        <div class="card-boby">
                            <img src="img/logo.png" alt="" height="200px">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>