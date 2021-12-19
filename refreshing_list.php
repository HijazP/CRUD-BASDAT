<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
    <!-- bootstrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<?php
  
    $servername     = "localhost";
    $database       = "lupa kemaren dari hanip"; 
    $username       = "root";
    $password       = "";

    // jadi ini buat konekin nya
    $conn   = mysqli_connect($servername, $username, $password, $database);

    //jika user udah milih movie, masukin ke $cari
    if(isset($_GET['movie'])){
        $cari = $_GET['movie'];

        //ambil data dari database, dimana pencarian sesuai dengan variabel cari
        $data = mysqli_query($conn, "select * from movie_list where movie = '$cari'");
		
    }else{

        //tapi klo belum diset, maka jangan tampilkan apapun
        $data = [];		
    }
?>
<body>
<br>
    <div class="container jumbotron">
    <!-- form dropdown movie dengan id = form_id -->
        <form action="index.php" method="GET" id="form_id">
            <div class="form-group">
                <label for="exampleInputEmail1">Movie</label>

                <select class="form-control" name="movie" onChange="document.getElementById('form_id').submit();">
                    <option value="">--Choose Movie--</option>
                    <option <?php if(!empty($cari)){ echo $cari == 'Spiderman-No Way Home' ? 'selected':''; } ?> value="Spiderman-No Way Home">Spiderman-No Way Home</option>
                    <option <?php if(!empty($cari)){ echo $cari == 'The Good Doctor' ? 'selected':''; } ?> value="The Good Doctor">The Good Doctor</option>
                    <option <?php if(!empty($cari)){ echo $cari == 'Crash Landing On You' ? 'selected':''; } ?> value="Crash Landing On You">Crash Landing On You</option>
                    <option <?php if(!empty($cari)){ echo $cari == 'Ali & Ratu-Ratu Queens' ? 'selected':''; } ?> value="Ali & Ratu-Ratu Queens">Ali & Ratu-Ratu Queens</option>
                </select>
            </div>
        </form>
    </div>

    <div class="container jumbotron">
    <!-- form dropdown staycation dengan id = form_id -->
        <form action="index.php" method="GET" id="form_id">
            <div class="form-group">
                <label for="exampleInputEmail1">Staycation</label>

                <select class="form-control" name="movie" onChange="document.getElementById('form_id').submit();">
                    <option value="">--Choose Place--</option>
                    <option <?php if(!empty($cari)){ echo $cari == 'Seminyak, Bali' ? 'selected':''; } ?> value="Seminyak, Bali">Seminyak, Bali</option>
                    <option <?php if(!empty($cari)){ echo $cari == 'Raja Ampat, Papua' ? 'selected':''; } ?> value="Raja Ampat, Papua">Raja Ampat, Papua</option>
                    <option <?php if(!empty($cari)){ echo $cari == 'Lembang, Bandung' ? 'selected':''; } ?> value="Lembang, Bandung">Lembang, Bandung</option>
                    <option <?php if(!empty($cari)){ echo $cari == 'Sabang, Aceh' ? 'selected':''; } ?> value="Sabang, Aceh">Sabang, Aceh</option>
                </select>
            </div>
        </form>
    </div>
</body>

</html>