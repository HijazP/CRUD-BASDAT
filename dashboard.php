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
    <title>Dashboard | Catatanmu.id</title>
</head>
<body>
    <nav>
        <h1>Catatanmu.id</h1>
        <div><a href="user.php">Akun</a></div>
    </nav>

    <h1>Welcome! <?php echo $_SESSION["user"]["username"] ?></h1>

    <div class="cardslist">
        <h2>To-do List</h2>
        <img src="#" alt="TDL">
        <a href="tdl.php">Lihat</a>
    </div>

    <div class="cardslist">
        <h2>Wishlist</h2>
        <img src="#" alt="WL">
        <a href="wl.php">Lihat</a>
    </div>

    <div class="cardslist">
        <h2>Refreshing List</h2>
        <img src="#" alt="RL">
        <a href="rl.php">Lihat</a>
    </div>
</body>
</html>