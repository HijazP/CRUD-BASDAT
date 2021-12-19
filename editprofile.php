<?php require_once("auth.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"/>
    <title>Profil <?php echo $_SESSION["user"]["username"] ?> | Catatanmu.id</title>
</head>
<body>
    <nav>
        <h1>Catatanmu.id</h1>
        <div><a href="user.php">Akun</a></div>
    </nav>

    <div class="box">
        <h2>Ubah Profil</h2>
        <form action="" method="">
            <label for="">Username</label>
            <input type="text" name="username" value=""><br>
            <label for="">Email</label>
            <input type="text" name="email" value=""><br>
            <label for="">Nama Depan</label>
            <input type="text" name="first_name" value=""><br>
            <label for="">Nama Belakang</label>
            <input type="text" name="last_name" value=""><br>
            <label for="">Tanggal Lahir</label>
            <input type="text" name="born_date" value=""><br>
            <label for="">Nomor Telepon</label>
            <input type="text" name="phone_number" value=""><br>
            <button type="submit" name="profile_submit">Simpan</button>
        </form>

        <a href="editprofile.php">Edit</a>
        <a href="logout.php">Logout</a>
    </div>

</body>
</html>