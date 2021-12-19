<?php
    require("auth.php");
    require("config.php");

    $servername     = "localhost";
    $database       = "web_notes_app"; 
    $username       = "root";
    $password       = "";

    // jadi ini buat konekin nya
    $conn = mysqli_connect($servername, $username, $password, $database);

    $errors = ""; //declare variabel eror
    $works_id = $_GET['works_id'];

    // nampilin value di row sekarang
    if (isset($_GET['works_id'])) {
        $query = mysqli_query($conn, "SELECT * FROM works WHERE works_id = $works_id");
        $row = mysqli_fetch_array($query);
    } else {
        header('Location: wl.php');
    }

    if (isset($_POST['wl_simpan'])) { // biar simpan buttonnya work
        $wl_edit = $_POST['wl_edit'];
        if (empty($wl_edit)) {
            $errors = "Tugas tidak boleh kosong"; // kalo kosong bakal eror
        }
        else {
            mysqli_query($conn, "UPDATE `works` SET `wish_list_content` = '$wl_edit' WHERE `works`.`works_id` = $works_id;"); // nambah task
            header('Location: wl.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wishlist</title>
</head>
<body>
    <form action="" method="POST">
        <h1></h1>
        <input type="text" name="wl_edit" value="<?php echo $row['wish_list_content']; ?>">
        <button type="submit" name="wl_simpan">Simpan</button>
        <?php if (isset($errors)) { ?>
        <p><?php echo $errors; ?></p>
        <?php } ?>
    </form>

</body>
</html>