<?php
$conn = new mysqli("127.0.0.1","root","root","users");

$data = json_decode(file_get_contents("php://input"), true);

$errors = [];

// ✅ الخطوة 1: افحص كل المنتجات الأول قبل ما تنفذ أي حاجة في الداتابيز
foreach ($data['sells'] as $s) {
    $c = $conn->real_escape_string($s['code']);
    $n = $conn->real_escape_string($s['name']);
    $q = (int)$s['qty'];
    $w = $conn->real_escape_string($s['warehouse']);

    $check = $conn->query("
        SELECT qty FROM products
        WHERE code = '$c' AND warehouse = '$w'
        LIMIT 1
    ");

    if (!$check || $check->num_rows === 0) {
        $errors[] = "المنتج \"$n\" (كود: $c) غير موجود في المخزون";
        continue;
    }

    $row = $check->fetch_assoc();
    $currentQty = (int)$row['qty'];

    if ($q > $currentQty) {
        $errors[] = "المخزون غير كافٍ للمنتج \"$n\" (كود: $c) - المتاح: $currentQty فقط";
    }
}

// ✅ الخطوة 2: لو فيه أي خطأ واحد، وقف العملية كلها ومترجعش تنفذ أي INSERT/UPDATE
if (!empty($errors)) {
    echo json_encode([
        'status'  => false,
        'message' => 'تعذّر إتمام العملية بسبب نقص المخزون',
        'errors'  => $errors
    ]);
    exit;
}

// ✅ الخطوة 3: لو كله سليم، نفّذ كل العمليات عادي
foreach ($data['sells'] as $s) {
    $c  = $conn->real_escape_string($s['code']);
    $n  = $conn->real_escape_string($s['name']);
    $q  = (int)$s['qty'];
    $w  = $conn->real_escape_string($s['warehouse']);
    $pr = (float)($s['price'] ?? 0);

    $conn->query("
        INSERT INTO sells (code, name, qty, warehouse, price)
        VALUES ('$c', '$n', $q, '$w', $pr)
    ");

    $conn->query("
        UPDATE products
        SET qty = qty - $q
        WHERE code = '$c' AND warehouse = '$w'
    ");
}

echo json_encode(['status' => true, 'message' => 'تم إرسال عمليات البيع بنجاح']);
?>