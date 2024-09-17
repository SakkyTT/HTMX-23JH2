<?php
    session_start();

    include "templates/chat-bubbles.php";
    include "db_connection.php";

    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    header('Connection: keep-alive');

    $i = 1;
    while($i <= 1){
        //echo "data: terve\n\n";

        // Tässä pitäisi olla event-driven architecture.
        // Joka lähettää käyttäjän selaimelle uuden vastauksen vain, jos jotakin
        // uutta on tapahtunut.
        // EDA ei myöskään lukitse palvelimen suoritusta samalla tavalla kuin 
        // while(sleep(1));
        // Tällä hetkellä tämä toimii samalla tavalla kuin
        // selaimen polling-ominaisuus.

        // Tämä stream jatkuvasti tarkistaa tietokantaa ja
        // palauttaa uuden viestin käyttäjälle.


        $chat_id = $_SESSION["chat_id"];
        $user_id = $_SESSION["user_id"];
        $latest_id = $_SESSION["latest_id"];

        $query = '
            SELECT
                m.message_id,
                m.content,
                m.user_id,
                u.username,
                m.parent_message_id,
                m.sent_at
            FROM messages m
            JOIN users u ON m.user_id = u.user_id
            WHERE m.chat_id = ?
            AND m.message_id > ?
            AND m.user_id != ?
            ORDER BY m.message_id ASC
        ';

        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("iii", $chat_id, $latest_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if(!$result){
            die("Query failed!: " . $mysqli->error);
        }

        // Tietokannan haku
        $messages = [];
        while($row = $result->fetch_assoc()){
            // Siirretään data taulukkoon
            $messages[] = $row;
        }
        // testaus SQL INSERT INTO messages (chat_id, user_id, content, sent_at) VALUES (1, 2, "SSE", NOW())
        if(count($messages) > 0){
            $message = $messages[0];
            $_SESSION["latest_id"] = $message["message_id"];
            // echo "data: \<test\>\n\n";
            $newMessage = generateReceivedMessageStream($message['username'], 
            $message['content'],
            $message['parent_message_id'], $message['sent_at']);
            echo "data: ". $newMessage ."\n\n";
            flush();
        }

        $i++;
        sleep(1);
    }
    // 1. Tämä silmukka tapahtuu 3 kertaa.
    // 2. Palautetaan käyttäjälle 3 kertaa tietokannasta data
    // 3. Lopetetaan suoritus/katkaistaan yhteys
    // 4. HTMX havaitsee katkoksen ja ottaa yhteyden uudelleen
    // GOTO step 1.
?>