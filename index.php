<?php 
// Start the session
session_start();

// Include database connection and helper functions
include("connection.php");
include("functions.php");
include("db_config.php");

// Check if the user is logged in
$user_data = check_login($con);

// Include the summary data from get_summary.php
$data = include 'get_summary.php';  // This will execute get_summary.php and return the data array
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Financial Tracker</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Header -->
    <header>
        <div class="container">
            <h1>Student Financial Tracker</h1>
            <nav>
                <ul>
                    <li><a href="#income">Income</a></li>
                    <li><a href="#expenses">Expenses</a></li>
                    <li><a href="#summary">Summary</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Track Your Income -->
    <section id="income">
        <div class="container">
            <h2>Track Your Income</h2>
            <form action="add_income.php" method="POST">
                <input type="number" name="amount" placeholder="Enter Amount" required>
                <input type="text" name="source" placeholder="Source of Income" required>
                <button type="submit">Add Income</button>
            </form>
        </div>
    </section>

    <!-- Track Your Expenses -->
    <section id="expenses">
        <div class="container">
            <h2>Track Your Expenses</h2>
            <form action="add_expense.php" method="POST">
                <input type="number" name="amount" placeholder="Enter Amount" required>
                <input type="text" name="category" placeholder="Expense Category" required>
                <button type="submit">Add Expense</button>
            </form>
        </div>
    </section>

    <!-- Financial Summary Section -->
    <!-- Financial Summary Section -->
<section id="summary">
    <div class="container">
        <h2>Financial Summary</h2>
        <div class="summary-box">
            <div class="summary-item">
                <h3>Total Income</h3>
                <p>Ksh <?php echo number_format($data['total_income'], 2); ?></p>
            </div>
            <div class="summary-item">
                <h3>Total Expenses</h3>
                <p>Ksh <?php echo number_format($data['total_expenses'], 2); ?></p>
            </div>
            <div class="summary-item">
                <h3>Balance</h3>
                <p>Ksh <?php echo number_format($data['balance'], 2); ?></p>
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

<!-- CSS Styles (You can include your styles.css here) -->

<style type="text/css">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    color: #333;
    text-align: center;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

/* Header */
header {
    background: #004080;
    color: white;
    padding: 15px 0;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

nav ul li a.active {
    text-decoration: underline;
}

/* Income Form */
section#income {
    margin: 50px 0;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

section#income h2 {
    margin-bottom: 20px;
}

form input, form button {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
}

form button {
    background: #004080;
    color: white;
    font-size: 16px;
    cursor: pointer;
    border: none;
}

form button:hover {
    background: #002850;
}

/* Income Table */
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
}

table th {
    background: #004080;
    color: white;
}

table tr:nth-child(even) {
    background: #f9f9f9;
}

/* Footer */
footer {
    margin-top: 50px;
    background: #333;
    color: white;
    padding: 10px 0;
}
</style>