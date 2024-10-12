<?php
require "database.php"; 
session_start();

if (isset($_POST['submit'])) {

    $gender = mysqli_real_escape_string($db, $_POST["gender"]);
    $nama_lengkap = mysqli_real_escape_string($db, $_POST["nama_lengkap"]);
    $no_telpon = mysqli_real_escape_string($db, $_POST["no_telpon"]);
    $email1 = mysqli_real_escape_string($db, $_POST["email1"]); 
    $unesa = mysqli_real_escape_string($db, $_POST["unesa"]);
    $non_unesa = mysqli_real_escape_string($db, $_POST["non_unesa"]);
    $pembayaran = mysqli_real_escape_string($db, $_POST["pembayaran"]);

 
    $sql = "INSERT INTO pemesanan (gender, nama_lengkap, no_telpon, email1, unesa, non_unesa, pembayaran) 
            VALUES('$gender', '$nama_lengkap', '$no_telpon', '$email1', '$unesa', '$non_unesa', '$pembayaran')";


    if (mysqli_query($db, $sql)) {

        $last_id = mysqli_insert_id($db); 
        $sql = "SELECT * FROM pemesanan WHERE id = $last_id"; 
        $result = mysqli_query($db, $sql);
    } else {
        echo "Error: " . mysqli_error($db);
    }
}


echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pemesanan Tiket</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; 
        }
        html, body {
            height: 100%;
            background-color: #d3d3d3; 
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: calc(100% - 160px); 
            padding: 20px; 
        }
        .invoice {
            background-color: #fff; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; 
            text-align: left;
        }
        .invoice h2 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
            text-align: center;
        }
        .detail {
            margin-bottom: 15px;
            font-size: 14px;
        }
        .detail label {
            font-weight: bold;
            color: #555;
        }
        .detail span {
            display: block;
            color: #333;
            margin-top: 5px;
        }
    </style>
</head>
<body>';
include "header.php";
echo '<div class="container">'; 

if (isset($result) && mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    echo '<div class="invoice">
        <h2>Invoice Pemesanan Tiket</h2>
        <div class="detail">
            <label>Nama Lengkap</label>
            <span>' . htmlspecialchars($row["nama_lengkap"]) . '</span>
        </div>
        <div class="detail">
            <label>Gender</label>
            <span>' . htmlspecialchars($row["gender"]) . '</span>
        </div>
        <div class="detail">
            <label>No. HP</label>
            <span>' . htmlspecialchars($row["no_telpon"]) . '</span>
        </div>
        <div class="detail">
            <label>Email</label>
            <span>' . htmlspecialchars($row["email1"]) . '</span>
        </div>
        <div class="detail">
            <label>Jumlah Mahasiswa UNESA</label>
            <span>' . htmlspecialchars($row["unesa"]) . '</span>
        </div>
        <div class="detail">
            <label>Jumlah Mahasiswa Non-UNESA</label>
            <span>' . htmlspecialchars($row["non_unesa"]) . '</span>
        </div>
        <div class="detail">
            <label>Metode Pembayaran</label>
            <span>' . htmlspecialchars($row["pembayaran"]) . '</span>
        </div>
    </div>';
} else {
    echo "<div>No records found.</div>";
}

echo '
    </div> 
';


require "footer.html"; 

mysqli_close($db);
?>
