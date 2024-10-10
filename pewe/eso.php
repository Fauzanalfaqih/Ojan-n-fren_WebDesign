<?php
require "database.php";

if (isset($_POST['submit'])) {
    // Sanitasi input untuk mencegah SQL Injection
    $gender = mysqli_real_escape_string($db, $_POST["gender"]);
    $nama_lengkap = mysqli_real_escape_string($db, $_POST["nama_lengkap"]);
    $no_telpon = mysqli_real_escape_string($db, $_POST["no_telpon"]);
    $email1 = mysqli_real_escape_string($db, $_POST["email1"]); // Benar
    $unesa = mysqli_real_escape_string($db, $_POST["unesa"]);
    $non_unesa = mysqli_real_escape_string($db, $_POST["non_unesa"]);
    $pembayaran = mysqli_real_escape_string($db, $_POST["pembayaran"]);

    // Gunakan $email1 untuk query SQL
    $sql = "INSERT INTO pemesanan (gender, nama_lengkap, no_telpon, email1, unesa, non_unesa, pembayaran) 
            VALUES('$gender', '$nama_lengkap', '$no_telpon', '$email1', '$unesa', '$non_unesa', '$pembayaran')";

    // Eksekusi query dan cek apakah berhasil
    mysqli_query($db, $sql);
        
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket iFESTPHORIA</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('backroundform.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center; 
            height: 1000px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px; /* Add padding for better spacing */
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background for readability */
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px; /* Limit max width */
            margin: 0 auto; /* Center the form */
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #333;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-group input[type="radio"] {
            width: auto;
            margin-right: 5px;
        }
        .radio-group {
            display: flex;
            align-items: center;
        }
        .radio-group label {
            margin-right: 20px;
            font-size: 14px;
            color: #555;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .terms {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .terms input {
            margin-right: 10px;
        }
        .terms label {
            font-size: 12px;
            color: #666;
        }
        footer {
            background-color: #7e57c2;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php include "header.php"; ?> <!-- Include the header here -->
    <div class="container">
        <div class="form-container">
            <h2>Pesan Tiket ESO Cup</h2>
            <form action="esotiket.php" method="POST">
                <div class="form-group">
                    <label>Gender</label>
                    <div class="radio-group">
                        <label for="Pria">
                            <input type="radio" id="Pria" name="gender" value="Pria" checked>
                            Pria
                        </label>
                        <label for="Wanita">
                            <input type="radio" id="Wanita" name="gender" value="Wanita">
                            Wanita
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required placeholder="Masukkan nama lengkap">
                </div>
                <div class="form-group">
                    <label for="no_telpon">No. HP</label>
                    <input type="text" id="no_telpon" name="no_telpon" required placeholder="Masukkan no. HP">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email1" required placeholder="Masukkan email">
                </div>
                <div class="form-group">
                    <label for="unesa">Jumlah Mahasiswa UNESA</label>
                    <input type="number" id="unesa" name="unesa" value="0" min="0" required placeholder="Jumlah UNESA">
                </div>
                <div class="form-group">
                    <label for="non_unesa">Jumlah Mahasiswa Non-UNESA</label>
                    <input type="number" id="non_unesa" name="non_unesa" value="0" min="0" required placeholder="Jumlah Non-UNESA">
                </div>
                <div class="form-group">
                    <label for="pembayaran">Metode Pembayaran</label>
                    <select id="pembayaran" name="pembayaran" required>
                        <option value="cash">Tunai - Bayar langsung tunai di loket</option>
                    </select>
                </div>
                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Saya menyetujui syarat dan ketentuan yang berlaku</label>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Pesan Tiket</button>
                </div>
            </form>
        </div>
    </div>
    <?php include "footer.html"; ?> <!-- Include the footer here -->
    
    <script>
        const termsCheckbox = document.getElementById("terms");

        termsCheckbox.addEventListener("change", function() {
            if (termsCheckbox.checked) {
                alert("Anda telah menyetujui syarat dan ketentuan.");
            }
        });
    </script>
</body>
</html>
