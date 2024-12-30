<?php
require_once 'db.php';

// Sample products data
$products = [
    [
        'name' => 'Fresh Orange',
        'description' => 'Sweet and juicy oranges.',
        'price' => 4.99,
        'image' => 'orange.png',
        'category' => 'Fruits'
    ],
    [
        'name' => 'Fresh Onion',
        'description' => 'Organic onions for your kitchen.',
        'price' => 2.99,
        'image' => 'onion.png',
        'category' => 'Vegetables'
    ],
    [
        'name' => 'Fresh Meat',
        'description' => 'High-quality fresh meat.',
        'price' => 9.99,
        'image' => 'meat.png',
        'category' => 'Meat'
    ],
    [
        'name' => 'Fresh Cabbage',
        'description' => 'Healthy and fresh cabbage.',
        'price' => 1.99,
        'image' => 'cabbage.png',
        'category' => 'Vegetables'
    ],
    [
        'name' => 'Fresh Potato',
        'description' => 'Organic potatoes for your meals.',
        'price' => 3.49,
        'image' => 'potato.png',
        'category' => 'Vegetables'
    ],
    [
        'name' => 'Fresh Avocado',
        'description' => 'Creamy and delicious avocados.',
        'price' => 5.99,
        'image' => 'avocado.png',
        'category' => 'Fruits'
    ],
    [
        'name' => 'Fresh Carrot',
        'description' => 'Sweet and crunchy carrots.',
        'price' => 2.49,
        'image' => 'carrot.png',
        'category' => 'Vegetables'
    ],
    [
        'name' => 'Green Lemon',
        'description' => 'Fresh green lemons for your drinks.',
        'price' => 1.99,
        'image' => 'lemon.png',
        'category' => 'Fruits'
    ]
];

// Insert products into the database
try {
    $sql = "INSERT INTO products (name, description, price, image, category) VALUES (:name, :description, :price, :image, :category)";
    $stmt = $conn->prepare($sql);

    foreach ($products as $product) {
        $stmt->execute([
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'image' => $product['image'],
            'category' => $product['category']
        ]);
    }

    echo "Products added successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>