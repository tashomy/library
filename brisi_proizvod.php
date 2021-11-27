<?php

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id_za_brisanje = $_GET['id'];
    } else {
        exit("Morate odabrati ID proizvoda za brisanje!");
    }

    $sql_delete = " DELETE FROM knjige WHERE id = $id_za_brisanje ";
    $res_delete = mysqli_query($dbconn, $sql_delete);

    if ($res_delete) {
        header("location: ./index.php");
        exit();
    } else {
        exit("Greska u upitu za brisanje!");
    }
} else {
    exit("Nedozvoljen metod!");
}
