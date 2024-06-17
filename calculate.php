<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $buying_prices = $_POST['buying_price'];
    $vat = $_POST['vat'];
    $general_expense = $_POST['general_expense'];
    $profit_margin = $_POST['profit_margin'];

    $results = [];
    foreach ($buying_prices as $price) {
        $vat_amount = $price * ($vat / 100);
        $expense_amount = $price * ($general_expense / 100);
        $profit_amount = $price * ($profit_margin / 100);
        $selling_price = $price + $vat_amount + $expense_amount + $profit_amount;

        $results[] = [
            'buying_price' => $price,
            'vat_amount' => $vat_amount,
            'expense_amount' => $expense_amount,
            'profit_amount' => $profit_amount,
            'selling_price' => $selling_price
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Calculation Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Price Calculation Results</h1>
        <table>
            <thead>
                <tr>
                    <th>Buying Price</th>
                    <th>VAT Amount</th>
                    <th>General Expense</th>
                    <th>Profit Amount</th>
                    <th>Selling Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td><?php echo number_format($result['buying_price'], 2); ?></td>
                        <td><?php echo number_format($result['vat_amount'], 2); ?></td>
                        <td><?php echo number_format($result['expense_amount'], 2); ?></td>
                        <td><?php echo number_format($result['profit_amount'], 2); ?></td>
                        <td><?php echo number_format($result['selling_price'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.html">Calculate Again</a>
    </div>
</body>
</html>
