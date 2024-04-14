<?php
    $env = file_get_contents(__DIR__."/.env");
    $lines = explode("\n", $env);

    foreach($lines as $line)
    {
        preg_match("/([^#]+)\=(.*)/", $line, $matches);
        if(isset($matches[2]))
        {
            putenv(trim($line));
        }
    } 
    // variabel database
    $servername = getenv('servername');
    $database = getenv('database');
    $username = getenv('username');
    $password = getenv('password');

    // koneksi ke database menggunakan mysqli
    $conn = mysqli_connect($servername, $username, $password, $database);