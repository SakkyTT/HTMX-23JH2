<?php 

session_start();

include "data/images.php"; // $DATABASE_IMAGES muuttuja
include "components/image.php"; // renderImage()

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Käyttäjän klikkaaman kuvan id
    $imageId = $_POST['imageId'];

    // 1. Haetaan kuvan tiedot ID:n perusteella
    $image = null;
    // Jos tietokanta olisi käytössä, tässä haetaan ID:n perusteella tietokannasta
    foreach($DATABASE_IMAGES as $img){
        if($img['id'] === $imageId){
            $image = $img;
            break; // Voidaan lopettaa silmukka, kun id löytyy
        }
    }
    // 2. Lisätään kuvan data sessioon 'selected-images'
    if($image){
        $_SESSION['selected-images'][] = $image;
    }

    // 3. Palautetaan HTML, määritetään funktioon false, että kyseessä on DELETE-versio
    echo renderImage($image, false);
}

if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    if(isset($_GET['id'])){
        $imageId = $_GET['id'];
        print_r($_SESSION['selected-images']);
        echo "------------------------------------------------";
        // Etsitään sen taulukon indeksi, jossa on valitun kuvan id
        $imageIndex = null; // kuvan indeksi sessiossa
        foreach($_SESSION['selected-images'] as $index => $image){
            echo $index; // string
            print_r($image); // taulukot
        }
    }
}

?>