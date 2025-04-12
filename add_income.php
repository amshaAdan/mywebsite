<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $source = $_POST['source'];

    $sql = "INSERT INTO income (amount, source) VALUES ('$amount', '$source')";

    if ($conn->query($sql) === TRUE) {
        echo "Income added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
