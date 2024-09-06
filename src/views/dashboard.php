<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
</head>

<body>
    <h1>Welcome, <?= $_SESSION['user']['name'] ?></h1>
    <p>Current Balance: <?= $balance ?></p>

    <h2>Your Transactions</h2>
    <table>
        <thead>
            <tr>
                <th>Amount</th>
                <th>Type</th>
                <th>Timestamp</th>
                <th>From</th>
                <th>To</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction) : ?>
                <tr>
                    <td><?= $transaction['amount'] ?></td>
                    <td><?= $transaction['type'] ?></td>
                    <td><?= date('Y-m-d H:i:s', $transaction['timestamp']) ?></td>
                    <td><?= $transaction['from'] ?></td>
                    <td><?= $transaction['to'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Actions</h2>
    <form action="deposit.php" method="post">
        <label for="amount">Deposit Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <button type="submit">Deposit</button>
    </form>
    <form action="withdraw.php" method="post">
        <label for="amount">Withdraw Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <button type="submit">Withdraw</button>
    </form>
    <form action="transfer.php" method="post">
        <label for="amount">Transfer Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <label for="toEmail">To Email:</label>
        <input type="email" id="toEmail" name="toEmail" required>
        <button type="submit">Transfer</button>
    </form>
</body>

</html>