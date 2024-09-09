<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = isset($_POST['email']) ? $_POST['email'] : null; // ternary operation
    $password = isset($_POST['password']) ? $_POST['password'] : null; // ternary operation

    $errors = [];

    if(!$email || strpos($email, "@") === false){
        $errors['email'] = "Please enter a valid email address";
    }

    if(!$password || strlen($password) < 8){
        $errors['password'] = "Password must be at least 8 characters long.";
    }

    // generoidaan vastaus virheiden perusteella
    if(count($errors) > 0){
        // Lisätään virhekoodi: validation error 422
        http_response_code(422);

        echo "
                <ul id='form-errors'>
        ";
        foreach($errors as $error){
            echo "<li>{$error}</li>";
        }
        echo "
                </ul>
        ";

    } elseif(1 === 1){ // Testataan virhe tilannetta, tämä haara aktivoituu aina ennen alempaa haaraa
        // header("HX-Retarget: .control"); // korvattu response-targets lisäosalla
        header("HX-Reswap: beforebegin"); // Voisi korvata käyttämällä uutta diviä index-sivulla
        // Lisätään virhekoodi: internal server error 500
        http_response_code(500);
        echo "<p class=\"error\">A server-side error occurred. Please try again,</p>";
    }
    else {
        // jos ei ole virheitä, tehdään uudelleenohjaus sivuston sisältöön
        header("HX-Redirect: authenticated.php");

        // echo ""; // ei virheitä
    }
}

?>