<?php
    require("auth.php");
    require("configPDO.php");
    require("configMYSQLi.php");

    $errors = ""; //declare variabel eror
    
    if (isset($_POST['tdl_submit'])) { // biar submit buttonnya work
        $tdl_task = $_POST['tdl_task'];
        if (empty($tdl_task)) {
            $errors = "Tugas tidak boleh kosong"; // kalo kosong bakal eror
        }
        else {
            $user = $_SESSION["user"]["username"];
            mysqli_query($conn, "INSERT INTO works (username, to_do_list_task) VALUES ('$user', '$tdl_task')"); // nambah task
        }
    }

    // delete task
    if (isset($_GET['tdl_task_del'])) {
        $works_id = $_GET['tdl_task_del'];
        mysqli_query($conn, "DELETE FROM works WHERE works_id=$works_id"); // delete di db nya
        header('location: tdl.php');
    }

    $tdl_tasks = mysqli_query($conn, "SELECT * FROM works WHERE to_do_list_task IS NOT NULL");
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
    <title>To-do List <?php echo $_SESSION["user"]["username"] ?></title>
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

    <h1 class="pagemark">To-do List</h1>

    <form class="tdlbox" action="" method="POST">
        <input class="tdlinput" type="text" name="tdl_task" placeholder="Tambahkan tugasmu">
        <button class="add" type="submit" name="tdl_submit">+</button>
    </form>
    
    <div class="error">
        <?php if (isset($errors)) { ?>
            <p><?php echo $errors; ?><br></p>
        <?php } ?>
    </div>

    <div class="tbl">
        <table id="tabel">
            <thead>
                <tr>
                    <th>N</th>
                    <th>Task</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php $i = 1; while ($row = mysqli_fetch_array($tdl_tasks)) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td class="task"><?php echo $row['to_do_list_task']; ?></td>
                    <td width="10%">
                        <a href="tdledit.php?works_id=<?php echo $row['works_id'] ?>">edit</a>
                    </td>
                    <td width="10%">
                        <a href="tdl.php?tdl_task_del=<?php echo $row['works_id'] ?>">x</a>
                    </td>
                </tr>

            <?php $i++; } ?>
            </tbody>
        </table>
    </div>

</body>
</html>