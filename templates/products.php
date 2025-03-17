<h2>Products</h2>
<?php foreach ($products as $p): ?>
    <div>
        <?= $p['name'] ?> - $<?= $p['price'] ?>
        <form hx-post="index.php" hx-target="#cart" hx-swap="innerHTML">
            <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
            <button type="submit" name="add_to_cart">Add</button>
        </form>
    </div>
<?php endforeach; ?>
