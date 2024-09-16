<?php

// Kovakoodataan kirjautunut käyttäjä ja valittu chat
// Nämä viittaa tietokannan Id sarakkeeseen
$_SESSION["user_id"] = 1;
$_SESSION["chat_id"] = 1;

// Jostakin syystä tarvitaan id erillisessä muuttujassa
// $_SESSION ei toiminut
$user_id = $_SESSION["user_id"];

// Tietokannan haku
$messages = [];

?>

<div id="chat" class="chatbox">
    <header class="chat-header">
        <h2>Chat</h2>
        <div class="buttons">
            <button><img src="" alt="_"></button>
            <button><img src="" alt="X"></button>
        </div>
    </header>
    <main>
        <!-- Generoidaan tietokannasta viestit HTML muotoon -->
        <?php foreach($messages as $message): ?>
            <?php
                // Käyttäjän omat viestit
                if($message['user_id'] == $user_id){
                    generateSentMessage($message['username'], $message['content'],
                     $message['parent_message_id'], $message['sent_at']);
                }else{
                    // Muiden viestit
                    generateReceivedMessage($message['username'], $message['content'],
                     $message['parent_message_id'], $message['sent_at']);
                }
            ?>
        <?php endforeach; ?>
        <div class="reply-message-goes-here"></div>
    </main>
    <footer>
        <div>
            <form>
                <textarea name="chat-input" required></textarea>
                <button>
                    <div id="svg-wrapper">
                        <img src="arrow-icon.svg" alt="Arrow Icon">
                    </div>
                </button>
            </form>
        </div>
    </footer>
</div>