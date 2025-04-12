<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Include the summary data from get_summary.php
$data = include 'get_summary.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Summary</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Header -->
    <header>
        <div class="container">
            <h1>Financial Summary</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="income.php">Income</a></li>
                    <li><a href="expenses.php">Expenses</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Financial Summary -->
    <section id="summary">
        <div class="container">
            <h2>Financial Summary</h2>
            <div class="summary-box">
                <div class="summary-item">
                    <h3>Total Income</h3>
                    <p>$<?php echo number_format($data['total_income'], 2); ?></p>
                </div>
                <div class="summary-item">
                    <h3>Total Expenses</h3>
                    <p>$<?php echo number_format($data['total_expenses'], 2); ?></p>
                </div>
                <div class="summary-item">
                    <h3>Balance</h3>
                    <p>$<?php echo number_format($data['balance'], 2); ?></p>
                </div>
            </div>
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
