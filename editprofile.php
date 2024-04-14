<?php
    // koneksi ke database
    require_once("auth.php");
    require("connection.php");

    // mengambil username dari url
    $uname = $_GET["username"];

    // variabel untuk membaca data
    $profile = mysqli_query($conn, "SELECT * FROM profile WHERE username='$uname'");

    // jika variabel bernilai false, maka tampilkan pesan error
    if (false == $profile) {
        printf("error: %s\n", mysqli_error($conn));
    }

    // ketika dideklarasikan maka akan mengubah data pada tabel profile
    if (isset($_POST['update'])) {
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $born_date = $_POST['born_date'];
        $phone_number = $_POST['phone_number'];

        $update = mysqli_query($conn, "UPDATE profile SET 
        email='$email', 
        first_name='$first_name', 
        last_name='$last_name', 
        born_date='$born_date',
        phone_number='$phone_number'
        ");

        header('Location: profile.php');
    }

    // ketika dideklarasikan maka akan menghapus data pada tabel account
    if (isset($_GET['delete'])) {
        $delete = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM account WHERE username='$delete'");

        header('location: index.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css"/>
    <title>Profil <?php echo $_SESSION["user"]["username"] ?> | Catatanmu.id</title>
</head>
<body>
        <nav>
            <h1 class="catatanmu">Catatanmu.id</h1>
            <ul class="nav_links">
                <li><a class="db_ref" href="dashboard.php">Dashboard</a></li>
                <li>    
                    <a class="userlogo" href="profile.php"> 
                        <img class="profilelogo" src="img/Avatar.svg" width="50em" href="profile.php">
                    </a>
                </li>
            </ul>
        </nav>

    <?php while ($row = mysqli_fetch_assoc($profile)) { ?>
        
    <h2 class="pagemark2">Ubah Profil</h2>

    <div class="tbl">
        <form action="" method="POST">
            <table class="table-profile">
                <tbody>
                    <tr>
                        <td><label for="">Username</label></td>
                        <td><input type="text" name="username" value="<?php echo $row['username']; ?>"><br></td>
                    </tr>
                    <tr>
                        <td><label for="">Email</label></td>
                        <td><input type="text" name="email" value="<?php echo $row['email']; ?>"><br></td>
                    </tr>
                    <tr>
                        <td><label for="">Nama Depan</label></td>
                        <td><input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br></td>
                    </tr>
                    <tr>
                        <td><label for="">Nama Belakang</label></td>
                        <td><input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br></td>
                    </tr>
                    <tr>
                        <td><label for="">Tanggal Lahir</label></td>
                        <td><input type="date" name="born_date" value="<?php echo $row['born_date']; ?>"><br></td>
                    </tr>
                    <tr>
                        <td><label for="">Nomor Telepon</label></td>
                        <td><input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>"><br></td>
                    </tr>   
                </tbody>
            </table>
            <div class="buttons">
                <button class="simpan" type="submit" name="update">Simpan</button>
                <a class="simpan" href="profile.php">Kembali</a>
                <a class="delacc" href="editprofile.php?delete=<?php echo $row['username']; ?>">Hapus Akun</a>
            </div>
            <?php } ?>
        </form>

    </div>

</body>
</html>