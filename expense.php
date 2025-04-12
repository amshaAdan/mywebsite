<?php
session_start();
include("connection.php");
include("functions.php");

$user_id = $user_data['id'];
$query = "SELECT * FROM expenses WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);

// Process the form to add expenses
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $category = $_POST['category'];

 // Get the logged-in user ID
$user_id = $user_data['id']; // Ensure 'id' exists in your user data

// Insert expense with user_id
$query = "INSERT INTO expenses (user_id, amount, category) VALUES ('$user_id', '$amount', '$category')";
mysqli_query($con, $query);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Expenses</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Header -->
    <header>
        <div class="container">
            <h1>Track Your Expenses</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Expense Form -->
    <section id="expenses">
        <div class="container">
            <h2>Enter Your Expense</h2>
            <form action="expenses.php" method="POST">
                <input type="number" name="amount" placeholder="Amount" required>
                                <button type="submit">Add Expense</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Personal Financial Tracker | Designed for Students</p>
        </div>
    </footer>

</body>
</html>
