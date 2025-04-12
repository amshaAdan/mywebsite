<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Process the form to add income
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $source = $_POST['source'];

    // Get logged-in user ID
    $user_id = $user_data['id'];

    // Insert income with user_id
    $query = "INSERT INTO income (user_id, amount, source) VALUES ('$user_id', '$amount', '$source')";
    mysqli_query($con, $query);
}

// Fetch user-specific income data
$user_id = $user_data['id'];
$query = "SELECT * FROM income WHERE user_id = '$user_id' ORDER BY id DESC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Income</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="income-only">

    <!-- Header -->
    <header>
        <div class="container">
            <h1>Track Your Income</h1>
            <nav>
                <ul>
                    <li><a href="income.php" class="active">Income</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Income Form -->
    <section id="income">
        <div class="container">
            <h2>Enter Your Income</h2>
            <form action="income.php" method="POST">
                <input type="number" name="amount" placeholder="Enter Amount" required>
                <input type="text" name="source" placeholder="Source of Income" required>
                <button type="submit">Add Income</button>
            </form>
        </div>
    </section>

    <!-- Income List -->
    <section id="income-list">
        <div class="container">
            <h2>Your Income History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Source</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>$<?php echo number_format($row['amount'], 2); ?></td>
                            <td><?php echo htmlspecialchars($row['source']); ?></td>
                            <td><?php echo date("Y-m-d", strtotime($row['created_at'])); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
