<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFESTPHORIA</title>
    <style>
        nav {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 20px 30px;
            background-color: #624e88;
        }

        nav .logo {
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            margin-right: auto;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        nav ul li {
            display: inline-block;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ddd;
        }

        .login-btn, .signup-btn {
            background-color: #ffffff;
            color: #3f2b96;
            padding: 5px 15px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            margin-left: 10px;
        }

        .login-btn:hover, .signup-btn:hover {
            background-color: #3f2b96;
            color: #ffffff;
        }

        .nav-username, .logout-btn {
            color: white;
            font-size: 16px;
            margin-right: 10px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-username:hover, .logout-btn:hover {
            color: #ddd;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <a href="index.php" class="logo">iFESTPHORIA</a>
        <?php 
        if (isset($_SESSION['firstname'])) {
            echo "<span class='nav-username'>".$_SESSION['firstname']."</span>";
            echo "<a href='logout.php' class='logout-btn'>Logout</a>";
        } else { 
        ?>
            <a href="login.php" class="login-btn">Login</a>
            <a href="signup.php" class="signup-btn">Signup</a>
        <?php 
        } 
        ?>
    </nav>
</header>
</body>
</html>
