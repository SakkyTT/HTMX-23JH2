<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login HTMX</title>
    <script src="htmx.js" defer></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <form hx-post="login.php">
            <img src="images/lock.jpg" alt="icon of a pixel art padlock">
            <div class="control">
                <label for="email">Email</label>
                <input id="email" type="email" name="email"
                    hx-post="validate.php"
                    hx-target="next p"
                >
                <p class="error"></p>
            </div>
            <div class="control">
                <label for="password">Password</label>
                <input id="password" type="password" name="password"
                    hx-post="validate.php"
                    hx-target="next p"
                >
                <p class="error"></p>
            </div>
            <button type="submit">
                Login
            </button>
        </form>
    </main>
</body>
</html>