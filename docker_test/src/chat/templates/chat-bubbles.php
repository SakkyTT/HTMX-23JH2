<?php

function generateSentMessage(
        $content,
        $sentAt,
        $username = null,
        $parentMessageId = null){
    ?>
    <!-- HTML koodit -->
     <div class="message sent-container">
         <div class="message-content message-sent">
             <p class="text">
                <?= htmlspecialchars($content) ?>
             </p>
             <div class="message-footer">
                <p class="reply">Reply</p>
                <p class="time">
                    <?= htmlspecialchars(date('H:i', strtotime($sentAt))) ?>
                </p>
             </div>
         </div>
     </div>
    <?php
}

function generateReceivedMessage($username, $content, $parentMessageId, $sentAt){
    ?>
    <!-- HTML koodit -->
     <div class="message">
        <div class="icon">
            <h2>
                <?= htmlspecialchars(strtoupper($username[0])) ?>
            </h2>
        </div>
         <div class="message-content message-received">
             <p class="text">
                <?= htmlspecialchars($content) ?>
             </p>
             <div class="message-footer">
                <p class="reply">Reply</p>
                <p class="time">
                    <?= htmlspecialchars(date('H:i', strtotime($sentAt))) ?>
                </p>
             </div>
         </div>
     </div>
    <?php
}

function generateReceivedMessageStream($username, $content, $parentMessageId, $sentAt){
    $result = "";
    $result .= "<div class=\"message\">";
    $result .= "    <div class=\"icon\">";
    $result .= "        <h2>";
    $result .= "            " . htmlspecialchars(strtoupper($username[0])) . "";
    $result .= "        </h2>";
    $result .= "    </div>";
    $result .= "    <div class=\"message-content message-received\">";
    $result .= "        <p class=\"text\">";
    $result .= "            " . htmlspecialchars($content) . "";
    $result .= "        </p>";
    $result .= "        <div class=\"message-footer\">";
    $result .= "            <p class=\"reply\">Reply</p>";
    $result .= "            <p class=\"time\">";
    $result .= "                " . htmlspecialchars(date('H:i', strtotime($sentAt))) . "";
    $result .= "            </p>";
    $result .= "        </div>";
    $result .= "    </div>";
    $result .= "</div>";
    return $result;
}


?>