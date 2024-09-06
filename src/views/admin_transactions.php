<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Transactions</title>
</head>

<body>
    <h1>All Transactions</h1>
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
</body>

</html>