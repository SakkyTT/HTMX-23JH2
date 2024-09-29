<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Demo</title>
     <link rel="stylesheet" href="main.css">
     <script src="https://unpkg.com/htmx.org@2.0.0/dist/htmx.min.js"></script>
     <script src="https://unpkg.com/htmx-ext-sse@2.2.2/sse.js"></script>
     <script >
        function toggleChatbox(){
            // Näytetään chat ja piilotetaan nappi
            const chatbox = document.getElementById('chat');
            const toggleButton = document.getElementById('show');
             // lisää, jos ei ole luokkaa, tai poistaa
            chatbox.classList.toggle('open');
            toggleButton.classList.toggle('hidden'); // lisää aina
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('htmx:sseBeforeMessage', function(e) {
                const element = document.querySelector('.reply-message-goes-here');
        
                    // Check if the element exists
                    if (element) {
                        // Scroll the element into view
                        element.scrollIntoView({ behavior: 'smooth' });
                    }
            });
});
     </script>
</head>
<body>
    <!-- Tässä on verkkosivun muu sisältö -->
    <?php include("chatbox.php"); ?>
</body>
</html>