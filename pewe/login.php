<?php
include "database.php";
session_start();
$message = "";  
$color = "";    

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["email"] =  $email;
        $_SESSION["firstname"] = $data['firstname'];
        header("Location: index.php");
        exit();
    } else {
        $message = "Email atau Password salah, silakan coba lagi.";
        $color = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login - iFESTPHORIA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Arial", sans-serif;
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            background-color: white;
            width: 80%;
            max-width: 1200px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            height: 450px;
            overflow: hidden;
        }

        .left-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }

        .left-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .right-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            padding: 10px;
            color: white;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .error {
            background-color: #e57373; 
        }

        .signup-prompt {
            color: #333;
            font-size: 14px;
            text-align: left;
            margin-top: 20px;
        }

        .signup-prompt a {
            color: #1a73e8;
            font-weight: bold;
            text-decoration: none;
        }

        .signup-prompt a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="qr-illustration">
                <img src="Login.jpg" alt="Login Image" />
            </div>
        </div>
        <div class="right-section">
            <h2>Login ke iFESTPHORIA</h2>
            <p>Web pendaftaran pemesanan tiket</p>

            <?php if (!empty($message)): ?>
                <div class="message <?php echo $color; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" required />
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" required />
                    <button type="submit" name="login">Login</button>
                    <p class="signup-prompt">Belum punya akun? <a href="signup.php">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
