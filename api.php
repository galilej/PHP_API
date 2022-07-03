<?php
$con = mysqli_connect("localhost", "root", "", "galis_ms");
$response = array();
if ($con) {
    echo "DB Connected!";
    $sql = "select * from drzave";
    $result = mysqli_query($con, $sql);
    if ($result) {
        //header("Content Type: JSON");
        //header('Content-Type: JSON; charset=utf-8');
        header('Content-Type: JSON; charset=utf-8');
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['id_drzava'] = $row['id_drzava'];
            $response[$i]['drzava'] = $row['drzava'];
            $response[$i]['sifra_drzave'] = $row['sifra_drzave'];
            //$response[$i]['ime'] = $row['ime'];
            //$response[$i]['ime_oca'] = $row['ime_oca'];

            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo "Database connection failed!";
}
