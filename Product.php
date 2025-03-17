<?php

class Product {
    public static function all() {
        $json = file_get_contents(__DIR__ . '/data/products.json');
        $products = json_decode($json, true);
        return array_column($products, null, 'id');
    }
}
