<?php

include "./connect.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_za_izmjenu = $_GET['id'];
} else {
    exit("Morate odabrati ID knjige za izmjenu");
}

$sql = "SELECT * FROM knjige WHERE id=$id_za_izmjenu";
$res = mysqli_query($dbconn, $sql);
$row = mysqli_fetch_assoc($res);

$naziv_knjige = $row['naziv'];
$autor_knjige = $row['autor'];
$cijena_knjige = $row['cijena'];
$kategorija_id = $row['kategorija_id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmjena knjige</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <h3 class="text-center mt-5 mb-5">Izmjena knjige</h3>
            </div>

            <div class="col-8">
                <form action="./izmijeni_proizvod.php" method="POST">
                    <input type="hidden" name="id_za_izmjenu" id="id_za_izmjenu" value="<?= $id_za_izmjenu ?>">
                    <div class="mb-3">
                        <label for="naziv" class="form-label">Naziv knjige</label>
                        <input type="text" name="naziv" id="naziv" class="form-control" value="<?php echo $naziv_knjige ?>">
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control" value="<?php echo $autor_knjige ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cijena" class="form-label">Cijena</label>
                        <input type="number" name="cijena" id="cijena" class="form-control" value="<?php echo $cijena_knjige ?>">
                    </div>
                    <div class="mb-3">
                        <label for="kategorija" class="form-label">Kategorija</label>
                        <select name="kategorija" id="kategorija" class="form-control">
                            <!-- <option value="">odaberi kategoriju</option> -->
                            <?php
                            $sql_kat = "SELECT * FROM kategorija";
                            $res_kat = mysqli_query($dbconn, $sql_kat);
                            while ($row_kat = mysqli_fetch_assoc($res_kat)) {
                                $id_temp = $row_kat['id'];
                                $naziv_temp = $row_kat['naziv_kategorije'];

                                $selected = "";
                                if ($id_temp == $kategorija_id) {
                                    $selected = "selected";
                                }

                                echo "<option value=\"$id_temp\" $selected>$naziv_temp</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-secondary mt-3" value="Izmijeni">Izmijeni</button>
                </form>

            </div>

        </div>

    </div>
</body>

</html>