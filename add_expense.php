<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $category = $_POST['category'];

    $sql = "INSERT INTO expenses (amount, category) VALUES ('$amount', '$category')";

    if ($conn->query($sql) === TRUE) {
        echo "Expense added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
