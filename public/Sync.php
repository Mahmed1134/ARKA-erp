<?php
$conn = new mysqli("127.0.0.1","root","root","users");

$data = json_decode(file_get_contents("php://input"), true);

foreach ($data['products'] as $p) {
    $c  = $conn->real_escape_string($p['code']);
    $n  = $conn->real_escape_string($p['name']);
    $q  = (int)$p['qty'];
    $w  = $conn->real_escape_string($p['warehouse']);
    $pp = (float)($p['purchasePrice'] ?? 0); // ✅ سعر الشراء
    $sp = (float)($p['salePrice'] ?? 0);     // ✅ سعر البيع

    // ✅ دوّر على صف بنفس الكود والاسم والمخزن
    $check = $conn->query("
        SELECT id, qty FROM products
        WHERE code = '$c'
          AND name = '$n'
          AND warehouse = '$w'
        LIMIT 1
    ");

    if ($check && $check->num_rows > 0) {
        // ✅ موجود بنفس الكود والاسم والمخزن → زوّد الكمية، وحدّث الأسعار بآخر قيمة مُرسَلة
        $row = $check->fetch_assoc();
        $id = (int)$row['id'];
        $conn->query("
            UPDATE products
            SET qty = qty + $q,
                purchase_price = $pp,
                sale_price = $sp
            WHERE id = $id
        ");
    } else {
        // ✅ مش موجود بنفس الكود والاسم والمخزن → أضفه كصف جديد
        $conn->query("
            INSERT INTO products (code, name, qty, warehouse, purchase_price, sale_price)
            VALUES ('$c', '$n', $q, '$w', $pp, $sp)
        ");
    }
}

echo '{"status":true}';
?>