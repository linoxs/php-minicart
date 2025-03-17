<?php

class Cart {
    public static function add($productId) {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = 1;
        } else {
            $_SESSION['cart'][$productId]++;
        }
    }

    public static function items() {
        $all = Product::all();
        $cart = $_SESSION['cart'] ?? [];

        $items = [];
        foreach ($cart as $id => $qty) {
            if (isset($all[$id])) {
                $p = $all[$id];
                $p['qty'] = $qty;
                $items[] = $p;
            }
        }
        return $items;
    }
}
