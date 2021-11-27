<?php
include './connect.php';

$sql = "
            SELECT
                k.id as id,
                k.naziv as naziv,
                k.autor as autor,
                k.cijena as cijena,
                g.naziv_kategorije as kategorijaa

                FROM knjige as k
                JOIN kategorija as g
                ON k.kategorija_id = g.id
                
                ORDER BY id ASC
            ";
$res = mysqli_query($dbconn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="./novi_proizvod.php" class="btn btn-secondary mt-5">Dodaj novi proizvod</a>
            </div>
            <div class="col-12">
                <h1 class="text-center mb-5 mt-3">Lista knjiga</h1>

                <table class="table table-warning">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Cijena</th>
                            <th scope="col">Kategorija</th>
                            <th scope="col">Brisanje</th>
                            <th scope="col">Izmjena</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id_temp = $row['id'];
                            $naziv_temp = $row['naziv'];
                            $autor_temp = $row['autor'];
                            $cijena_temp = $row['cijena'];
                            $kategorija_temp = $row['kategorijaa'];
                            $link_brisanje = "<a href=\"brisi_proizvod.php?id=$id_temp\"><i class=\"bi bi-x-circle-fill\"></i></a>";
                            $link_izmjena = "<a href=\"izmjena_proizvoda.php?id=$id_temp\"><i class=\"bi bi-pen-fill\"></i></a>";

                            echo "<tr>";

                            echo "<td>$id_temp</td>";
                            echo "<td>$naziv_temp</td>";
                            echo "<td>$autor_temp</td>";
                            echo "<td>$cijena_temp</td>";
                            echo "<td>$kategorija_temp</td>";
                            echo "<td>$link_brisanje</td>";
                            echo "<td>$link_izmjena</td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>