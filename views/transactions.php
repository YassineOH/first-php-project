<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record) : ?>
                <tr>
                    <th>
                        <?= date("D d, Y", strtotime($record["Date"])); ?>
                    </th>
                    <th>
                        <?= $record["Check #"]; ?>
                    </th>
                    <th>
                        <?= $record["Description"]; ?>
                    </th>
                    <th <?=
                        str_starts_with($record["Amount"], "-") ? "style='color:red';" : "style='color:green';"
                        ?>>
                        <?= $record["Amount"]; ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td>
                    <?= "$" . $totalIncome ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>
                    <?= "-$" . -$totalExpense ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>
                    <?= $netTotal > 0 ? "$" . $netTotal :  "-$" . -$netTotal ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>