<?php 
ob_start();
include "config/settings.php";
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
    exit;
}
if (isset($_SESSION['masuk'])) {
    header("Location: ./");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en-us">
<head>

    <?php include "template/title.php" ?>
    <?php include "template/meta.php" ?>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
</head>
<body class="o-page o-page--center">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="o-page__card">
    <div class="c-card u-mb-xsmall">
        <header class="c-card__header u-pt-large">
            <a class="c-card__icon" href="#!">
                <img src="assets/img/logo.png" alt="Dashboard UI Kit">
            </a>
            <h1 class="u-h3 u-text-center u-mb-zero"><?= $settings['title'] ?></h1>
        </header>

        <form class="c-card__body" method="POST">
            <div class="c-field u-mb-small">
                <label class="c-field__label">Nama Pengguna</label> 
                <input name="username" class="c-input" type="text" placeholder="Ketik Nama Pengguna" value="" required=""> 
            </div>

            <div class="c-field u-mb-small">
                <label class="c-field__label">Kata Sandi</label> 
                <input name="password" class="c-input" type="text" placeholder="Ketik Sandinya" value="" required=""> 
            </div>

            <button name="masuk" class="c-btn c-btn--info" type="submit">Masuk</button>

            <?php  
            if (isset($_POST['masuk'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                // CHECK FIRST IF USER ALREADY EXIST ON DATABASE
                $sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
                $result = $mysql->query($sql);

                // CHECK 
                $sqlchild = "SELECT * FROM tb_user_child WHERE username='$username' AND password='$password'";
                $resultchild = $mysql->query($sqlchild);

                if ($result->num_rows > 0){
                    $read = $result->fetch_array();
                }
                if ($resultchild->num_rows > 0){
                    $read = $resultchild->fetch_array();
                }

                // IF EXIST CHECK AGAIN
                if ($result->num_rows > 0 or $resultchild->num_rows > 0) {
                    // CHECK AGAIN IF BYPASSED LOGIN
                    if ($read['username'] == $username) {
                        $_SESSION['masuk'] = true;
                        $_SESSION['id'] = $read['id'];
                        $_SESSION['username'] = $read['username'];
                        $_SESSION['password'] = $read['password'];
                        $_SESSION['akses'] = $read['akses'];                        
                        sweetalert('Berhasil Masuk','success');      
                        header("Location: ./");
                        exit;
                    }else {
                        sweetalert('Bypassed Login','error','./');
                    }
                }else { 
                    sweetalert('Nama Pengguna atau Password Salah','error','./');
                }
            }
            ?>

        </form>
    </div>

</div>

<script src="assets/js/main.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.checkboxes.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<?php  
if (!empty($_SESSION['execute'])) {
    echo $_SESSION['execute'];
    unset($_SESSION['execute']);
}
ob_end_flush();
?>
</body>
</html>