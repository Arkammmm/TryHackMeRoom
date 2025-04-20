<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SQLi Challenge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Login</h1>
            <p class="subtitle">Restricted Access Area</p>
        </header>
        
        <nav>
            <a href="index.php">Search</a>
            <a href="login.php" class="active">Admin Login</a>
        </nav>
        
        <main>
            <div class="login-container">
                <h2>Please Log In</h2>
                
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    // Vulnerable SQL query - intentionally insecure for the challenge
                    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                    
                    // Improved SQL injection detection
                    $sql_injection_patterns = [
                        '/\'\s*OR\s*[\'"]?[\w\s]+\s*=\s*[\'"]?[\w\s]+/i',  // Matches ' OR 1=1, " OR "1"="1, etc.
                        '/\'\s*--/',  // Matches SQL comments
                        '/\'\s*;/',   // Matches query termination
                        '/\'\s*UNION\s+SELECT/i',  // Matches UNION SELECT
                        '/\'\s*AND\s+1=1/i',  // Matches AND 1=1
                        '/\'\s*OR\s+\d+=\d+/i',  // Matches OR 1=1, OR 2=2, etc.
                        '/\'\s*OR\s+\w+\s*=\s*\w+/i',  // Matches OR a=b
                        '/\'\s*OR\s+\w+\s*LIKE\s*\'%/i',  // Matches OR username LIKE '%
                        '/\'\s*OR\s+\w+\s*IS\s+NULL/i'  // Matches OR username IS NULL
                    ];
                    
                    $is_sqli = false;
                    foreach ($sql_injection_patterns as $pattern) {
                        if (preg_match($pattern, $username) || preg_match($pattern, $password)) {
                            $is_sqli = true;
                            break;
                        }
                    }
                    
                    if ($is_sqli) {
                        header("Location: SQLI_flag.php");
                        exit();
                    }
                    
                    echo "<div class='error-message'>Invalid username or password. The query was: " . htmlspecialchars($query) . "</div>";
                }
                ?>
                
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <button type="submit">Login</button>
                </form>
            </div>
            
            <div class="hint-box">
                <h3>Challenge Hint</h3>
                <p>This login form is vulnerable to SQL injection. Try bypassing authentication with classic payloads like:</p>
                <ul>
                    <li><code>' OR 1=1 --</code></li>
                    <li><code>admin' -- </code></li>
                    <li><code>' OR 1=1# </code></li>
                    <li><code>' OR a=a</code></li>
                </ul>
            </div>
        </main>
        
        <footer>
            <p>© 2023 HackMe Vulnerable Web Applications. All rights reserved.</p>
        </footer>
    </div>
    
    <script src="script.js"></script>
</body>
</html>