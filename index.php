<?php
    include "koneksi.php";
    session_start();
    $page = isset($_GET["page"]) ? $_GET["page"] : "beranda";
    if ($page == "logout"){
        unset($_SESSION["pengguna"]);
        header("Location: ?page=beranda");
    }
?>

<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Toko Online</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="?p=beranda"><b>SeruniShop</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="?page=beranda">Beranda</a>
                    </li>
                    <?php
                        if (isset($_SESSION["pengguna"])) {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="?page=dashboard">Dashboard</a>
                    </li>
                    <?php
                        }
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="?page=katalog">Katalog</a>
                    </li>
                    <?php
                        if (isset($_SESSION["pengguna"])){
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="?page=input">Input</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="?page=logout">Logout</a>
                    </li>
                    <?php
                        } else {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="?page=login">Login</a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </nav>
        <?php  
            switch ($page) {
                case "daftar":
                    include "daftar.php";
                break;
                case "login":
                    include "login.php";
                break;
                case "dashboard":
                    include "dashboard.php";
                break;                
                case "katalog":
                    include "katalog.php";
                break;
                case "instan":
                    include "instan.php";
                break;
                case "inputInstan":
                    include "inputInstan.php";
                break;
                case "editInstan":
                    include "editInstan.php";
                break;
                case "pashmina":
                    include "pashmina.php";
                break;
                case "inputPashmina":
                    include "inputPashmina.php";
                break;
                case "editPashmina":
                    include "editPashmina.php";
                break;
                case "segiempat":
                    include "segiempat.php";
                break;
                case "inputSegiempat":
                    include "inputSegiempat.php";
                break;
                case "editSegiempat":
                    include "editSegiempat.php";
                break;
                case "mukena":
                    include "mukena.php";
                break;
                case "inputMukena":
                    include "inputMukena.php";
                break;
                case "editMukena":
                    include "editMukena.php";
                break;
                case "input":
                    include "input.php";
                break;
                default:
                    include "beranda.php";
                break;
            }
        ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>