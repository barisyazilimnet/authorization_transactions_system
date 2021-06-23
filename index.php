<!DOCTYPE html>
<?php
$h = "localhost";
$n = "root";
$p = "";
$vt = "yetki1";
$con = mysqli_connect($h, $n, $p, $vt) or die(mysqli_error());
$con->Set_charset("utf-8");
$users = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users INNER JOIN authorization ON users.authorization_id=authorization.authorization_id"));
?>
<html lang="tr-TR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yetki</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <ul style="height:100%; margin-top:35%">
                    <li><a href="index.php?do=homepage">Anasayfa</a></li>
                   <?php if(in_array("authorization_transactions", explode(",", @$users["pages"]))) { ?>
                        <li><a href="index.php?do=authorization_add">Yetki ekle</a></li>
                        <li><a href="index.php?do=authorization_transactions">Yetki işlemleri</a></li>
                    <?php }if(in_array("site_settings", explode(",", @$users["pages"]))) { ?>
                        <li><a href="index.php?do=site_settings">Site ayarları</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-9">
            <?php
                @$do=$_GET["do"];
                if(file_exists("{$do}.php")){
                    require "{$do}.php";
                }else{
                    require "homepage.php";
                }
            ?>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>