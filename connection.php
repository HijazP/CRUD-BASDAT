<?php
    $conf = parse_ini_file(__DIR__ . "/conf.ini", true);

    // variabel database
    $servername = $conf["db_prod"]["hostname"];
    $username = $conf["db_prod"]["username"];
    $password = $conf["db_prod"]["password"];
    $database = $conf["db_prod"]["database"];

    // koneksi ke database menggunakan mysqli
    $conn = mysqli_connect($servername, $username, $password, $database);