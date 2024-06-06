<?php
    $conf = parse_ini_file(__DIR__ . "/conf.ini", true);

    // variabel database
    $servername = "localhost";
    $username = "faizbypm_cttn";
    $password = "!AzrielBaresFaizHanif123";
    $database = "faizbypm_cttnmu";

    // koneksi ke database menggunakan mysqli
    $conn = mysqli_connect($servername, $username, $password, $database);