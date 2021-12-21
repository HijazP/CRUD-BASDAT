<?php
    // variabel database
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "web_notes_app";

    // koneksi ke database menggunakan PDO
    try {
        $db = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
        // kalo ada eror, parameter port dihapus aja
    } catch (PDOException $e) {
        die("Terjadi masalah: ".$e -> getMessage());
    }