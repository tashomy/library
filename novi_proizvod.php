<?php

include './connect.php';

$sql = "
            SELECT 
                g.id as id_kategorije,
                g.naziv_kategorije as naziv_kategorije

            FROM kategorija as g
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
    <title>Dodaj novi proizvod</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class=" col-12">
                <h3 class="text-center mt-5 mb-5">Dodaj novi proizvod</h3>
            </div>
            <div class="col-8">
                <form action="./dodaj_proizvod.php" method="POST">
                    <div class="mb-3">
                        <label for="naziv" class="form-label">Naziv knjige</label>
                        <input type="text" name="naziv" id="naziv" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="cijena" class="form-label">Cijena</label>
                        <input type="number" name="cijena" id="cijena" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="kategorija" class="form-label">Kategorija</label>
                        <select name="kategorija" id="kategorija" class="form-control">
                            <option value="">izaberi kategoriju</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id_temp = $row['id_kategorije'];
                                $naziv_temp = $row['naziv_kategorije'];
                                echo "<option value=\"$id_temp\">$naziv_temp</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-secondary mt-3">Dodaj</button>
                </form>

            </div>
        </div>

    </div>
</body>

</html>