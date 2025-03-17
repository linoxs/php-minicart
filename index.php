<?php
session_start();
require_once 'Cart.php';
require_once 'Product.php';
require_once 'User.php';

$products = Product::all();
$cartItems = Cart::items();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        User::register($_POST['email'], $_POST['password']);
        header('Location: index.php');
        exit;
    }

    if (isset($_POST['login'])) {
        if (User::login($_POST['email'], $_POST['password'])) {
            header('Location: index.php');
            exit;
        } else {
            echo "<p>Invalid login</p>";
        }
    }

    if (isset($_POST['add_to_cart'])) {
        Cart::add($_POST['product_id']);
        $cartItems = Cart::items();
        include 'templates/cart.php';
        exit;
    }
}

// Routing by GET params
$page = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini Cart</title>
    <script src="https://unpkg.com/htmx.org@1.9.2"></script>
</head>
<body>
    <nav>
        <?php if (User::isAuthenticated()): ?>
            Welcome, <?= $_SESSION['user']['email'] ?> |
            <a href="?page=logout">Logout</a>
        <?php else: ?>
            <a href="?page=login">Login</a> |
            <a href="?page=register">Register</a>
        <?php endif; ?>
        | <a href="index.php">Products</a>
    </nav>
    <hr>

    <?php
    if ($page === 'login') {
        include 'templates/login.php';
    } elseif ($page === 'register') {
        include 'templates/register.php';
    } elseif ($page === 'logout') {
        User::logout();
        header('Location: index.php');
        exit;
    } else {
        include 'templates/products.php';
        echo "<div id='cart'>";
        include 'templates/cart.php';
        echo "</div>";
    }
    ?>
</body>
</html>
