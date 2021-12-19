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
    
    if (isset($_POST['wl_submit'])) { // biar submit buttonnya work
        $wl_task = $_POST['wl_task'];
        if (empty($wl_task)) {
            $errors = "Impian tidak boleh kosong"; // kalo kosong bakal eror
        }
        else {
            $user = $_SESSION["user"]["username"];
            mysqli_query($conn, "INSERT INTO works (username, wish_list_content) VALUES ('$user', '$wl_task')"); // nambah task
        }
        
    }

    // delete task
    if (isset($_GET['wl_task_del'])) {
        $works_id = $_GET['wl_task_del'];
        mysqli_query($conn, "DELETE FROM works WHERE works_id=$works_id"); // delete di db nya
        header('location: wl.php');
    }

    $wl_tasks = mysqli_query($conn, "SELECT * FROM works WHERE wish_list_content IS NOT NULL");
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
    <link rel="stylesheet" href="style.css"/>
    <title>Wishlist <?php echo $_SESSION["user"]["username"] ?></title>
</head>
<body>
    <header class="navbar">
        <nav>
            <h1 class="catatanmu">Catatanmu.id</h1>
            <ul class="nav_links">
                <li>
                    <a class="dashboard" href="dashboard.php">Dashboard</a>
                    <a class="userlogo" href="profile.php"> 
                        <img class="profilelogo" src="img/Avatar.svg" width="40em" href="profile.php">
                    </a>
                <li>
            </ul>
        </nav>
    </header>
    <a href="dashboard.php">Home</a>
    <h1>Wishlist</h1>

    <form action="" method="POST">
    <?php if (isset($errors)) { ?>
        <p><?php echo $errors; ?></p>
    <?php } ?>
        <input type="text" name="wl_task" placeholder="Tambahkan impianmu">
        <button type="submit" name="wl_submit">+</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php $i = 1; while ($row = mysqli_fetch_array($wl_tasks)) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td class="task"><?php echo $row['wish_list_content']; ?></td>
                <td>
                    <a href="wledit.php?works_id=<?php echo $row['works_id'] ?>">edit</a>
                </td>
                <td class="delete">
                    <a href="wl.php?wl_task_del=<?php echo $row['works_id'] ?>">x</a>
                </td>
            </tr>

        <?php $i++; } ?>
        </tbody>
    </table>
</body>
</html>