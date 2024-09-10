<?php

require_once "../data/products.php";

// Yksinkertainen routing
// /shopping-spa?page=product => /shopping-spa/product
$page = $_GET["page"] ?? "home";

// Jokainen yhteys tulee tätä kautta
// Tässä voidaan suorittaa koodia, jota tarvitaan joka sivulla "middleware"

switch($page){
    case "product":
        require "../routes/product.php";
        break;
    case "login":
        require "../routes/login.php"; // esimerkki
        break;
    default:
        require "../routes/home.php";
}

?>