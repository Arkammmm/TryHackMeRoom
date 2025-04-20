<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Challenge Solved!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Congratulations!</h1>
            <p class="subtitle">You've successfully exploited the XSS vulnerability!</p>
        </header>
        
        <nav>
            <a href="index.php">Search</a>
            <a href="login.php">Admin Login</a>
        </nav>
        
        <main>
            <div class="flag-container">
                <h2>Your Flag:</h2>
                <div class="flag">
                    THM{XSS_MASTER_1337}
                </div>
                <p>You successfully executed a Reflected XSS attack by injecting a script tag!</p>
                
                <div class="lesson">
                    <h3>What You Learned:</h3>
                    <p>Reflected XSS occurs when user input is immediately returned by the web application in an unsafe way, allowing execution of malicious scripts.</p>
                    <p>To prevent this, always sanitize user input and use proper output encoding (like htmlspecialchars() in PHP).</p>
                </div>
            </div>
        </main>
        
        <footer>
            <p>© 2023 HackMe Vulnerable Web Applications. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>