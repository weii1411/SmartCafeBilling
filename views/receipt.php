<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartCafe Billing</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 760px; margin: 36px auto; padding: 0 18px; color: #222; }
        h1 { color: #5b3825; }
        table { width: 100%; border-collapse: collapse; margin: 18px 0; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f4eee9; }
        .total { font-weight: bold; background: #faf4ef; }
        .status { padding: 10px; background: #edf7ed; border-radius: 6px; }
        .debug { background: #f6f6f6; padding: 12px; border-radius: 6px; overflow-wrap: anywhere; }
    </style>
</head>
<body>
    <h1>SmartCafe Billing</h1>
    <p>Receipt for one simulated drink order.</p>

    <table>
        <tr><th>Field</th><th>Value</th></tr>
        <tr><td>Product</td><td><?= htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') ?></td></tr>
        <tr><td>Unit price</td><td><?= number_format($unitPrice) ?> <?= CURRENCY ?></td></tr>
        <tr><td>Quantity</td><td><?= $quantity ?></td></tr>
        <tr><td>Subtotal</td><td><?= number_format($subtotal) ?> <?= CURRENCY ?></td></tr>
        <tr><td>Discount</td><td><?= number_format($discount) ?> <?= CURRENCY ?></td></tr>
        <tr><td>Packaging fee</td><td><?= number_format($packagingFee) ?> <?= CURRENCY ?></td></tr>
        <tr><td>Service fee</td><td><?= number_format($serviceFee) ?> <?= CURRENCY ?></td></tr>
        <tr class="total"><td>Total</td><td><?= number_format($total) ?> <?= CURRENCY ?></td></tr>
    </table>

    <p class="status"><strong>Status:</strong> <?= $status ?></p>

    <h2>Type boundary evidence</h2>
    <div class="debug">
        <p>Raw quantity: <code><?= htmlspecialchars($rawQuantity, ENT_QUOTES, 'UTF-8') ?></code></p>
        <p>Type before casting: <strong><?= $rawQuantityType ?></strong></p>
        <p>Type after casting: <strong><?= $cleanQuantityType ?></strong></p>
        <p>Product available: <strong><?= var_export($productAvailable, true) ?></strong></p>
        <p>Valid customer status: <strong><?= var_export($isValidCustomerStatus, true) ?></strong></p>
        <p>Valid quantity: <strong><?= var_export($hasValidQuantity, true) ?></strong></p>
    </div>
</body>
</html>
