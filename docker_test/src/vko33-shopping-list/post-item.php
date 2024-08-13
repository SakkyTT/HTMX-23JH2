<?php

session_start();

// Otetaan vastaan POST ja tallennetaan sessioon uusi item

// Onko POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Onko POST:n mukana 'item'
    if(isset($_POST['item'])){
        // Tallennus SESSIOON
        $_SESSION['items'][] = $_POST['item'];

        // Palautuksena riittää pelkkä uusin li-elementti
        echo "
        <li>
            <span>". htmlspecialchars($_POST['item']) ."</span>
            <button>Remove</button>
        </li>
        ";
    }
    else {
        echo "POST mukana puuttuu 'item' parametri";
    }
}
else {
    echo "ei ole POST metodi";
}

exit();
?>