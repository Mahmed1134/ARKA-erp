<?php
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("127.0.0.1", "root", "root", "users");

if ($conn->connect_error) {
    echo json_encode([
        "products" => [],
        "sells" => []
    ]);
    exit;
}

// المنتجات
$products = [];
$result = $conn->query("
    SELECT code, name, qty, warehouse
    FROM products
    ORDER BY name
");

while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// المبيعات (تجميع حسب اسم المنتج)
$sells = [];
$result = $conn->query("
    SELECT
        name,
        SUM(qty) AS qty
    FROM sells
    GROUP BY name
    ORDER BY SUM(qty) DESC
");

while ($row = $result->fetch_assoc()) {
    $sells[] = $row;
}

echo json_encode([
    "products" => $products,
    "sells" => $sells
]);

$conn->close();
?>