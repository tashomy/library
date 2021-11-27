<?php

include './connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['naziv']) && $_POST['naziv'] != "") {
        $naziv = $_POST['naziv'];
    } else {
        exit("Morate unijeti naziv knjige!");
    }
    if (isset($_POST['autor']) && $_POST['autor'] != "") {
        $autor = $_POST['autor'];
    } else {
        exit("Morate unijeti autora knjige!");
    }
    if (isset($_POST['cijena']) && is_numeric($_POST['cijena'])) {
        $cijena = $_POST['cijena'];
    } else {
        exit("Morate unijeti cijenu proizvoda!");
    }
    if (isset($_POST['kategorija']) && is_numeric($_POST['kategorija'])) {
        $kategorija = $_POST['kategorija'];
    } else {
        exit("Morate odabrati kategoriju!");
    }
    // salje se u skrivenom polju
    if (isset($_POST['id_za_izmjenu']) && is_numeric($_POST['id_za_izmjenu'])) {
        $id_za_izmjenu = $_POST['id_za_izmjenu'];
    } else {
        exit("Morate predati ID!");
    }

    $sql_update = "
					UPDATE knjige SET  
										naziv = '$naziv',
                                        autor = '$autor',
										cijena = $cijena,
										kategorija_id = $kategorija
					WHERE id = $id_za_izmjenu
				";
    $res_update = mysqli_query($dbconn, $sql_update);

    if ($res_update) {
        header("location: ./index.php");
        exit();
    } else {
        exit("Greska u upitu za izmjenu! $sql_update");
    }
} else {
    exit("Nedozvoljen metod!");
}
