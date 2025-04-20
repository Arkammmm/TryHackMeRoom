<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HackMe Search - XSS Challenge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to HackMe Search</h1>
            <p class="subtitle">The most vulnerable search engine on the web!</p>
        </header>
        
        <nav>
            <a href="Index.php" class="active">Search</a>
            <a href="login.php">Admin Login</a>
        </nav>
        
        <main>
            <div class="search-container">
                <h2>Search Our Database</h2>
                <form action="" method="GET">
                    <input type="text" name="query" placeholder="Try searching for 'hacking'..." value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                    <button type="submit">Search</button>
                </form>
                
                <?php
                if (isset($_GET['query'])) {
                    $query = $_GET['query'];
                    echo "<div class='search-results'>";
                    echo "<h3>Results for: " . htmlspecialchars($query) . "</h3>";
                    
                    // Vulnerable to XSS - we're intentionally not escaping the output here
                    if (preg_match('/<script>/i', $query)) {
                        header("Location: XSS_flag.php");
                        exit();
                    }
                    
                    echo "<p>No results found. Try a different search term.</p>";
                    echo "</div>";
                }
                ?>
            </div>
            
            <div class="hint-box">
                <h3>Challenge Hint</h3>
                <p>This search page is vulnerable to Reflected XSS. Try injecting a script tag!</p>
            </div>
        </main>
        
        <footer>
            <p>© 2023 HackMe Vulnerable Web Applications. All rights reserved.</p>
        </footer>
    </div>
    
    <script src="script.js"></script>
</body>
</html>