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

    $sql_insert = " INSERT INTO knjige  
									(
										naziv,
                                        autor,
										cijena,
										kategorija_id
									)
								VALUES
									(
										'$naziv',
                                        '$autor',
										$cijena,
										$kategorija
									)
						";
    $res_insert = mysqli_query($dbconn, $sql_insert);

    if ($res_insert) {
        header("location: ./index.php");
        exit();
    } else {
        exit("Greska pri izvrsavanju upita! ");
    }
} else {
    exit("Nedozvoljen metod!");
}
