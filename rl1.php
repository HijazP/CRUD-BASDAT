<?php
    require("auth.php");
    require("configPDO.php");
    require("configMYSQLi.php");

    $user = $_SESSION["user"]["username"];
    
    if (isset($_POST['submit_movie'])) { // submit movie ke non_works
        $movie_id = $_POST['movie_id'];
            mysqli_query($conn, "INSERT INTO non_works (username, fk_movie_id) VALUES ('$user', '$movie_id')"); // nambah task
    }

    if (isset($_POST['submit_staycation'])) { // submit staycation ke non_works
        $staycation_id = $_POST['staycation_id'];
            mysqli_query($conn, "INSERT INTO non_works (username, fk_staycation_id) VALUES ('$user', '$staycation_id')"); // nambah task
    }

    $result_movies = mysqli_query($conn, "SELECT * FROM movies");
    $result_staycation = mysqli_query($conn, "SELECT * FROM staycation");
    $result_rl_movies = mysqli_query($conn, "SELECT non_works.fk_movie_id, movies.title FROM non_works INNER JOIN movies ON non_works.fk_movie_id = movies.movie_id");
    $result_rl_staycation = mysqli_query($conn, "SELECT non_works.fk_staycation_id, staycation.staycation_place FROM non_works INNER JOIN staycation ON non_works.fk_staycation_id = staycation.staycation_id");

    // delete movie
    if (isset($_GET['movie_del'])) {
        $fk_movie_id = $_GET['movie_del'];
        mysqli_query($conn, "DELETE FROM non_works WHERE fk_movie_id=$fk_movie_id"); // delete di db nya
        header('location: rl1.php');
    }

    // delete staycation
    if (isset($_GET['staycation_del'])) {
        $fk_staycation_id = $_GET['staycation_del'];
        mysqli_query($conn, "DELETE FROM non_works WHERE fk_staycation_id=$fk_staycation_id"); // delete di db nya
        header('location: rl1.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RL Bismillah</title>
</head>
<body>
    
    <!-- form submit movie -->
    <form action="" method="POST">
        <label for="">Judul Film - Genre - Rating</label><br>
        <select name="movie_id">
            <option value="">--Pilih Film--</option>
            <?php while($row = mysqli_fetch_array($result_movies)) { ?>
                <option value="<?php echo $row['movie_id']; ?>"><?php echo $row['title'] ?> - <?php echo $row['genre'] ?> - <?php echo $row['imdb_rating'] ?></option>
            <?php } ?>
        </select>

        <button type="submit" name="submit_movie">+</button>
    </form>

    <form action="" method="POST">
        <label for="">Tempat - Provinsi</label><br>
        <select name="staycation_id">
            <option value="">--Pilih Tempat Staycation--</option>
            <?php while($row = mysqli_fetch_array($result_staycation)) { ?>
                <option value="<?php echo $row['staycation_id']; ?>"><?php echo $row['staycation_place'] ?> - <?php echo $row['province_name'] ?></option>
            <?php } ?>
        </select>

        <button type="submit" name="submit_staycation">+</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>Kegiatan</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php $i = 1; while ($row = mysqli_fetch_array($result_rl_movies)) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td class="task">Menonton film <?php echo $row['title']; ?></td>
                <td class="delete">
                    <a href="rl1.php?movie_del=<?php echo $row['fk_movie_id'] ?>">x</a>
                </td>
            </tr>
        <?php $i++; } ?>

        <?php while ($row = mysqli_fetch_array($result_rl_staycation)) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td class="task">Pergi ke <?php echo $row['staycation_place']; ?></td>
                <td class="delete">
                    <a href="rl1.php?staycation_del=<?php echo $row['fk_staycation_id'] ?>">x</a>
                </td>
            </tr>
        <?php $i++; } ?>
        </tbody>
    </table>
</body>
</html>