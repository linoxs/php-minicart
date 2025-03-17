<h3>Your Cart</h3>
<?php if (empty($cartItems)): ?>
    <p>Cart is empty.</p>
<?php else: ?>
    <ul>
        <?php foreach ($cartItems as $item): ?>
            <li><?= $item['name'] ?> x <?= $item['qty'] ?> ($<?= $item['qty'] * $item['price'] ?>)</li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
