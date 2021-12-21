<?php
    // menyimpan sesi yang dimasukan user pada halaman login
    session_start();
    if(!isset($_SESSION["user"])) header("Location: login.php");