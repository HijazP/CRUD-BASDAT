<?php
    $conf = parse_ini_file(__DIR__ . "/conf.ini", true);

    // variabel database
    $servername = $conf["db_dev"]["hostname"];
    $username = $conf["db_dev"]["username"];
    $password = $conf["db_dev"]["password"];
    $database = $conf["db_dev"]["database"];

    // koneksi ke database menggunakan mysqli
    $conn = mysqli_connect($servername, $username, $password, $database);