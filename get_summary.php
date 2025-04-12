<?php
include 'db_config.php';

// Get total income
$income_sql = "SELECT SUM(amount) AS total_income FROM income";
$income_result = $conn->query($income_sql);
$income_row = $income_result->fetch_assoc();
$total_income = $income_row['total_income'] ?: 0;

// Get total expenses
$expense_sql = "SELECT SUM(amount) AS total_expenses FROM expenses";
$expense_result = $conn->query($expense_sql);
$expense_row = $expense_result->fetch_assoc();
$total_expenses = $expense_row['total_expenses'] ?: 0;

// Calculate balance
$balance = $total_income - $total_expenses;

// Return the data as an associative array
$data = [
    'total_income' => $total_income,
    'total_expenses' => $total_expenses,
    'balance' => $balance
];

$conn->close();
return $data;
?>
