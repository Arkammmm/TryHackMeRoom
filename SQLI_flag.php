<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLi Challenge Solved!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Congratulations!</h1>
            <p class="subtitle">You've successfully exploited the SQL injection vulnerability!</p>
        </header>
        
        <nav>
            <a href="index.php">Search</a>
            <a href="login.php">Admin Login</a>
        </nav>
        
        <main>
            <div class="flag-container">
                <h2>Your Flag:</h2>
                <div class="flag">
                    THM{SQLI_MASTER_1337}
                </div>
                <p>You successfully bypassed authentication using SQL injection!</p>
                
                <div class="lesson">
                    <h3>What You Learned:</h3>
                    <p>SQL injection occurs when user input is directly concatenated into SQL queries, allowing attackers to manipulate database queries.</p>
                    <p>To prevent this, always use prepared statements with parameterized queries.</p>
                </div>
            </div>
        </main>
        
        <footer>
            <p>© 2023 HackMe Vulnerable Web Applications. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>