<?php
require "database.php"; // Include database connection
session_start();
// Handle form submission
if (isset($_POST['submit'])) {
    // Sanitasi input untuk mencegah SQL Injection
    $gender = mysqli_real_escape_string($db, $_POST["gender"]);
    $nama_lengkap = mysqli_real_escape_string($db, $_POST["nama_lengkap"]);
    $no_telpon = mysqli_real_escape_string($db, $_POST["no_telpon"]);
    $email1 = mysqli_real_escape_string($db, $_POST["email1"]); // Benar
    $unesa = mysqli_real_escape_string($db, $_POST["unesa"]);
    $non_unesa = mysqli_real_escape_string($db, $_POST["non_unesa"]);
    $pembayaran = mysqli_real_escape_string($db, $_POST["pembayaran"]);

    // Insert the data into the database
    $sql = "INSERT INTO pemesanan (gender, nama_lengkap, no_telpon, email1, unesa, non_unesa, pembayaran) 
            VALUES('$gender', '$nama_lengkap', '$no_telpon', '$email1', '$unesa', '$non_unesa', '$pembayaran')";

    // Eksekusi query dan cek apakah berhasil
    if (mysqli_query($db, $sql)) {
        // Retrieve the last inserted record
        $last_id = mysqli_insert_id($db); // Get the last inserted ID
        $sql = "SELECT * FROM pemesanan WHERE id = $last_id"; // Assuming 'id' is the primary key
        $result = mysqli_query($db, $sql);
    } else {
        echo "Error: " . mysqli_error($db);
    }
}

// Start HTML output
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
            box-sizing: border-box; /* Ensures padding and border are included in element’s total width and height */
        }
        html, body {
            height: 100%;
            background-color: #d3d3d3; /* Gray background for the whole page */
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: calc(100% - 160px); /* Adjust height to account for header and footer */
            padding: 20px; /* Padding around the container */
        }
        .invoice {
            background-color: #fff; /* White background for the invoice */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Fixed width for the invoice */
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
echo '<div class="container">'; // Added container div for centering

if (isset($result) && mysqli_num_rows($result) > 0) {
    // Fetch the last inserted record
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
    </div> <!-- End of container -->
';

// Include footer
require "footer.html"; 

// Close the database connection
mysqli_close($db);
?>
