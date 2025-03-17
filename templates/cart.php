<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Your Cart</h1>
    <div class="bg-white shadow-md rounded-lg p-6">
        <?php if (empty($cartItems)): ?>
            <p>Cart is empty.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($cartItems as $item): ?>
                    <li><?= $item['name'] ?> x <?= $item['qty'] ?> ($<?= $item['qty'] * $item['price'] ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
