<?php
include "database.php";
$message = "";
$color = ""; 

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";

    if ($db->query($sql)) {
        $message = "Proses Berhasil. Silakan lanjutkan ke login.";
        $color = "success"; 
    } else {
        $message = "Proses Gagal. Silakan coba lagi.";
        $color = "error"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-side {
            flex: 1.5;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            color: #000000;
            font-size: 36px;
            margin-bottom: 40px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .input-group {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #c0c0c0;
            font-size: 16px;
            width: 100%;
            background-color: #f8f8f8;
        }

        .create-account {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            background-color: #1a73e8;
            color: white;
            align-self: flex-end;
        }

        .create-account:hover {
            background-color: #0059c0;
        }

        p {
            color: #333;
            font-size: 14px;
            text-align: center;
        }

        p a {
            color: #1a73e8;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        .message {
            padding: 10px;
            color: white;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .success {
            background-color: #1a73e8; 
        }

        .error {
            background-color: #e57373; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-side"></div>
        <div class="form-side">
            <h2>Sign up</h2>
            <?php if (!empty($message)): ?>
                <div class="message <?php echo $color; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form action="signup.php" method="POST">
                <div class="input-group">
                    <input type="text" name="firstname" placeholder="First Name" required />
                    <input type="text" name="lastname" placeholder="Last Name" required />
                </div>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit" name="register" class="create-account">Create Account</button>
                <p>Sudah punya akun? <a href="login.php">Log In</a></p>
            </form>
        </div>
    </div>
</body>
</html>
