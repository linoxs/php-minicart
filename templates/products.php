<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Products</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <?php foreach ($products as $p): ?>
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-xl font-semibold"><?= $p['name'] ?></h2>
                <p class="text-gray-600"><?= $p['description'] ?></p>
                <p class="text-lg font-bold">$<?= $p['price'] ?></p>
                <form hx-post="index.php" hx-target="#cart" hx-swap="innerHTML">
                    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="add_to_cart">Add</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
